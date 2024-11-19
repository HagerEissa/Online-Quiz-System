@extends('layouts.app')

@section('content')
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
/* Navbar styles */
.navbar {
    transition: all 0.3s ease;
    padding: 1rem;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    background-color: #f8f9fa;
    backdrop-filter: blur(10px);
  }

  .navbar-brand {
    font-weight: bold;
    font-size: 1.5rem;
    color: #007bff;
  }

  .navbar-brand:hover {
    color: #007bff;
  }

  .navbar-brand:focus {
    color: #007bff !important;
  }

  .nav-item {
    color: #343a40;
  }

  /* Reset default dropdown arrow */
  .dropdown-toggle::after {
    display: none !important;
  }

  /* Custom styles for all navbar links including dropdown */
  .nav-link,
  .navbar-nav .dropdown-toggle {
    position: relative;
    margin: 0 0.5rem;
    color: #343a40 !important;
    text-decoration: none;
  }

  /* Custom underline effect for all navbar links */
  .nav-link::before,
  .navbar-nav .dropdown-toggle::before {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -2px;
    left: 0;
    background-color: #007bff;
    transition: width 0.3s ease;
  }

  /* Hover effect for all navbar links */
  .nav-link:hover::before,
  .navbar-nav .dropdown-toggle:hover::before {
    width: 100%;
  }

  /* Hover color for text */
  .nav-link:hover,
  .navbar-nav .dropdown-toggle:hover {
    color: #007bff !important;
  }

  /* Active state */
  .nav-link.active,
  .navbar-nav .dropdown-toggle.active {
    color: #007bff !important;
  }

  .nav-link.active::before,
  .navbar-nav .dropdown-toggle.active::before {
    width: 100%;
  }

  /* Dropdown menu styling */
  .dropdown-menu {
    border: none;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    background-color: white;
    padding: 0.5rem 0;
  }

  /* Style for dropdown items */
  .dropdown-item {
    color: #343a40 !important; /* Force dark gray text color */
    padding: 0.5rem 1.5rem;
    transition: all 0.3s ease;
  }

  /* Hover state for dropdown items */
  .dropdown-item:hover {
    background-color: #007bff;
    color: white !important; /* White text on blue background */
  }

  /* Active/Focus state for dropdown items */
  .dropdown-item:active,
  .dropdown-item:focus {
    background-color: #007bff;
    color: white !important;
  }

  /* Override Bootstrap's default dropdown styles */
  .navbar-nav .nav-item.dropdown .dropdown-toggle {
    color: #343a40 !important;
  }

  .navbar-nav .nav-item.dropdown .dropdown-toggle:hover {
    color: #007bff !important;
  }

  /* Ensure the underline is always blue */
  .navbar-nav .nav-item.dropdown .dropdown-toggle::before {
    background-color: #007bff !important;
  }

  /* Rest of your existing styles... */

:root {
    --primary-color: #4ECDC4;
    --accent-color: #33282f;
    --text-color: #2C3E50;
    --background-color: #F7F7F7;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color:#f8f9fa;;
    color: var(--text-color);
}

.sidebar {
    background-color: #f8f9fa !important;
    min-height: 100vh;
    padding-top: 90px;
}

.sidebar .nav-link {
    color: rgb(0, 0, 0);
    transition: all 0.3s ease;
}

.sidebar .nav-link:hover, .sidebar .nav-link.active {
    background-color: var(--primary-color);
    transform: translateX(10px);
}

.sidebar .nav-link i {
    margin-right: 10px;
}

main {
    padding-top: 20px;
}

.quiz-card {
    background-color: white;
    border-radius: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateY(20px);
}

.quiz-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.quiz-card .card-title {
    color: var(--primary-color);
}

.quiz-card .btn-primary {
    background-color: var(--accent-color);
    border: none;
    transition: all 0.3s ease;
}

.quiz-card .btn-primary:hover {
    background-color: var(--primary-color);
    transform: scale(1.05);
}

.quiz-card .card-img-top {
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    height: 200px;
    object-fit: cover;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.fade-in-up {
    animation: fadeInUp 0.5s ease forwards;
}

.modal-content {
    animation: fadeInUp 0.5s ease forwards;
}
</style>



<link rel="stylesheet" href="{{asset('css/per.css')}}">

<div class="container" style="position: relative;top:100px">
    <header class="performance-header">
        <h1>Performance History</h1>
        <a href="{{route('profile.show')}}" class="back-btn">← Back to Dashboard</a>
    </header>

    <section class="filter-section">
        <label for="search">Filter by Quiz Name:</label>
        <input type="text" id="search" placeholder="Type to search..." onkeyup="filterTable()">
    </section>

    <section class="history-table">
        <table id="performanceTable">
            <thead>
                <tr>
                    <th>Quiz Name</th>
                    <th>Date Taken</th>
                    <th>Score</th>
                    <th>Time Spent In Seconds</th>
                    <th>Correct Answers</th>
                    <th>Incorrect Answers</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                <tr>
                    <td style="font-weight:600;font-family:Arial, Helvetica, sans-serif;font-size:large">{{$result->quiz->title}}</td>
                    <td style="font-weight:500">{{ now()->format('Y-m-d') }}</td>
                    <td style="font-weight:500">{{$result->achieved_score}}</td>
                    <td style="font-weight:500">{{$result->time_spent}}</td>
                    <td style="font-weight:500">{{$result->correct_answers}}</td>
                    <td style="font-weight:500">{{$result->incorrect_answers}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>

<div>
    {{ $results->links() }}
</div>

{{-- Filter Table Script --}}
<script>
    function filterTable() {
        let input = document.getElementById("search");
        let filter = input.value.toLowerCase();
        let table = document.getElementById("performanceTable");
        let rows = table.getElementsByTagName("tr");

        for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
            let quizNameCell = rows[i].getElementsByTagName("td")[0]; // Quiz Name is in the first column
            if (quizNameCell) {
                let quizName = quizNameCell.textContent || quizNameCell.innerText;
                if (quizName.toLowerCase().indexOf(filter) > -1) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    }
</script>

@endsection
