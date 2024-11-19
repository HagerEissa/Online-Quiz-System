@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="./css/profil.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">

</head>

<body >
    <div class="container" style="margin-top: 100px">
        <header class="dashboard-header">

            <nav>
                <ul style="display: flex; justify-content: center; gap: 2rem; font-size: large; font-weight: 700;">
                    {{-- <li><a href="{{route}}">Home</a></li> --}}
                    <li><a href="{{ route('quiz.list') }}">Take a Quiz</a></li>
                    {{-- <li><a href="./Performance.html">Performance History</a></li> --}}
                    <li><a href="{{ route('user.results') }}">Performance History</a></li>
                    {{-- <li><a href="#">Logout</a></li> --}}
                </ul>
            </nav>
        </header>

        <section class="user-info">
            <h2>Your Performance Summary</h2>
            <div class="summary">
                <div class="summary-item">
                    <h3>Total Quizzes Taken</h3>
                    {{-- <p id="total-quizzes">8</p> --}}
                    <p id="total-quizzes">{{ $totalQuizzesTaken }}</p>
                </div>
                <div class="summary-item">
                    <h3>Average Score</h3>
                    {{-- <p id="average-score">85%</p> --}}
                    <p id="average-score">{{ $averageScore ?? 'N/A' }}</p>
                </div>
                <div class="summary-item">
                    <h3>Highest Score</h3>
                    {{-- <p id="highest-score">100%</p> --}}
                    <p id="highest-score">{{ $highestScore ?? 'N/A' }}</p>
                </div>
            </div>
        </section>

        <section class="quiz-history">
            <h2>Quiz Performance History</h2>
            <table id="history-table">
                <thead>
                    <tr>
                        <th>Quiz Name</th>
                        <th>Date Taken</th>
                        <th>Score</th>
                        <th>Time Spent</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Performance history -->
                    @foreach($quizHistory as $result)
                    <tr>
                        <td>{{ $result->quiz->title }}</td>
                        <td>{{ $result->created_at->format('Y-m-d') }}</td>
                        <td>{{ $result->achieved_score }}</td>
                        <td>{{ $result->time_spent ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <script src="./js/profile.js"></script>
</body>

</html>

@endsection
