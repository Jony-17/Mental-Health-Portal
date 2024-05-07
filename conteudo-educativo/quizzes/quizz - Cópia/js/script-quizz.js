const quiz = document.getElementById('quiz');
const answerEls = document.querySelectorAll('.answer');
const questionEl = document.getElementById('question');
const a_text = document.getElementById('a_text');
const b_text = document.getElementById('b_text');
const nextButton = document.getElementById('nextButton');
const submitButton = document.getElementById('submitButton');
let currentQuiz = 0;
let simCount = 0;
let quizData = [];



// Adiciona um listener de evento de clique para os links dos quizzes
document.querySelectorAll('.quiz-link').forEach(link => {
    link.addEventListener('click', function(event) {
        event.preventDefault(); // Impede o comportamento padrão do link
        const quizId = this.getAttribute('data-quiz-id'); // Obtém o ID do quiz do atributo data-quiz-id
        console.log(`ID do quiz: ${quizId}`); // Verifica se o ID do quiz está sendo recebido corretamente
        
        // Requisição AJAX para buscar os dados do quiz
        fetch(`buscar_perguntas.php?quiz_nome_id=${quizId}`)
            .then(response => response.json())
            .then(data => {
                console.log(`Dados do quiz recebidos:`, data);
                // Aqui você pode atualizar a página com os dados do quiz, ou fazer qualquer outra coisa que desejar
            })
            .catch(error => {
                console.error('Erro ao carregar dados do quiz:', error);
            });
    });
});


function loadQuiz() {
    deselectAnswers();
    const currentQuizData = quizData[currentQuiz];
    questionEl.innerText = currentQuizData.question;
    a_text.innerText = currentQuizData.a;
    b_text.innerText = currentQuizData.b;
  
    // Exibe o botão correto com base no tamanho de quizData
    if (currentQuiz === quizData.length - 1) {
      nextButton.style.display = 'none';
      submitButton.style.display = 'block';
    } else {
      nextButton.style.display = 'block';
      submitButton.style.display = 'none';
    }
  }

function deselectAnswers() {
    answerEls.forEach(answerEl => answerEl.checked = false);
}

function getSelected() {
    let answer;
    answerEls.forEach(answerEl => {
        if(answerEl.checked) {
            answer = answerEl.id;
        }
    });
    return answer;
}

function nextQuestion() {
    const answer = getSelected();
    if (answer) {
        if (answer === 'a') {
            simCount++;
        }
        currentQuiz++;
        if (currentQuiz < quizData.length) {
            loadQuiz(); // Carrega a próxima pergunta
        }
    }
}

function submitQuiz() {
    const answer = getSelected();
    if(answer) {
        if(answer === 'a') {
            simCount++;
        }
        currentQuiz++;
        if(currentQuiz < quizData.length) {
            loadQuiz();
        } else {
            let result;
            // A lógica para calcular o resultado permanece a mesma
            if (simCount >= 0 && simCount <= 1) {
                result = "És uma pessoa parcialmente empática.";
            } else if (simCount >= 2 && simCount <= 10) {
                result = "És uma pessoa com tendências empáticas moderadas.";
            } else if (simCount >= 11 && simCount <= 15) {
                result = "És uma pessoa com tendências empáticas fortes.";
            } else {
                result = "És uma pessoa com mesmo muita empatia.";
            }
            // Exibe os resultados do quiz
            quiz.innerHTML = `
                <h2 class="result-heading">OS TEUS RESULTADOS</h2>
                <p class="quiz-heading">O quão empática/o és?</p>
                <p class="result-text">${result}</p>
                <button class="restart-btn" onclick="location.reload()">Responder novamente</button>
            `;
            // Envia os resultados do quiz para o arquivo PHP para inserção no banco de dados
            fetch('realizacao_quiz.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ result: result }),
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao enviar os resultados do quiz.');
                }
                return response.text();
            })
            .then(data => {
                console.log(data); // Aqui você pode lidar com a resposta do servidor, se necessário
                // Exibe os resultados do quiz ou realiza outras ações na página
            })
            .catch(error => {
                console.error('Houve um erro:', error);
                // Exibe uma mensagem de erro ao usuário, se necessário
            });
        }
    }
}
