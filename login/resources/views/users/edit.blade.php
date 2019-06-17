@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Share
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
      <form method="post" action="{{ route('users.update', $user->id) }}">
        @method('PATCH')
        @csrf
          <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value='{{ $user->name }}'/>
          </div>
          <div class="form-group">
              <label for="email">E-mail :</label>
              <input type="text" class="form-control" name="email" value='{{ $user->email }}'/>
          </div>
		  <div class="form-group">
              <label for="address">CEP:</label>
              <input type="text" class="form-control" name="cep" value='{{ $user->cep }}'/>
          </div>
          <div class="form-group">
              <label for="address">Endereço:</label>
              <input type="text" class="form-control" name="address" value='{{ $user->address }}'/>
          </div>
		  <div class="form-group">
              <label for="address">Número:</label>
              <input type="number" class="form-control" name="number" value='{{ $user->number }}'/>
          </div>
		  <div class="form-group">
              <label for="telephone">Telefone:</label>
              <input type="text" class="form-control" name="telephone" value='{{ $user->telephone }}'/>
          </div>
		  <div class="form-group">
              <label for="password">Senha:</label>
              <input type="password" class="form-control" name="password" value='{{ $user->password }}' /required>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection