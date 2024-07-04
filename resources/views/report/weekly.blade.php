@extends('layouts.master')
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @elseif (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                        <div class="col-4 text-start">
                            <h4 class="box-title mb-0">Weekly Report</h4>
                        </div>
                        <div class="col-4 text-center">
                            <h5 class="box-subtitle mt-2">Position: {{ auth()->user()->user_name }}</h5>
                        </div>
                        <div class="col-4 text-end">
                            <button class="btn btn-danger" id="submitAnswers">Submit Report</button>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12"
                                style="max-height: calc(100vh - 200px); overflow-y: auto; overflow-x: hidden;">
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <section class="test-panel">
                                            @if (empty($organizedData['questions']))
                                                <p class="text-center">No questions available.</p>
                                            @else
                                                @foreach ($organizedData['questions'] as $questionId => $question)
                                                    <div class="test-panel__item mb-3 p-2 border rounded"
                                                        id="ques-{{ $loop->iteration }}">
                                                        <div class="test-panel__question">
                                                            <div class="test-panel__question-desc">
                                                                <div
                                                                    class="field field--name-field-question field--type-text-long field--label-hidden field--item">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <p class="">
                                                                                @php
                                                                                    $start = $loop->iteration;
                                                                                    $modifiedTitle = preg_replace_callback(
                                                                                        '/<(input|select) /',
                                                                                        function ($matches) use (
                                                                                            &$start,
                                                                                        ) {
                                                                                            $tag = $matches[1];
                                                                                            $replacement =
                                                                                                '<' .
                                                                                                $tag .
                                                                                                ' id="ques-' .
                                                                                                $start .
                                                                                                '" placeholder="' .
                                                                                                $start++ .
                                                                                                '"';
                                                                                            return $replacement;
                                                                                        },
                                                                                        $question['title'],
                                                                                    );
                                                                                @endphp
                                                                                {!! $modifiedTitle !!} ({{$question['group_name']  }})
                                                                            </p>
                                                                        </div>
                                                                        {{-- <div class="col-6 text-end"> <span>
                                                                                Question Group: {{ $question['group_name'] }}</span>
                                                                        </div> --}}

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if (isset($question['type']))
                                                            @php
                                                                $sortedOptions = collect($question['options'])
                                                                    ->sortBy('option_id')
                                                                    ->values()
                                                                    ->all();
                                                            @endphp
                                                            @if ($question['type'] == 1)
                                                                <div class="test-panel__answer mt-2">
                                                                    @foreach ($sortedOptions as $optionKey => $option)
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input"
                                                                                id="q-{{ $questionId }}-{{ $optionKey }}"
                                                                                data-num="{{ $questionId }}"
                                                                                name="q-{{ $questionId }}"
                                                                                data-q_type="15"
                                                                                value="{{ $option['option'] }}">
                                                                            <label class="form-check-label"
                                                                                for="q-{{ $questionId }}-{{ $optionKey }}">
                                                                                {{ $option['option'] }}
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @elseif ($question['type'] == 2)
                                                                <div class="test-panel__answer mt-2">
                                                                    @foreach ($sortedOptions as $optionKey => $option)
                                                                        <div class="form-check">
                                                                            <input type="checkbox" class="form-check-input"
                                                                                id="q-{{ $questionId }}-{{ $optionKey }}"
                                                                                data-num="{{ $questionId }}"
                                                                                name="q-{{ $questionId }}"
                                                                                data-q_type="15"
                                                                                value="{{ $option['option'] }}">
                                                                            <label class="form-check-label"
                                                                                for="q-{{ $questionId }}-{{ $optionKey }}">
                                                                                {{ $option['option'] }}
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @elseif ($question['type'] == 3)
                                                                <div class="test-panel__answer mt-2">
                                                                    @foreach ($sortedOptions as $optionKey => $option)
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="q-{{ $questionId }}-{{ $optionKey }}">{{ $option['option'] }}</label>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Write your answer here..."
                                                                                id="q-{{ $questionId }}-{{ $optionKey }}"
                                                                                name="q-{{ $questionId }}[{{ $optionKey }}]"
                                                                                value="{{ old('q-' . $questionId . '-' . $optionKey, $option['option']) }}">
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @endif
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('script')
<script>
    document.getElementById('submitAnswers').addEventListener('click', function() {
        // Prepare data to be sent
        let answers = {};
        let questionItems = document.querySelectorAll('.test-panel__item');
        questionItems.forEach(function(item) {
            let questionId = item.id.replace('ques-', '');
            let answer = null;

            // Check answer type (radio, checkbox, text)
            let radioInput = item.querySelector('input[type=radio]:checked');
            let checkboxInputs = item.querySelectorAll('input[type=checkbox]:checked');
            let textInputs = item.querySelectorAll('input[type=text]');

            if (radioInput) {
                answer = radioInput.value;
            } else if (checkboxInputs.length > 0) {
                answer = [];
                checkboxInputs.forEach(function(input) {
                    answer.push(input.value);
                });
            } else if (textInputs.length > 0) {
                answer = {};
                textInputs.forEach(function(input, index) {
                    answer[index] = input.value;
                });
            }

            // Save answer for this question
            answers[questionId] = answer;
        });

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Send AJAX request to store answers
        fetch('{{ route('weekly_submit') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken, // Ensure CSRF token is included
                },
                body: JSON.stringify({
                    answers: answers
                })
            })
            .then(data => {
                // Handle success response
                alert('Answers submitted successfully');
                setTimeout(function() {
                    window.location.href = "{{ route('dashboard') }}"; // Redirect to the dashboard
                }, 1000); // Redirect after 1 second
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to submit answers');
            });
    });
</script>
@endsection
