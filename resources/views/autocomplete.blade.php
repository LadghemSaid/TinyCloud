@extends('layouts.app')

@section('content')
    @foreach($res as $r)
        <option value="{{$r}}">
    @endforeach
@endsection



