let selectedQuizId; // Declare variable for selected quiz ID

function selectQuiz(quizId) {
    selectedQuizId = quizId; // Set selected quiz ID
    const modal = new bootstrap.Modal(document.getElementById('levelModal'));
    modal.show(); // Open the level selection modal
}

function startQuiz(level) {
    if (selectedQuizId) {
        // Redirect to QuizPage.html with the quiz ID and level as query parameters
        window.location.href = `QuizPage.html?quizId=${selectedQuizId}&level=${level}`;
    } else {
        alert('Please select a quiz first.');
    }
}

// Event listeners for quiz level buttons
document.getElementById('easy-level').addEventListener('click', () => {
    startQuiz('easy');
});

document.getElementById('medium-level').addEventListener('click', () => {
    startQuiz('medium');
});

document.getElementById('hard-level').addEventListener('click', () => {
    startQuiz('hard');
});
