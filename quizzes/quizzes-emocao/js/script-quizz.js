const quizData = [
    {
        question: "1. Se estou com raiva de alguém, vou respirar e concentrar-me antes de reagir.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "2. Quando estou cheio de dúvidas ou medo, trato-me com amor.",
        a: "0",
        b: "1",
        c: "2"
    },
    /*{
        question: "3. Quando estou preso no trânsito ou se algo não acontece no meu horário, tenho paciência.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "4. Depois de um dia difícil, concentro-me nas coisas pelas quais sou grato, em vez de me culpar pelo que deu errado.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "5. Raramente fico ríspido ou tenho uma atitude arrogante se as pessoas me frustram.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "6. Sinto-me conectado a um senso de espiritualidade, independentemente de como eu o defina.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "7. Eu verifico a minha intuição - meus instintos - ao fazer escolhas.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "8. Se sou culpado por alguma coisa, raramente ataco e digo coisas das quais me arrependo.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "9. Adormeço rapidamente e não me preocupo com a lista de “tarefas” de amanhã.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "10. Se o meu coração se partir eu não desisto do amor.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "11. Sou uma pessoa positiva e não transformo pequenos problemas em grandes.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "12. Não procuro vingança se alguém me tratar mal.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "13. Não tenho inveja do sucesso de outras pessoas se ele superar o meu.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "14. Deixo rapidamente de lado as emoções negativas e não fico a pensar nelas.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "15. Não sou facilmente esmagado por decepções.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "16. Eu não me comparo com os outros.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "17. Tenho empatia pelos outros, mas não me torno terapeuta nem fico esgotado pela sua dor emocional.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "18. Eu vivo no “Agora”, em vez de ficar a pensar no passado ou no futuro.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "19. Sinto-me feliz com a minha vida, não que ela esteja apenas a passar por mim.",
        a: "0",
        b: "1",
        c: "2"
    },
    {
        question: "20. Sou bom em estabelecer limites com pessoas que retiram a minha energia.",
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
