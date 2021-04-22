@extends('adminlte::page')

@section('title', 'Customer')

@section('content_header')
<h1>Master File/Read Customer</h1>
@stop

@section('content')
<h2>{{ $customer->name }}</h2>
<h4>{{ $customer->email }}</h4>
<h4>{{ $customer->nic }}</h4>
<h4>{{ $customer->address }}</h4>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop
