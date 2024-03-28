@extends('layout.main')
@section('content')
<h3>Show Client</h3>
<div class="card" style="margin: 20px;" >
    <div class="card-body" >
        <div class="card-body" >
      <h5>Nom Complet : {{$accounts->client->nom}} {{$accounts->client->prenom}}</h5>
      <h6>Type de Compte : {{$accounts->accountType->label}}</h6>
      <h6>Solde : {{$accounts->solde}}</h6>

    </div>
    <hr>
</div>
</div>
<a href="{{route('account.index')}}" class="btn btn-primary" >Retour</a>

@endsection
