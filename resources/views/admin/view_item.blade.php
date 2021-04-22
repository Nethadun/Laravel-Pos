@extends('adminlte::page')

@section('title', 'Item')

@section('content_header')
<h1>Master File/All Item</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success">
    {{session('info')}}
</div>
@endif
<div class="row">

    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Unit price</th>
            <th>Qty</th>
            <th>View</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(count($items) > 0)
        @foreach($items->all() as $item)
        <tr>

            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->unit_price }}</td>
            <td>{{ $item->qty }}</td>
            <td><img src='{{ asset('upload/items/'.$item->image) }}' width="20"></td>
            <td>
                <a href="/admin/read_item/{{$item->id}}" class="read" ><i class="far fa-eye"  title="read">&#xE86D;</i></a>

                <a href="/admin/update_item/{{$item->id}}" class="edit" ><i class="far fa-edit" title="Edit">&#xE254;</i></a>

                <a href="/admin/delete_item/{{$item->id}}" class="delete" ><i class="far fa-trash-alt" title="Delete">&#xE872;</i></a>
            </td>
        </tr>
        @endforeach
        @endif

        </tbody>
    </table>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop









