@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 bigMarginHeight">
            <form action="/creerplaylist" method="POST">
                <input type="text" name="nom" placeholder="Nom de la playlist" class="form-control" />
                <br>
                <button type="submit" class="btn btnPurple">Créer</button>
                {{csrf_field()}}
            </form>
        </div>
    </div>
</div>

@endsection
