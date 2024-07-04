@extends('layouts.master')

@section('css')
    <!-- datatables css -->
    <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
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
                        <h3 class="box-title">Insert Revenue</h3>
                    </div>
                    <div class="card-body">
                        @if (isset($item))
                            {!! Form::model($item, [
                                'route' => ['update_company_revenue', $item->id],
                                'method' => 'PUT',
                                'enctype' => 'multipart/form-data',
                                'class' => 'custom-validation',
                                'files' => true,
                                'role' => 'form',
                                'id' => 'edit-form',
                            ]) !!}
                        @else
                            {!! Form::open([
                                'route' => ['store_company_revenue'],
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
                                    {!! Form::label('monthly_target_value', 'Monthly Target Value') !!}
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {!! Form::text('monthly_target_value', isset($item->monthly_target_value) ? $item->monthly_target_value : null, [
                                            'class' => 'form-control',
                                        ]) !!}
                                        {!! $errors->first('monthly_target_value', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-2 text-right">
                                    {!! Form::label('achievement_value', 'Achievement Value') !!}
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {!! Form::text('achievement_value', isset($item->achievement_value) ? $item->achievement_value : null, [
                                            'class' => 'form-control',
                                        ]) !!}
                                        {!! $errors->first('achievement_value', '<p class="help-block text-danger">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-3">
                                <div class="col-md-2 text-right">
                                    {!! Form::label('', 'Date') !!}
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        {!! Form::text('date', null,['class'=> 'form-control datepicker']) !!}
                                        {!! $errors->first('date', '<p class="help-block text-danger">:message</p>') !!}
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
@section('script')
    <script src="{{ URL::asset('/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript">
        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });
    </script>
@endsection
