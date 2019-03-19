@extends('layouts.app')

@section('content')
@include('_errors')

  
        <form action="{{url('/')}}/creer" data-pjax method="POST" enctype="multipart/form-data">
           
            <div ><img id="artistimg"  src="https://gwiguyana.gy/sites/default/files/default_images/placeholder.png" width="200" height="200" alt="Image de l'artiste"/>
         
         
                <input type="text" name="nom" placeholder="Nom de l'artiste" value="{{old('nom')}}" id="Ajaxquery" list="AjaxqueryList" />
        
                    <datalist id="AjaxqueryList">
                                
                    </datalist>
            </div>          
                 
            <select type="text" name="style"  value="{{old('nom')}}" multiple  class="chosen-select"/>
                
                <option value="rap">rap</option>
                <option value="rap">rap</option>
                <option value="rap">rap</option>
                <option value="rap">rap</option>
            
            </select>
            <input type="file" name="chanson" accept="audio/mpeg3"/>
            <input type="submit" value="Submit"/>
            {{csrf_field()}}
        </form>
 
@endsection