const quiz = document.getElementById("quiz");
const answerEls = document.querySelectorAll(".answer");
const questionEl = document.getElementById("question");
const a_text = document.getElementById("a_text");
const b_text = document.getElementById("b_text");
const nextButton = document.getElementById("nextButton");
const submitButton = document.getElementById("submitButton");
let currentQuiz = 0;
let simCount = 0;
let quizData = [];

function loadQuiz() {
  deselectAnswers();
  const currentQuizData = quizData[currentQuiz];
  questionEl.innerText = currentQuizData.questao;
  a_text.innerText = currentQuizData.opcao_a;
  b_text.innerText = currentQuizData.opcao_b;

  // Exibe o botão correto com base no tamanho de quizData
  if (currentQuiz === quizData.length - 1) {
    nextButton.style.display = "none";
    submitButton.style.display = "block";
  } else {
    nextButton.style.display = "block";
    submitButton.style.display = "none";
  }
}

function deselectAnswers() {
  answerEls.forEach((answerEl) => (answerEl.checked = false));
}

function getSelected() {
  let answer;
  answerEls.forEach((answerEl) => {
    if (answerEl.checked) {
      answer = answerEl.id;
      console.log("Opção escolhida:", answerEl.checked);
    }
  });
  return answer;
}

function nextQuestion() {
  let answer = getSelected();
  if (answer) {
    console.log("Opção selecionada:", answer); // Verifica a opção selecionada
    if (answer === "a") {
      simCount++;
      console.log("Número de opções 'a' selecionadas:", simCount); // Verifica se o simCount está sendo incrementado corretamente
    }
    currentQuiz++;
    if (currentQuiz < quizData.length) {
      loadQuiz(); // Carrega a próxima pergunta
    }
  }
}

// Adiciona um evento de clique ao botão de próxima pergunta
nextButton.addEventListener("click", nextQuestion);

function submitQuiz() {
  const answer = getSelected();
  if (!answer) {
    console.error("Por favor, selecione uma resposta antes de enviar o quiz.");
    return;
  }

  if (answer === "a") {
    simCount++;
  }

  const urlParams = new URLSearchParams(window.location.search);
  const quizId = urlParams.get("quiz_nome_id");

  if (!quizId) {
    console.error("ID do quiz não encontrado na URL.");
    return;
  }

  // Defina os parâmetros que deseja passar para realizacao_quiz.php
  const params = new URLSearchParams();
  params.append("nome", "quiz_nome_id"); // substitua "valor1" pelo valor que deseja passar para o parâmetro "nome"
  params.append("quiz_nome_id", quizId);

  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        const respostas = JSON.parse(xhr.responseText); // Armazena as respostas do quiz

        // Atualiza o conteúdo da página com os resultados do quiz
        quiz.innerHTML = `
          <h2 class="result-heading">OS TEUS RESULTADOS</h2>
          <p class="quiz-heading">O quão empática/o és?</p>
          <p class="result-text">${respostas}</p>
          <button class="restart-btn" onclick="location.reload()">Responder novamente</button>
        `;

        // Envia os resultados do quiz para o arquivo PHP para inserção no banco de dados
        fetch(`realizacao_quiz.php?${params}`)
          .then((response) => {
            if (!response.ok) {
              throw new Error("Erro ao enviar os resultados do quiz.");
            }
            return response.text();
          })
          .then((data) => {
            console.log(data); // Aqui você pode lidar com a resposta do servidor, se necessário
            // Exibe os resultados do quiz ou realiza outras ações na página
          })
          .catch((error) => {
            console.error("Houve um erro:", error);
            // Exibe uma mensagem de erro ao usuário, se necessário
          });
      }
    }
  };
  xhr.open(
    "GET",
    `buscar_respostas.php?quiz_nome_id=${quizId}&simCount=${simCount}`,
    true
  );
  xhr.send();
}

window.onload = function () {
  loadQuizData();
};

function loadQuizData() {
  const urlParams = new URLSearchParams(window.location.search);
  const quizId = urlParams.get("quiz_nome_id");

  console.log("Quiz Nome ID:", quizId);

  if (!quizId) {
    console.error("ID do quiz não encontrado na URL.");
    return;
  }

  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        quizData = JSON.parse(xhr.responseText); // Armazena os dados das perguntas
        loadQuiz(); // Carrega a primeira pergunta
      } else {
        console.error("Erro ao carregar o quiz:", xhr.statusText);
      }
    }
  };
  xhr.open("GET", `buscar_perguntas.php?quiz_nome_id=${quizId}`, true);
  xhr.send();
}

// Carrega os dados do quiz do PHP quando a página é carregada
window.onload = loadQuizData;
