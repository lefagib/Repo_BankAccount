@extends('layout.main')

@section ('content')
<h3>Add CLient</h3>
<form method="POST" action="{{route('client.create')}}"><div class="form-group">
@csrf
<label for="">nom: </label>
<input class="form-control"   type="text"  name="nom" >


<label for="">prenom: </label>
<input class="form-control"   type="text"  name="prenom">

<label for="">CNI: </label>
<input class="form-control"   type="text" name="CNI">

<label for="">Adresse:  </label>
<input class="form-control"   type="text" name="adresse">

<label for="">Date naissance: </label>
<input class="form-control"   type="date" name="date_naissance">
</div>
<button class="bnt" type="submit">Enregistrer</button>
</form>

@endsection
