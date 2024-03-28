@extends('layout.main')
@section('content')
<h3>Show Client</h3>

<div class="card" style="margin: 20px;" >
    <div class="card-body" >
        <div class="card-body" >
      <h5>Nom : {{$client->nom}}</h5>
      <h6>Prenom : {{$client->prenom}}</h6>
      <h6>Adresse : {{$client->adresse}}</h6>
      <h6>CNI : {{$client->CNI}}</h6>
      <h6>Date Naissance : {{$client->date_naissance}}</h6>
    </div>
    <hr>
</div>
</div>
 <a href="{{route('client.list')}}" class="btn btn-primary" >Retour</a>

@endsection
