@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="alert alert-success">
                        <p> You're logged in as {{ $user->name }} </p>
                    </div>
					
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
							  <label for="address">Endereço:</label>
							  <input type="text" class="form-control" name="address" value='{{ $user->address }}'/>
						  </div>
						  <div class="form-group">
							  <label for="address">CEP:</label>
							  <input type="text" class="form-control" name="cep" value='{{ $user->cep }}'/>
						  </div>
						  <div class="form-group">
							  <label for="telephone">Telefone:</label>
							  <input type="text" class="form-control" name="telephone" value='{{ $user->telephone }}'/>
						  </div>
						  <div class="form-group">
							  <label for="address">Número:</label>
							  <input type="number" class="form-control" name="number" value='{{ $user->number }}'/>
						  </div>
						  <div class="form-group">
							  <label for="password">Senha:</label>
							  <input type="password" class="form-control" name="password" value='{{ $user->password }}'/ required>
						  </div>
						  <button type="submit" class="btn btn-primary">Salvar Alterações</button>
					  </form>
					
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
