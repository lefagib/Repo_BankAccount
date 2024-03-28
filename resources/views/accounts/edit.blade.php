@extends('layout.main')

@section ('content')
<h3>New Account</h3>
<form method="POST" action="{{route('account.update',$account->id)}}"><div class="form-group">
    @csrf
<label for="">Solde Initial </label>
<input class="form-control" name="solde"  type="number"  value="{{$account->solde}}" >

<div class="form-group">
    <label class="control-label" for="">Client </label>
    <select name="client_id" id="" class="form-control">

        <option  value="{{$account->client->id}}">{{$account->client->nom}}</option>

    </select>
</div>

<div class="form-group">
    <label class="control-label" for="">AccountType </label>
    <select name="account_type_id" id="" class="form-control">

        <option  value="{{$account->accountType->id}}">{{$account->accountType->label}}</option>

    </select>
</div>
</div>
<button class="btn btn-primary mt-3" type="submit">Update</button>
<button class="btn btn-primary mt-3" href="{{route('account.index')}}" type="submit">Annuler</button>

</form>

@endsection
