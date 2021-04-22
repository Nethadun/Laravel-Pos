@extends('adminlte::page')

@section('title', 'Item')

@section('content_header')
<h1>Master File/Create Item</h1>
@stop

@section('content')

<form method="POST" action="{{ url('/admin/create_item') }}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="modal-header">
        <h4 class="modal-title">Add Item</h4>
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
            <label>Unit Price</label>
            <input type="text" name="unit_price" class="form-control">
        </div>
        <div class="form-group">
            <label>QTY</label>
            <input type="text" name="qty" class="form-control">
        </div>

        <div class="form-group">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" name="image" type="file">
        </div>

    </div>
    <div class="modal-footer">
        <a href="{{ url('/admin/view_item') }}" type="button" class="btn btn-default" value="Cancel">Back</a>

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
