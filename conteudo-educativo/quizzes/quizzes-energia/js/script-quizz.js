const quizData = [
    {
        question: "1. Emanas um sentimento de apoio e compaixão pelos outros?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "2. Os outros sentem-se seguros e relaxados contigo?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "3. És uma pessoa geralmente positiva?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "4. Não fazes julgamentos contigo próprio e com os outros?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "5. Tens compaixão pelos teus problemas e tentas curá-los?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "6. Sentes-te tranquilo maior parte do tempo?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "7. És capaz de deixar os ressentimentos desvanecerem em vez de lutar por eles?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "8. Riste com frequência?",
        a: "Sim",
        b: "Não"
    },
    {
        question: "9. És gentil com a tua família, amigos e pessoas que não conheces bem?",
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
            if (simCount === 0) {
                result = "É díficil a energia positiva vir ter contigo, mas vais sempre a tempo de mudar";
            } else if (simCount === 1) {
                result = "Estás pronto para aprender como trazer mais energia positiva para a tua vida, mesmo que agora não aparente ser fácil.";
            } else if (simCount === 2) {
                result = "Estás a aprender a ser positivo. Parabéns!";
            } else if (simCount === 3) {
                result = "Às vezes és positivo, embora a negatividade ainda desempenhe um papel significativo na tua vida.";
            } else if (simCount === 4) {
                result = "A energia positiva está a aumentar e estás a abrir espaço para mais alegria.";
            } else if (simCount === 5) {
                result = "Estás a aprender a ser mais amoroso contigo mesmo e com os outros, e ficas menos esgotado pela negatividade ao teu redor.";
            } else if (simCount === 6) {
                result = "Inclinaste a balança para ser mais positivo e tua vitalidade está a melhorar";
            } else if (simCount === 7) {
                result = "A tua energia está a ficar cada vez mais vibrante e viva à medida que começas a estabelecer limites com pessoas negativas.";
            } else if (simCount === 8) {
                result = "Tens energia positiva na maior parte do tempo.";
            } else {
                result = "A tua pontuação de positividade é 100%. A tua vida está cheia de energia positiva. Muitos parabéns";
            }
            quiz.innerHTML = `
                <h2 class="result-heading">OS TEUS RESULTADOS</h2>
                <p class="quiz-heading">Tens uma energia positiva?</p>
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
