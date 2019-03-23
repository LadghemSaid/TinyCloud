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
                        <form action="/creer" method="POST" enctype="multipart/form-data">


                                <div><img id="artistimg"  src="https://gwiguyana.gy/sites/default/files/default_images/placeholder.png" width="200" height="200" alt="Image de l'artiste"/>
                                <input type="text" value="https://gwiguyana.gy/sites/default/files/default_images/placeholder.png" name="cover" id="hidden_cover" hidden />
                                     
                                <input type="text" name="nom" placeholder="Nom de l'artiste" value="{{old('nom')}}" id="Ajaxquery" list="AjaxqueryList" />
        
                                <input type="text" name="titre" placeholder="Titre de la musique" value="{{old('titre')}}"  />
                                <datalist id="AjaxqueryList" onChange="alert(1)">
        
                                </datalist>

                            <select type="text" name="style"  value="{{old('nom')}}" multiple  class="chosen-select"/>
                                <option value="Disco">Disco</option>
                                <option value="Blues">Blues</option>
                                <option value="Funk">Funk</option>
                                <option value="Jazz">Jazz</option>
                                <option value="Metal">Metal</option>
                                <option value="Pop">Pop</option>
                                <option value="Punk">Punk</option>
                                <option value="Rap">Rap</option>
                                <option value="Rock 'n' roll">Rock'n'rool</option>
                                <option value="Reggae">Reggae</option>
                                <option value="Raï">Raï</option>
                                <option value="Ska">Ska</option>
                                <option value="Gospel">Gospel</option>
                                <option value="Soul">Soul</option>
                                
                            </select>
                            </div>
        
                          
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