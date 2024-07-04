@extends('layouts.master')

@section('css')
    <!-- datatables css -->
    <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <main>
                <div class="card">
                    <div class="box-header with-border col-12 text-center">
                        <h3 class="box-title">Add Position</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($item))
                            {!! Form::model($item, [
                                'route' => ['update_position', $item->id],
                                'method' => 'PUT',
                                'enctype' => 'multipart/form-data',
                                'class' => 'custom-validation',
                                'files' => true,
                                'role' => 'form',
                                'id' => 'edit-form',
                            ]) !!}
                        @else
                            {!! Form::open([
                                'route' => ['store_position'],
                                'method' => 'POST',
                                'enctype' => 'multipart/form-data',
                                'class' => 'custom-validation',
                                'files' => true,
                                'role' => 'form',
                                'id' => 'add-form',
                            ]) !!}
                        @endif
                        <form class="custom-validation" action="#">
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-2 text-right">
                                    {!! Form::label('name', 'Name') !!}
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {!! Form::text('name', isset($item->name) ? $item->name : null, ['class' => 'form-control']) !!}
                                        {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-2 text-right">
                                    {!! Form::label('', 'Status') !!}
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {!! Form::select('status', $is_active, isset($item->status) ? $item->status : null, [
                                            'class' => 'form-control',
                                        ]) !!}
                                        {!! $errors->first('status', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 text-center">
                                    <div class="form-group mb-0">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- end col -->
            </main>
        </div>
    </div>
@endsection
