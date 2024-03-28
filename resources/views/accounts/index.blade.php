@extends('layout.main')

@section('content')
<a href=""></a>
<a href="{{route('account.create')}}" class="btn btn-primary">New Account</a>
@if(session('succes'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<h3 class="text-center text-primary">Liste des Comptes</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">solde initial</th>
        <th scope="col">NomComplet</th>
        <th scope="col">type Compte</th>
        <th scope="col">Action</th>

        {{-- <th scope="col">Action</th> --}}


      </tr>
    </thead>
    <tbody>
        @foreach ($accounts as $account)
        <tr>
            <td>{{$account->solde}}</td>
            <td>{{$account->client->nom}} {{$account->client->prenom}}</td>
            <td>{{$account->accountType->label}}</td>

            <td> <a href="{{route('account.edit',$account->id)}}" class="btn btn-info">Modifier</a> </td>
            <td> <a href="{{route('account.delete',$account->id)}}" onclick="return confirm('are  you sure')" class="btn btn-danger">Supprimer</a> </td>
            <td> <a href="{{route('account.show',$account->id)}}" class="btn btn-info">Infos</a> </td>



        </tr>
      @endforeach
    </tbody>
</table>
@endsection
