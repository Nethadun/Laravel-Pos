@extends('adminlte::page')

@section('title', 'Item')

@section('content_header')
<h1>Master File/Update Item</h1>
@stop

@section('content')
<form method="get" action="{{ url('/admin/edit_item',array($item->id)) }}">
    {{csrf_field()}}
    <div class="modal-header">
        <h4 class="modal-title">Update Item</h4>

    </div>
    <div class="modal-body">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $item->name; ?>">
        </div>
        <div class="form-group">
            <label>Unit Price</label>
            <input type="text" name="unit_price" class="form-control" value="<?php echo $item->unit_price; ?>">
        </div>
        <div class="form-group">
            <label>QTY</label>
            <input type="text" name="qty" class="form-control" value="<?php echo $item->qty; ?>">
        </div>


    </div>
    <div class="modal-footer">
        <a href="{{ url('/admin/view_item') }}" type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">Back</a>

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
