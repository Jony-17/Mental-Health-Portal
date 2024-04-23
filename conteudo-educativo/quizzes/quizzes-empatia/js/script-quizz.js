const quizData = [
    {
        question: "1. Fui rotulado como “excessivamente sensível”, tímido ou introvertido?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "2. Fico frequentemente sobrecarregado ou ansioso?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "3. Discussões ou gritos deixam-me doente?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "4. Muitas vezes sinto que não me encaixo?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "5. Estou esgotado pelas multidões e preciso de um tempo sozinho para me reanimar?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "6. Sou superestimulado por ruídos, odores ou pessoas que falam sem parar?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "7. Tenho sensibilidades químicas ou não tolero roupas que arranham?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "8. Prefiro levar o meu próprio carro para poder sair mais cedo se precisar?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "9. Como demais para lidar com o stress?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "10. Tenho medo de ser sufocado por relacionamentos íntimos?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "11. Assusto-me facilmente?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "12. Reajo fortemente à cafeína ou aos medicamentos?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "13. Tenho um limiar de dor baixo?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "14. Tenho tendência a isolar-me socialmente?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "15. Absorvo o stress, as emoções ou os sintomas de outras pessoas?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "16. Fico sobrecarregado com a multitarefa e prefiro fazer uma coisa de cada vez?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "17. Reabasteço-me na natureza?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "18. Preciso de muito tempo para me recuperar depois de estar com pessoas difíceis?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "19. Sinto-me melhor nas cidades pequenas ou no campo, do que nas grandes cidades?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "20. Prefiro interações individuais ou pequenos grupos em vez de grandes reuniões?",
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
            if (simCount >= 1 && simCount <= 5) {
                result = "És uma pessoa parcialmente empática.";
            } else if (simCount >= 6 && simCount <= 10) {
                result = "És uma pessoa com tendências empáticas moderadas.";
            } else if (simCount >= 11 && simCount <= 15) {
                result = "És uma pessoa com tendências empáticas fortes.";
            } else {
                result = "És uma pessoa com mesmo muita empatia.";
            }
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
