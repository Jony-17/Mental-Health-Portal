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
    }
  });
  return answer;
}

function nextQuestion() {
  const answer = getSelected();
  if (answer) {
    if (answer === "a") {
      simCount++;
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
  const urlParams = new URLSearchParams(window.location.search);
  const quizId = urlParams.get("quiz_nome_id");

  if (!quizId) {
    console.error("ID do quiz não encontrado na URL.");
    return;
  }

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
      } else {
        console.error("Erro ao carregar as respostas do quiz:", xhr.statusText);
      }
    }
  };
  xhr.open("GET", `buscar_respostas.php?quiz_nome_id=${quizId}`, true);
  xhr.send();
}

// Carrega os dados do quiz (perguntas e respostas) do PHP quando a página é carregada
window.onload = function () {
  loadQuizData();
  submitQuiz();
};

// Função para carregar os dados do quiz do PHP
function loadQuizData() {
  // Obtém o ID do quiz a partir da URL
  const urlParams = new URLSearchParams(window.location.search);
  const quizId = urlParams.get("quiz_nome_id");

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
