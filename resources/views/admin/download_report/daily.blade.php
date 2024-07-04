@extends('layouts.master')
@section('css')
    <!-- datatables css -->
    <!-- <link href="{{ URL::asset('libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/> -->
    <link href="{{ URL::asset('libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

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
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="card shadow mb-12">
                    @if (session('status'))
                        <div class="alert alert-success">{{ session('status') }}</div>
                    @endif
                    <div class="box-header with-border col-12 text-center">
                        <h3 class="box-title">Daily Report Download</h3>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Position List
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Position</th>
                                        <th>Date</th>
                                        <th>Report's</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($item as $items)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $items->name }}</td>
                                            <td>{{ $items->position_name }}</td>
                                            <td>{{ $items->created_at }}</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('daily_pdf', $items->id) }}"><i
                                                    class="fa fa-download"></i> download</a>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger" data-toggle="tooltip"
                                                    title="Delete" style="display:inline;padding:2px 5px 3px 5px;"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
@section('script')
    <!-- Plugins js -->
    <!-- <script src="{{ URL::asset('libs/datatables/datatables.min.js') }}"></script>
                                            <script src="{{ URL::asset('js/pages/datatables.init.js') }}"></script>
                                            <script src="{{ URL::asset('libs/jquery-ui/jquery-ui.min.js') }}"></script> -->
    <script src="{{ URL::asset('libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@endsection
