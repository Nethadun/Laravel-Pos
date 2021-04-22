@extends('adminlte::page')

@section('title', 'Item')

@section('content_header')
<h1>Master File/Read Item</h1>
@stop

@section('content')
<h2>{{ $item->name }}</h2>
<h4>{{ $item->unit_price }}</h4>
<h4>{{ $item->qty }}</h4>
<img src='{{ asset('upload/items/'.$item->image) }}' width="100">
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
@stop
