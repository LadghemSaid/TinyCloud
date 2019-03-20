@extends('layouts.app')

@section('content')
@include('_errors')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card nouvelle bigMarginHeight">
                <div class="card-header">
                    {{ __('Nouvelle chanson') }}
                </div>
                <div class="card-body padding">
                        <form action="/creer" data-pjax method="POST" enctype="multipart/form-data">

                            <div>
                                <img id="artistimg" src="https://gwiguyana.gy/sites/default/files/default_images/placeholder.png"
                                    width="200" height="200" alt="Image de l'artiste" />
        
        
                                <input class="form-control margin" type="text" name="nom" placeholder="Nom de l'artiste" value="{{old('nom')}}"
                                    id="Ajaxquery" list="AjaxqueryList" />
        
                                <datalist id="AjaxqueryList" onChange="alert(1)">
        
                                </datalist>
                            </div>
        
                            <input class="form-control margin" type="text" name="style" placeholder="Genre de la chansons"
                                value="{{old('nom')}}" />
                            <input class="btn btnPurple margin" type="file" name="chanson" accept="audio/mpeg3" />
                            <input class="btn btnPurple margin" type="submit" value="Submit" />
                            {{csrf_field()}}
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
