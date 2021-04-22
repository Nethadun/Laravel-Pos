@extends('adminlte::page')

@section('title', 'Customer')

@section('content_header')
<h1>Master File/Create Customer</h1>
@stop

@section('content')

<form method="POST" action="{{ url('/admin/create_customer') }}">
    {{csrf_field()}}
    <div class="modal-header">
        <h4 class="modal-title">Add Customer</h4>
        @if(count($errors) > 0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
        @endforeach
        @endif
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>NIC</label>
            <input type="text" name="nic" class="form-control">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control">
        </div>


    </div>
    <div class="modal-footer">
        <a href="{{ url('/admin/view_customer') }}" type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">Back</a>

        <input type="submit" class="btn btn-success" value="submit">
    </div>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop
