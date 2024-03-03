@extends('parint::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('parint.name') !!}</p>
@endsection
