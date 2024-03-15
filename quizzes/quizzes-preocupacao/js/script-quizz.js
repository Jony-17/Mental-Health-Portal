const quizData = [
    {
        question: "1. Preocupo-me com muitas coisas todos os dias?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "2. Torno os problemas maiores, e não menores?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "3. Preocupo-me com coisas nas quais ninguém ao meu redor se preocupa?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "4. Preocupo-me mesmo em momentos felizes?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "5. Acho que não consigo parar de me preocupar, embora tente?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "6. Quando uma preocupação é resolvida, concentro-me imediatamente em outra?",
        a: "Sim",
        b: "Não"
    }
];

const quiz = document.getElementById('quiz');
const answerEls = document.querySelectorAll('.answer');
const questionEl = document.getElementById('question');
const a_text = document.getElementById('a_text');
const b_text = document.getElementById('b_text');
//const submitBtn = document.getElementById('submit');
const nextButton = document.getElementById('nextButton');
const submitButton = document.getElementById('submitButton');
let currentQuiz = 0;
let simCount = 0;

loadQuiz();

function loadQuiz() {
    deselectAnswers();
    const currentQuizData = quizData[currentQuiz];
    questionEl.innerText = currentQuizData.question;
    a_text.innerText = currentQuizData.a;
    b_text.innerText = currentQuizData.b;
    
    // Se for a última pergunta, exibe o botão de envio, caso contrário, exibe o botão de próxima pergunta
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
            loadQuiz();
            // Carrega a próxima pergunta
            loadQuiz();
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
            if (simCount >= 0 && simCount <= 1) {
                result = "És mais um guerreiro que preocupado.";
            } else if (simCount >= 2 && simCount <= 3) {
                result = "A preocupação toma conta de parte da tua vida.";
            } else if (simCount >= 4 && simCount <= 5) {
                result = "A preocupação toma grande parte da tua vida.";
            } else {
                result = "A preocupação toma mesmo muito conta de parte da tua vida.";
            }
            quiz.innerHTML = `
                <h2 class="result-heading">OS TEUS RESULTADOS</h2>
                <p class="quiz-heading">O quão preocupada/o és?</p>
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
