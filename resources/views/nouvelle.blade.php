@extends('layouts.app')

@section('content')
@include('_errors')


    <form action="/creer" data-pjax method="POST" enctype="multipart/form-data">
        <input type="text" name="nom" placeholder="Nom de la chansons" value="{{old('nom')}}" id="Ajaxquery" list="AjaxqueryList"/>
                <div id="ResultAjaxquery">
                        <datalist id="AjaxqueryList">
                        
                        </datalist>
                </div>
        <input type="text" name="style" placeholder="Genre de la chansons" value="{{old('nom')}}"/>
        <input type="file" name="chanson" accept="audio/mpeg3"/>
        <input type="submit" value="Submit"/>
        {{csrf_field()}}
    </form>
@endsection