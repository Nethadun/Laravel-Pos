@extends('adminlte::page')

@section('title', 'Customer')

@section('content_header')
<h1>Master File/All Customer</h1>
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
            <th>Email</th>
            <th>Nic</th>
            <th>Address</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
        @if(count($customers) > 0)
        @foreach($customers->all() as $customer)
        <tr>

            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->email }}</td>
            <td>{{ $customer->nic }}</td>
            <td>{{ $customer->address }}</td>
            <td>
                <a href="/admin/read_customer/{{$customer->id}}" class="read" ><i class="far fa-eye"  title="read">&#xE86D;</i></a>

                <a href="/admin/update_customer/{{$customer->id}}" class="edit" ><i class="far fa-edit" title="Edit">&#xE254;</i></a>

                <a href="/admin/delete_customer/{{$customer->id}}" class="delete" ><i class="far fa-trash-alt" title="Delete">&#xE872;</i></a>
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
