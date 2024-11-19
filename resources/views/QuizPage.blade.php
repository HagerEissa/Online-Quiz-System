<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Page</title>
    <link rel="stylesheet" href="{{ asset('/css/QuizPage.css') }}">
</head>
<body>
    <style>
        /* Timer and Modal Styling */
        #timer_style {
            font-size: 1.5em;
            font-weight: bold;
            color: #ff4500;
            padding: 5px 10px;
            border-radius: 5px;
            width: 60px;
            background-color: #8e7459;
        }
        #minutes, #seconds {
            background-color: transparent;
        }
        .time-up-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }
        .time-up-modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-size: 1.5em;
            color: #ff4500;
        }
    </style>

    <div class="head">
        <h3>Quizify</h3>
        <div class="timer" style="position: relative; left: -50px; margin-top: 10px">
            <img style="position: absolute; top: 92px; right: -50px; color: rgb(217, 231, 241)" src="{{ asset('/Assets/Images/stopwatch.png') }}" alt="">
            <h3 style="position: relative; top: 10px; color: rgb(217, 231, 241)">Exam Time: {{ $questions->first()->quiz->duration }} Minutes or {{ $questions->first()->quiz->duration * 60 }} Seconds</h4>        
            <h4 style="color: rgb(217, 231, 241)">Timer: <div id="timer_style" style="background-color: transparent;"><label id="minutes">00</label>:<label id="seconds">00</label></div></h4>        
        </div>
    </div>

    <div class="quiz-container">
        <form id="quiz-form" action="{{ route('quiz.submitAnswer') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="quiz_id" value="{{ $questions->first()->quiz->id }}">
            <input type="hidden" id="selectedAnswers" name="selected_answers">
            <input type="hidden" id="timeSpent" name="time_spent">

            @foreach($questions as $index => $question)
                @php
                    $options = json_decode($question->options, true);
                @endphp

                <div class="question-block" style="display: {{ $index === 0 ? 'block' : 'none' }};">
                    <h1>Question {{ $index + 1 }}</h1>
                    <h2>{{ $question->question }}</h2>

                    <div class="options">
                        @foreach($options as $key => $option)
                        <div class="option">
                            <input type="radio" id="option_{{ $index }}_{{ $key }}" name="answers[{{ $question->id }}]" value="{{ $option }}" required>
                            <label for="option_{{ $index }}_{{ $key }}">{{ $option }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach 

            <!-- Navigation Buttons -->
            <button type="button" class="back-btn" onclick="prevQuestion()" style="display: none;">Back</button> 
            <button type="button" class="next-btn" onclick="nextQuestion()">Next</button>
            <button type="button" onclick="submitQuiz()" class="submit-btn" style="display: none;">Submit Quiz</button>
        </form>     
    </div>

    <script>
        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var quizDurationInSeconds = {{ $questions->first()->quiz->duration * 60 }};
        var totalSeconds = quizDurationInSeconds;
        var startTime = Date.now();
        var currentQuestionIndex = 0;
        var questionBlocks = document.querySelectorAll('.question-block');
        var backButton = document.querySelector('.back-btn');
        var nextButton = document.querySelector('.next-btn');
        var submitButton = document.querySelector('.submit-btn');

        setInterval(setTime, 1000);
    
        function setTime() {
            if (totalSeconds <= 0) {
                showTimeUpModal(); // Show the time-up modal when time is over
            } else {
                --totalSeconds;
                secondsLabel.innerHTML = pad(totalSeconds % 60);
                minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
            }
        }
    
        function pad(val) {
            var valString = val + "";
            return valString.length < 2 ? "0" + valString : valString;
        }

        function showQuestion(index) {
            questionBlocks.forEach((block, i) => {
                block.style.display = i === index ? 'block' : 'none';
            });
            backButton.style.display = index > 0 ? 'inline-block' : 'none';
            nextButton.style.display = index < questionBlocks.length - 1 ? 'inline-block' : 'none';
            submitButton.style.display = index === questionBlocks.length - 1 ? 'inline-block' : 'none';
        }

        function nextQuestion() {
            if (currentQuestionIndex < questionBlocks.length - 1) {
                currentQuestionIndex++;
                showQuestion(currentQuestionIndex);
            }
        }

        function prevQuestion() {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                showQuestion(currentQuestionIndex);
            }
        }

        function submitQuiz() {
            var timeSpent = Math.floor((Date.now() - startTime) / 1000);
            document.getElementById('timeSpent').value = timeSpent;
            document.getElementById('selectedAnswers').value = JSON.stringify(getSelectedAnswers());
            document.getElementById('quiz-form').submit();
        }
    
        function getSelectedAnswers() {
            const answers = {};
            const questions = @json($questions); // Passing questions to JavaScript
            questions.forEach(question => {
                const selectedOption = document.querySelector(`input[name="answers[${question.id}]"]:checked`);
                if (selectedOption) {
                    answers[question.id] = selectedOption.value;
                } else {
                    answers[question.id] = null; // Default value if no option selected
                }
            });
            return answers;
        }

        // Function to show the "Time Up" modal
        function showTimeUpModal() {
            const modalHTML = `
                <div id="timeUpModal" class="time-up-modal">
                    <div class="time-up-modal-content">
                        <p>Time is Over! Your answers are being submitted.</p>
                    </div>
                </div>`;
            document.body.insertAdjacentHTML('beforeend', modalHTML);

            setTimeout(submitQuiz, 2000); // Submit quiz after 2 seconds
        }

        // Initial display
        showQuestion(currentQuestionIndex);
    </script>
</body>
</html>
