@extends('layouts.master')
@section('css')
    <!-- datatables css -->
    <!-- <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/> -->
    <link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <style>
        table,
        td,
        th {
            vertical-align: middle !important;
        }

        table th {
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @elseif (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="card">
                    <div class="box-header with-border col-12 text-center">
                        <h3 class="box-title">Create Questions</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($item))
                            {!! Form::model($item, [
                                'route' => ['update_question', $item->id],
                                'method' => 'PUT',
                                'class' => 'custom-validation',
                                'files' => true,
                                'role' => 'form',
                                'id' => 'edit-form',
                            ]) !!}
                        @else
                            {!! Form::open([
                                'route' => ['store_question'],
                                'method' => 'POST',
                                'class' => 'custom-validation',
                                'files' => true,
                                'role' => 'form',
                                'id' => 'add-form',
                            ]) !!}
                            @csrf
                        @endif
                        <div class="row">
                            <div class="col-md-7 offset-md-2">
                                <form class="custom-validation" action="#">
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-left">
                                            {!! Form::label('question_group_id', 'Question Group') !!}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                {!! Form::select(
                                                    'question_group_id',
                                                    $group,
                                                    isset($item->question_group_id) ? $item->question_group_id : null,
                                                    [
                                                        'class' => 'form-control',
                                                    ],
                                                ) !!}

                                                {!! $errors->first('question_group_id', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-left">
                                            {!! Form::label('position_id', 'Position') !!}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                {!! Form::select('position_id', $position, isset($item->position_id) ? $item->position_id : null, [
                                                    'class' => 'form-control',
                                                ]) !!}

                                                {!! $errors->first('position_id', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-3 text-left">
                                            {!! Form::label('question_submit_type_id', 'Question Submit Type') !!}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                {!! Form::select(
                                                    'question_submit_type_id',
                                                    $Qstype,
                                                    isset($item->question_submit_type_id) ? $item->question_submit_type_id : null,
                                                    [
                                                        'class' => 'form-control',
                                                    ],
                                                ) !!}
                                                {!! $errors->first('question_submit_type_id', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-left">
                                            {!! Form::label('question_type_id', 'Question Type') !!}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                {!! Form::select('question_type_id', $type, isset($item->question_type_id) ? $item->question_type_id : null, [
                                                    'class' => 'form-control',
                                                    'id' => 'question_type', // Add an ID to the select element
                                                ]) !!}
                                                {!! $errors->first('question_type_id', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-left">
                                            {!! Form::label('title', 'Question Title') !!}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                {!! Form::text('title', isset($item->title) ? $item->title : null, [
                                                    'class' => 'form-control',
                                                    'id' => 'title', // Add an ID to the select element
                                                ]) !!}
                                                {!! $errors->first('title', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2" id="options-div">
                                        <div class="col-md-3 text-left">
                                            {!! Form::label('options', 'Options') !!}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                {!! Form::text('options', isset($item->options) ? $item->options : null, [
                                                    'class' => 'form-control',
                                                    'id' => 'options',
                                                ]) !!}
                                                {!! $errors->first('options', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-left">
                                            {!! Form::hidden('options', 'Options') !!}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <div class="col-md-12" id="dynamic-options-container">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3 text-left">
                                            {!! Form::label('is_active', 'Status') !!}
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                {!! Form::select('is_active', $is_active, isset($item->is_active) ? $item->is_active : 1, [
                                                    'class' => 'form-control',
                                                ]) !!}

                                                {!! $errors->first('is_active', '<p class="help-block text-danger">:message</p>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="form-group mb-0">
                                                <div>
                                                    <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light mr-1">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div> <!-- end col -->
            </main>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var existingOptions = @json($options ?? []);

        function updateOptions() {
            let questionType = $('#question_type').val();
            let numOptions = parseInt($('#options').val());

            // Reset the value for the 'options' field if in edit mode
            if (existingOptions.length > 0) {
                numOptions = existingOptions.length;
                $('#options').val(numOptions);
            }

            $('#dynamic-options-container').empty();

            for (let i = 0; i < numOptions; i++) {
                let inputContainer = $('<div>').addClass('input-container');

                if (questionType === '1' || questionType === '2') {
                    // Code for radio and checkbox options
                    let textField = $('<input>').attr({
                        type: 'text',
                        name: 'options[]',
                        class: 'form-control input-field',
                        value: existingOptions.length > 0 ? existingOptions[i]['text'] : ''
                    });

                    let inputType = (questionType === '1' || questionType === '2') ? 'radio' : 'checkbox';
                    let inputName = (questionType === '1' || questionType === '2');

                    let inputField = $('<input>').attr({
                        type: inputType,
                        name: inputName,
                        value: i + 1
                    });

                    inputContainer.append(inputField, textField);
                    $('#dynamic-options-container').append(inputContainer);
                }
            }
        }

        $(document).ready(function() {
            $('#question_type').on('change', function() {
                existingOptions = []; // Reset existing options when the question type changes
                updateOptions();
            });

            $('#options').on('input', updateOptions);

            if (existingOptions.length > 0) {
                updateOptions(); // Call this with existing options if in edit mode
            }
        });
    </script>


    <style>
        .input-field {
            margin-bottom: 10px;
            border-radius: 40px;
            width: 300px;
        }

        .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            border-radius: 40px;
        }

        input[type="checkbox"],
        input[type="radio"] {
            box-sizing: border-box;
            padding: 0;
            margin-right: 10px;
        }
    </style>
    <script>
        function updateOptionsVisibility() {
            const questionType = document.getElementById('question_type').value;
            const optionsDiv = document.getElementById('options-div');

            if (questionType === '3') {
                optionsDiv.style.display = 'none';
            } else {
                optionsDiv.style.display = 'flex';
            }
        }

        // Initialize visibility based on the current value
        updateOptionsVisibility();

        // Add an event listener to update visibility when the question type changes
        document.getElementById('question_type').addEventListener('change', updateOptionsVisibility);
    </script>
@endsection
