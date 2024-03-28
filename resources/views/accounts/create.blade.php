@extends('layout.main')

@section ('content')
<h3>New Account</h3>
<form method="POST" action="{{route('account.create')}}"><div class="form-group">
@csrf
<label for="">Solde Initial </label>
<input class="form-control" name="solde"  type="number"  value="" >

<div class="form-group">
    <label class="control-label" for="">Client </label>
    <select name="client_id" id="" class="form-control">
        @foreach ($clients as $client )
        <option  value="{{$client->id}}">{{$client->nom}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label class="control-label" for="">AccountType </label>
    <select name="account_type_id" id="" class="form-control">
        @foreach ($account_types as $type )
        <option  value="{{$type->id}}">{{$type->label}}</option>
        @endforeach



    </select>
</div>


{{-- <input class="form-control"  name=""  type="text"  value="">

<label for="">CNI: </label>
<input class="form-control"   type="text" value="">

<label for="">Adresse:  </label>
<input class="form-control"   type="text" value="">

<label for="">Date naissance: </label>
<input class="form-control"   type="date" value=""> --}}
</div>
<button class="bnt btn-primary mt-3" type="submit">Enregistrer</button>
</form>

@endsection
