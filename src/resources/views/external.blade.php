@extends('layout')

@section('content')
<div class="container"><a href="{{route('internal')}}">Registros internos</a></div>
<external-user-list />
@endsection
