@extends('layout.main')

@section('content')
<a href=""></a>
<a href="{{route('client.create')}}" class="btn btn-primary">Nouveau Client</a>
@if(session('succes'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<h3 class="text-center text-primary">Liste des clients</h3>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nom</th>
        <th scope="col">prenom</th>
        <th scope="col">CNI</th>
        <th scope="col">adresse</th>
        <th scope="col">date naissance</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->nom}}</td>
            <td>{{$client->prenom}}</td>
            <td>{{$client->CNI}}</td>
            <td>{{$client->adresse}}</td>
            <td>{{$client->date_naissance}}</td>
            <td> <a href="{{route('client.edite',$client->id)}}" class="btn btn-info">Modifier</a> </td>
            <td> <a href="{{route('client.delete',$client->id)}}" onclick="return confirm('are  you sure')" class="btn btn-danger">Supprimer</a> </td>
            <td> <a href="{{route('client.show',$client->id)}}" class="btn btn-info">Infos</a> </td>



        </tr>
      @endforeach
    </tbody>
</table>
@endsection
