@extends('layouts.app1')
@section('content')
    <div id="quiz-result" class="card m-2 p-2" style="display:none">
        You Scored <span id="quiz-percent"></span>% - <span id="quiz-score"></span>/<span
            id="quiz-max-score"></span><br/>
    </div>
    <div class="container">
        <!-- Quiz Results -->

        <!-- Quiz Container -->
        <div id="quiz">
            <!-- Question 1 -->
{{--            <div class="card quizlib-question">--}}
{{--                <div class="quizlib-question-title">1. Tên</div>--}}
{{--                <div class="quizlib-question-answers">--}}
{{--                    <input type="text" name="Annie">--}}
{{--                </div>--}}
{{--            </div>--}}

            @foreach($questions as $k => $q)
                <!-- Question 2 -->
                <div class="card quizlib-question">
                    <div class="quizlib-question-title">{{$q['label']}}</div>
                    <div class="quizlib-question-answers">
                        <ul>
                            @foreach($q['questions'] as $key=> $row)
                                <li><label><input type="radio" name="p{{$k}}" value="{{$key}}"> {{$row}}</label></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach

            <!-- Answer Button -->
            <button type="button" onclick="showResults();">Check Answers</button>
        </div>
    </div>

    <div class="containers">
        <div id="day-heatmap"></div>
    </div>
@endsection


@section('headerContent')
    <style>
        .card.quizlib-question {
            padding: 10px;
        }
    </style>


    <link rel="stylesheet" href="https://cdn.rawgit.com/CorentinTh/day-heatmap/master/src/day-heatmap.min.css">

    <!-- Just for styling purpose -->
    <style>
        .containers{
            width: 50%;
            margin:200px 25%;
        }
    </style>
@endsection

@section('footerContent')
    <link rel="stylesheet" type="text/css" href="/js/quiz/quizlib.min.css" media="screen">
    <script type="text/javascript" src="/js/quiz/quizlib.1.0.1.min.js"></script>
    <script src="https://cdn.rawgit.com/CorentinTh/day-heatmap/master/src/day-heatmap.min.js"></script>
    <script>
        var dummyData = [{timestamp: 738221588, value: 34},{timestamp: 738221588, value: 34},{timestamp: 738221588, value: 34},{timestamp: 738221588, value: 34},{timestamp: 738241588, value: 34},{timestamp: 738241588, value: 34},{timestamp: 738241588, value: 34},{timestamp: 738241588, value: 34},{timestamp: 738241588, value: 34},{timestamp: 738241588, value: 34},{timestamp: 738241588, value: 34},];

        DayHeatmap("day-heatmap",
            {
                halfDays: true,
                halfHours: false,
                colors: [
                    "#7ae0cc",
                    "#3fc5ab",
                    "#379e8a",
                    "#28675b",
                    "#294C58"
                ]
            }).data(dummyData).draw();
        /**
         * Try this example at https://alpsquid.github.io/quizlib
         */

        var quiz;

        function showResults() {
// Check answers and continue if all questions have been answered
            if (quiz.checkAnswers()) {
                var quizScorePercent = quiz.result.scorePercentFormatted; // The unformatted percentage is a decimal in range 0 - 1
                var quizResultElement = document.getElementById('quiz-result');
                quizResultElement.style.display = 'block';
                document.getElementById('quiz-score').innerHTML = quiz.result.score.toString();
                document.getElementById('quiz-max-score').innerHTML = quiz.result.totalQuestions.toString();
                document.getElementById('quiz-percent').innerHTML = quizScorePercent.toString();

                // Change background colour of results div according to score percent
                if (quizScorePercent >= 75) {
                    quizResultElement.style.backgroundColor = '#4caf50';
                    alert('Giỏi lắm !');
                }
                else if (quizScorePercent >= 50) quizResultElement.style.backgroundColor = '#ffc107';
                else if (quizScorePercent >= 25) quizResultElement.style.backgroundColor = '#ff9800';
                else if (quizScorePercent >= 0) quizResultElement.style.backgroundColor = '#f44336';

// Highlight questions according to whether they were correctly answered. The callback allows us to highlight/show the correct answer
                quiz.highlightResults(handleAnswers);
            }
        }

        $("#quiz-result").hide();

        /** Callback for Quiz.highlightResults. Highlights the correct answers of incorrectly answered questions
         * Parameters are: the quiz object, the question element, question number, correctly answered flag
         */
        function handleAnswers(quiz, question, no, correct) {
            $("#quiz-result").show();
            if (!correct) {
                var answers = question.getElementsByTagName('input');
                for (var i = 0; i < answers.length; i++) {
                    if (answers[i].type === "checkbox" || answers[i].type === "radio") {
// If the current input element is part of the correct answer, highlight it
                        if (quiz.answers[no].indexOf(answers[i].value) > -1) {
                            answers[i].parentNode.classList.add(Quiz.Classes.CORRECT);
                        }
                    } else {
// If the input is anything other than a checkbox or radio button, show the correct answer next to the element
                        var correctAnswer = document.createElement('span');
                        correctAnswer.classList.add(Quiz.Classes.CORRECT);
                        correctAnswer.classList.add(Quiz.Classes.TEMP); // quiz.checkAnswers will automatically remove elements with the temp class
                        correctAnswer.innerHTML = quiz.answers[no];
                        correctAnswer.style.marginLeft = '10px';
                        answers[i].parentNode.insertBefore(correctAnswer, answers[i].nextSibling);
                    }
                }
            }
        }

        window.onload = function () {
            quiz = new Quiz('quiz', [

//                ['b', 'c', 'd']
                @foreach($questions as $k => $q)
                    @foreach($q['answer'] as $key=> $row)
                        ['{{$row}}'],
                    @endforeach
                @endforeach

            ]);
        };
    </script>
@endsection

