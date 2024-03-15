const quizData = [
    {
        question: "1. Fui rotulado como “excessivamente sensível”, tímido ou introvertido?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "2. Fico frequentemente sobrecarregado ou ansioso?",
        a: "0",
        b: "1",
        c: "2"
    },
    /*{
        question: "3. Discussões ou gritos me deixam doente?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "4. Muitas vezes sinto que não me encaixo?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "5. Estou esgotado pelas multidões e preciso de um tempo sozinho para me reanimar?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "6. Sou superestimulado por ruídos, odores ou pessoas que falam sem parar?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "7. Tenho sensibilidades químicas ou não tolero roupas que arranham?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "8. Prefiro levar meu próprio carro para poder sair mais cedo se precisar?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "9. Como demais para lidar com o estresse?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "10. Tenho medo de ser sufocado por relacionamentos íntimos?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "11. Eu me assusto facilmente?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "12. Reajo fortemente à cafeína ou aos medicamentos?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "13. Tenho um limiar de dor baixo?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "14. Tenho tendência a me isolar socialmente?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "15. Absorvo o estresse, as emoções ou os sintomas de outras pessoas?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "16. Fico sobrecarregado com a multitarefa e prefiro fazer uma coisa de cada vez?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "17. Eu me reabasteço na natureza?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "18. Preciso de muito tempo para me recuperar depois de estar com pessoas difíceis ou vampiros energéticos?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "19. Sinto-me melhor nas cidades pequenas ou no campo do que nas grandes?",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "20. Prefiro interações individuais ou pequenos grupos em vez de grandes reuniões?",
        a: "0",
        b: "1",
        c: "2"
    }*/
];

const quiz = document.getElementById('quiz');
const answerEls = document.querySelectorAll('.answer');
const questionEl = document.getElementById('question');
const a_text = document.getElementById('a_text');
const b_text = document.getElementById('b_text');
const c_text = document.getElementById('c_text');
//const submitBtn = document.getElementById('submit');
const nextButton = document.getElementById('nextButton');
const submitButton = document.getElementById('submitButton');
let currentQuiz = 0;

loadQuiz();

function loadQuiz() {
    deselectAnswers();
    const currentQuizData = quizData[currentQuiz];
    questionEl.innerText = currentQuizData.question;
    a_text.innerText = currentQuizData.a;
    b_text.innerText = currentQuizData.b;
    c_text.innerText = currentQuizData.c;
    
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
        currentQuiz++;
        if (currentQuiz < quizData.length) {
            loadQuiz();
            // Carrega a próxima pergunta
            loadQuiz();
        }
    }
}


function submitQuiz() {
    let totalScore = 0;
    answerEls.forEach(answerEl => {
        if (answerEl.checked) {
            const answerValue = answerEl.id;
            if (answerValue === 'a') {
                totalScore += 0;
            } else if (answerValue === 'b') {
                totalScore += 1;
            } else if (answerValue === 'c') {
                totalScore += 2;
            }
        }
    });

    let result;
    if (totalScore >= 3) {
        result = "mais de 3";
    } else if (totalScore >= 1 && totalScore <= 2) {
        result = "entre 1 e 2";
    } else if (totalScore <= 0) {
        result = "zero";
    } else {
        result = "nao deu";
    }

    // Exibe os resultados do quiz
    quiz.innerHTML = `
        <h2 class="result-heading">OS TEUS RESULTADOS</h2>
        <p class="quiz-heading">O quão livre emocionalmente, és?</p>
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
