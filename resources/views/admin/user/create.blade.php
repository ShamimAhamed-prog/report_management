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
                        <h3 class="box-title">Add User</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($item))
                            {!! Form::model($item, [
                                'route' => ['update_user', $item->id],
                                'method' => 'PUT',
                                'enctype' => 'multipart/form-data',
                                'class' => 'custom-validation',
                                'files' => true,
                                'role' => 'form',
                                'id' => 'edit-form',
                            ]) !!}
                        @else
                            {!! Form::open([
                                'route' => ['store_user'],
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
                                    {!! Form::label('user_name', 'User Name') !!}
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {!! Form::text('user_name', isset($item->user_name) ? $item->user_name : null, ['class' => 'form-control']) !!}
                                        {!! $errors->first('user_name', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-2 text-right">
                                    {!! Form::label('full_name', 'Full Name') !!}
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {!! Form::text('full_name', isset($item->full_name) ? $item->full_name : null, ['class' => 'form-control']) !!}
                                        {!! $errors->first('full_name', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-2 text-right">
                                    {!! Form::label('reporting_user', 'Reporting User') !!}
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {!! Form::select('reporting_user', $reportingUser, isset($item->reporting_user) ? $item->reporting_user : null, [
                                            'class' => 'form-control',
                                        ]) !!}
                                        {!! $errors->first('reporting_user', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-2 text-right">
                                    {!! Form::label('position_id', 'Position') !!}
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {!! Form::select('position_id', $position, isset($item->position_id) ? $item->position_id : null, [
                                            'class' => 'form-control',
                                        ]) !!}
                                        {!! $errors->first('position_id', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            @if (!isset($item))
                                <div class="row justify-content-center mb-3">
                                    <div class="col-md-2 text-right">
                                        {!! Form::label('password', 'Password') !!}
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            {!! Form::password('password', ['class' => 'form-control']) !!}
                                            {!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-3">
                                    <div class="col-md-2 text-right">
                                        {!! Form::label('confirm_password', 'Confirm Password') !!}
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
                                            {!! $errors->first('confirm_password', '<p class="help-block text-danger">:message</p>') !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-2 text-right">
                                    {!! Form::label('is_active', 'Status') !!}
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {!! Form::select('is_active', $is_active, isset($item->is_active) ? $item->is_active : null, [
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
