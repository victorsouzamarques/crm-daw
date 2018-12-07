@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach($funcionarios as $key=>$funcionario)
            {{$funcionario->name}}
        @endforeach         
    </div>
@endsection