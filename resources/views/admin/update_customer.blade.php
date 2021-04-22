@extends('adminlte::page')

@section('title', 'Customer')

@section('content_header')
<h1>Master File/Read Customer</h1>
@stop

@section('content')
<form method="get" action="{{ url('/admin/edit_customer',array($customer->id)) }}">
    {{csrf_field()}}
    <div class="modal-header">
        <h4 class="modal-title">Update Customer</h4>

    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $customer->name; ?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $customer->email; ?>">
        </div>
        <div class="form-group">
            <label>NIC</label>
            <input type="text" name="nic" class="form-control" value="<?php echo $customer->nic; ?>">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $customer->address; ?>">
        </div>


    </div>
    <div class="modal-footer">
        <a href="{{ url('/customer') }}" type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">Back</a>

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
