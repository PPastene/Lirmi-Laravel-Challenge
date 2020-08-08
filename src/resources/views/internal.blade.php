@extends('layout')

@section('content')
<div class="container"><a href="{{route('external')}}">Registros externos</a></div>
<internal-user-list />
@endsection
