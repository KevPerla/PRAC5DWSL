@extends('views/layout.php')

@section('content')
<p>
    Hola {{$nombre}} eres

    @if($edad > 18)
    <b>Mayor de edad</b>
    @else
    <b>Menor de edad</b>
    @endif
</p>

@endsection