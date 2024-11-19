// const questions = [ 
//     { 
//         title: "Question 1", 
//         text: "Which protocols are used for secure data transmission over the internet?", 
//         options: ["HTTP", "HTTPS", "FTP", "SFTP"] 
//     }, 
//     { 
//         title: "Question 2", 
//         text: "What does HTML stand for?", 
//         options: ["Hyper Trainer Marking Language", "Hyper Text Markup Language", "Hyperlinks and Text Markup Language", "Home Tool Markup Language"] 
//     }, 
//     { 
//         title: "Question 3", 
//         text: "Which language is used for web apps?", 
//         options: ["PHP", "Python", "JavaScript", "All of the above"] 
//     } 
// ]; 
 
// let currentQuestionIndex = 0; 
// let totalTimeLeft = 6012; // Total time in seconds (example: 1 hour, 40 minutes, 12 seconds) 
// let timerInterval; 
 
// // Function to format the time as HH:MM:SS 
// function formatTime(seconds) { 
//     const hrs = Math.floor(seconds / 3600);  // Calculate hours 
//     const mins = Math.floor((seconds % 3600) / 60);  // Calculate remaining minutes 
//     const secs = seconds % 60;  // Calculate remaining seconds 
 
//     return `${hrs.toString().padStart(2, '0')}:${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`; 
// } 
 
// // Function to start the global timer for the entire quiz 
// function startQuizTimer() { 
//     document.getElementById('time-left').textContent = formatTime(totalTimeLeft); 
 
//     // Start a global timer for the entire quiz 
//     timerInterval = setInterval(function () { 
//         totalTimeLeft--; 
//         document.getElementById('time-left').textContent = formatTime(totalTimeLeft); 
 
//         if (totalTimeLeft <= 0) { 
//             // Time's up! End the quiz 
//             endQuiz(); 
//         } 
//     }, 1000); // Decrease time every second 
// } 
 
// // Function to load the next question 
// function nextQuestion() { 
//     currentQuestionIndex++; 
     
//     // Move to the next question or end the quiz if there are no more questions 
//     if (currentQuestionIndex < questions.length) { 
//         const currentQuestion = questions[currentQuestionIndex]; 
//         document.getElementById("question-title").textContent = currentQuestion.title; 
//         document.getElementById("question-text").textContent = currentQuestion.text; 
//         document.getElementById("label1").textContent = currentQuestion.options[0]; 
//         document.getElementById("label2").textContent = currentQuestion.options[1]; 
//         document.getElementById("label3").textContent = currentQuestion.options[2]; 
//         document.getElementById("label4").textContent = currentQuestion.options[3]; 
 
//         // Reset radio buttons 
//         const radios = document.querySelectorAll('input[type="radio"]'); 
//         radios.forEach(radio => radio.checked = false); 
 
//     } else { 
//         // End the quiz if no more questions are left 
//         endQuiz(); 
//     } 
// } 
// // Function to back  
// function prevQuestion() { 
//     if (currentQuestionIndex > 0) { 
//         currentQuestionIndex--; // Go to the previous question 
//         const currentQuestion = questions[currentQuestionIndex]; 
//         document.getElementById("question-title").textContent = currentQuestion.title; 
//         document.getElementById("question-text").textContent = currentQuestion.text; 
//         document.getElementById("label1").textContent = currentQuestion.options[0]; 
//         document.getElementById("label2").textContent = currentQuestion.options[1]; 
//         document.getElementById("label3").textContent = currentQuestion.options[2]; 
//         document.getElementById("label4").textContent = currentQuestion.options[3]; 
 
//         // Reset radio buttons 
//         const radios = document.querySelectorAll('input[type="radio"]'); 
//         radios.forEach(radio => radio.checked = false); 
//     } 
// } 
 
 
// // Function to end the quiz when the time runs out or the last question is reached 
// function endQuiz() { 
//     clearInterval(timerInterval); // Stop the timer 
//     document.querySelector('.quiz-container').innerHTML = "<h2>Quiz Completed!</h2>"; 
// } 
 
// // Initialize the quiz by starting the global ti
// startQuizTimer();

let currentQuestionIndex = 0;
let totalTimeLeft = 6012;
let timerInterval;

function formatTime(seconds) {
    const hrs = Math.floor(seconds / 3600);
    const mins = Math.floor((seconds % 3600) / 60);
    const secs = seconds % 60;
    return `${hrs.toString().padStart(2, '0')}:${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
}

function startQuizTimer() {
    document.getElementById('time-left').textContent = formatTime(totalTimeLeft);
    timerInterval = setInterval(function () {
        totalTimeLeft--;
        document.getElementById('time-left').textContent = formatTime(totalTimeLeft);
        if (totalTimeLeft <= 0) {
            endQuiz();
        }
    }, 1000);
}

const questions = document.querySelectorAll('.question-block');

function showQuestion(index) {
    questions.forEach((question, i) => {
        question.style.display = (i === index) ? 'block' : 'none';
    });
}

function saveAnswer() {
    const answer = document.querySelector(`input[name="answer_${currentQuestionIndex}"]:checked`);
    if (answer) {
        sessionStorage.setItem(`answer_${currentQuestionIndex}`, answer.value);
    }
}

function nextQuestion() {
    saveAnswer(); // Save the current answer before moving to the next question
    if (currentQuestionIndex < questions.length - 1) {
        currentQuestionIndex++;
        showQuestion(currentQuestionIndex);
    } else {
        submitAllAnswers(); // Submit all answers if it's the last question
    }
}

function prevQuestion() {
    saveAnswer(); // Save the current answer before going back
    if (currentQuestionIndex > 0) {
        currentQuestionIndex--;
        showQuestion(currentQuestionIndex);
    }
}

function submitAllAnswers() {
    // Collect all answers from sessionStorage
    const formData = new FormData();
    for (let i = 0; i < questions.length; i++) {
        const answer = sessionStorage.getItem(`answer_${i}`);
        if (answer) {
            formData.append(`answer_${i}`, answer);
        }
    }

    // Send formData via a POST request
    fetch('your_submission_url', { // Change to your actual submission URL
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }).then(response => {
        if (response.ok) {
            endQuiz();
        } else {
            alert("Error submitting answers. Please try again.");
        }
    });
}

function endQuiz() {
    clearInterval(timerInterval);
    document.querySelector('.quiz-container').innerHTML = "<h2>Quiz Completed!</h2>";
}

// Initialize quiz
showQuestion(currentQuestionIndex);
startQuizTimer();