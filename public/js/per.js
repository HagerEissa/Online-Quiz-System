document.addEventListener("DOMContentLoaded", function () {
    // const quizData = [
    //     { name: "Math Quiz 1", date: "2024-10-01", score: "90%", timeSpent: "10 mins", correct: 9, incorrect: 1 },
    //     { name: "Science Quiz", date: "2024-09-29", score: "85%", timeSpent: "15 mins", correct: 8, incorrect: 2 },
    //     { name: "History Quiz", date: "2024-09-25", score: "80%", timeSpent: "12 mins", correct: 8, incorrect: 2 },
    //     { name: "Geography Quiz", date: "2024-09-20", score: "95%", timeSpent: "14 mins", correct: 9, incorrect: 1 },
    //     { name: "Physics Quiz", date: "2024-09-18", score: "88%", timeSpent: "12 mins", correct: 8, incorrect: 2 },
    //     { name: "English Quiz", date: "2024-09-15", score: "92%", timeSpent: "11 mins", correct: 9, incorrect: 1 },
    //     // Add more data here as needed
    // ];

    const rowsPerPage = 3;
    let currentPage = 1;
    let filteredData = [...quizData];

    // Function to render the table
    function renderTable() {
        const tableBody = document.querySelector("#performanceTable tbody");
        tableBody.innerHTML = ""; // Clear previous rows

        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        // Render filtered data
        filteredData.slice(start, end).forEach(quiz => {
            const row = document.createElement("tr");

            row.innerHTML = `
                <td>${quiz.name}</td>
                <td>${quiz.date}</td>
                <td>${quiz.score}</td>
                <td>${quiz.timeSpent}</td>
                <td>${quiz.correct}</td>
                <td>${quiz.incorrect}</td>
            `;

            tableBody.appendChild(row);
        });

        // Update page info and disable buttons if necessary
        document.getElementById("pageInfo").textContent = `Page ${currentPage} of ${Math.ceil(filteredData.length / rowsPerPage)}`;
        document.getElementById("prevPage").disabled = currentPage === 1;
        document.getElementById("nextPage").disabled = currentPage === Math.ceil(filteredData.length / rowsPerPage);
    }

    // Function to filter the table based on search term
    function filterTable() {
        const searchTerm = document.getElementById("search").value.toLowerCase();
        filteredData = quizData.filter(quiz => quiz.name.toLowerCase().includes(searchTerm));
        currentPage = 1; // Reset to the first page after filtering
        renderTable(); // Re-render the table with filtered data
    }

    // Attach the filter function to the search input
    document.getElementById("search").addEventListener("keyup", filterTable);

    // Pagination functions
    window.prevPage = function () {
        if (currentPage > 1) {
            currentPage--;
            renderTable();
        }
    };

    window.nextPage = function () {
        if (currentPage < Math.ceil(filteredData.length / rowsPerPage)) {
            currentPage++;
            renderTable();
        }
    };

    // Initial render of the table
    renderTable();
});
