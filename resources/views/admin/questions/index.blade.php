@extends('layouts.master')
@section('css')
    <!-- datatables css -->
    <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="card shadow mb-12">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @elseif(session('delete_status'))
                        <div class="alert alert-danger">{{ session('delete_status') }}</div>
                    @endif
                    <div class="row justify-content-center">
                        <h2>Questions List</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    {{-- <select id="group-select" class="form-control mb-3">
                                        <option value="">Select Group</option>
                                        @if (is_array($group) && count($group) > 0)
                                            @foreach ($group as $groups)
                                                <option value="{{ $groups->id }}">{{ $groups->name }}</option>
                                            @endforeach
                                        @endif
                                    </select> --}}

                                    <select id="Qstype-select" class="form-control mb-3">
                                        @foreach ($Qstype as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>

                                    {{-- <select id="position-select" class="form-control mb-3">
                                        <option value="">Select Position</option>
                                        @if (is_array($position) && count($position) > 0)
                                            @foreach ($position as $positions)
                                                <option value="{{ $positions->id }}">{{ $positions->name }}</option>
                                            @endforeach
                                        @endif
                                    </select> --}}

                                    {{-- Table Structure --}}
                                    <div class="table-responsive">
                                        <table id="datatable_custom" class="table table-bordered" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th class="th-sm">SL</th>
                                                    <th class="th-sm">Question Title</th>
                                                    <th class="th-sm">Option Title</th>
                                                    <th class="th-sm">Question Group</th>
                                                    <th class="th-sm">Position</th>
                                                    <th class="th-sm">Status</th>
                                                    <th class="th-sm">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-body">
                                                {{-- Table rows will be inserted here --}}
                                            </tbody>
                                        </table>
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
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById('Qstype-select').addEventListener('change', function() {
            var Qstype_id = document.getElementById('Qstype-select').value;
            // console.log(Qstype_id);
            var tableBody = document.getElementById('table-body');
            tableBody.innerHTML = ''; // Clear the table

            // Filter and display items based on the selected test and skill
            let index = 1; // Initialize the index
            @foreach ($item as $item)
                if (Qstype_id) {
                    let optionsHtml = '';
                    @php
                        $options = explode(';', $item->Qoption_title);
                    @endphp
                    @if ($options[0] != '')
                        optionsHtml +=
                            '<div class="options-wrapper" style="border: 1px solid #ddd; padding: 5px;">';
                        @foreach ($options as $option)
                            optionsHtml +=
                                '<div class="option-item" style="border-bottom: 1px solid #ddd; padding: 4px;">{{ $option }}</div>';
                        @endforeach
                        optionsHtml += '</div>';
                    @else
                        optionsHtml += '<div class="options-wrapper" style="border: none;"></div>';
                    @endif

                    // Log the optionsHtml for debugging
                    console.log(optionsHtml);

                    let row = `<tr>
                                    <th scope="row">${index}</th>
                                    <td>{!! $item->title !!}</td>
                                    <td>${optionsHtml}</td>
                                    <td>{!! $item->question_group_name !!}</td>
                                    <td>{!! $item->position_name !!}</td>
                                    <td>{!! $item->is_active
                                        ? '<button class="btn btn-success btn-xs">Active</button>'
                                        : '<button class="btn btn-danger btn-xs">Inactive</button>' !!}</td>
                                    <td>
                                    </td>
                                </tr>`;

                    // Function to apply width style to all images in the given HTML
                    tableBody.innerHTML += row;
                    index++; // Increment the index
                }
            @endforeach
        });
    </script>
@endsection
