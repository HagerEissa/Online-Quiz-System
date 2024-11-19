

document.addEventListener("DOMContentLoaded", function () {
    // const quizHistory = [
    //     {
    //         quizName: "Math Quiz 1",
    //         dateTaken: "2024-10-01",
    //         score: "90%",
    //         timeSpent: "10 mins",
    //     },
    //     {
    //         quizName: "Science Quiz",
    //         dateTaken: "2024-09-29",
    //         score: "85%",
    //         timeSpent: "15 mins",
    //     },
    //     {
    //         quizName: "History Quiz",
    //         dateTaken: "2024-09-25",
    //         score: "80%",
    //         timeSpent: "12 mins",
    //     }
    // ];

    const historyTableBody = document.querySelector("#history-table tbody");

    quizHistory.forEach(quiz => {
        const row = document.createElement("tr");

        const quizNameCell = document.createElement("td");
        quizNameCell.textContent = quiz.quizName;
        row.appendChild(quizNameCell);

        const dateTakenCell = document.createElement("td");
        dateTakenCell.textContent = quiz.dateTaken;
        row.appendChild(dateTakenCell);

        const scoreCell = document.createElement("td");
        scoreCell.textContent = quiz.score;
        row.appendChild(scoreCell);

        const timeSpentCell = document.createElement("td");
        timeSpentCell.textContent = quiz.timeSpent;
        row.appendChild(timeSpentCell);

        historyTableBody.appendChild(row);
    });
});

