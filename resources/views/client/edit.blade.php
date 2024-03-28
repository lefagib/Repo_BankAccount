@extends('layout.main')

@section ('content')
<h3>New Client</h3>
<form method="GET" action="{{route('client.update',$client->id)}}"><div class="form-group">
    @csrf
<label for="">nom: </label>
<input class="form-control"  value="{{$client->nom}}" type="text" name="nom">


<label for="">prenom: </label>
<input class="form-control"   type="text"   name="prenom"   value="{{$client->prenom}}">

<label for="">CNI: </label>
<input class="form-control"   type="text" name="CNI"  value="{{$client->CNI}}" >

<label for="">Adresse:  </label>
<input class="form-control"   type="text" name="adresse" value="{{$client->adresse}}" >

<label for="">Date naissance: </label>
<input class="form-control"   type="date" name="date_naissance" value="{{$client->date_naissance}}" >
</div>
<button class="btn btn-primary mt-3" type="submit">Update</button>
<button class="btn btn-primary mt-3" href="{{route('client.list')}}" type="submit">Annuler</button>

</form>

@endsection
