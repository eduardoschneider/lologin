@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Share
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
	<form method="post" action="{{ route('users.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="email">E-mail :</label>
              <input type="text" class="form-control" name="email"/>
          </div>
		  <div class="form-group">
              <label for="address">CEP:</label>
              <input type="text" class="form-control" name="cep"/>
          </div>
          <div class="form-group">
              <label for="address">Endereço:</label>
              <input type="text" class="form-control" name="address"/>
          </div>
		  <div class="form-group">
              <label for="number">Number:</label>
              <input type="text" class="form-control" name="number"/>
          </div>
		  <div class="form-group">
              <label for="telephone">Telefone:</label>
              <input type="text" class="form-control" name="telephone"/>
          </div>
		  <div class="form-group">
              <label for="password">Senha:</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection