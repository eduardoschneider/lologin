@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border:1px solid black;">
                <div class="card-header" style="border-bottom:1px solid black; color:white; background-color:#3490dc;">Passageiros Cadastrados</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

					<a href="{{ route('users.create')}}" class="btn btn-success" style="float:right;">+</a>
					<br/><br/>
                    <table class="table table-hover table-bordered" style="text-align:center;">
                        <thead>
                            <tr>
                                <th width="5">ID </th>
                                <th> Passageiro </th>
                                <th> E-mail </th>
                                <th> Admin? </th>
                                <th width="220px" > Ações </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $value)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td> {{ $value->name }} </td>
                                <td> {{ $value->email }} </td>
                                <td> {{ $value->admin }} </td>
								<td width="220px" style="display:flex; align-items:center; justify-content:center;"><a href="{{ route('users.edit',$value->id)}}" class="btn btn-primary" style="float:left; width:80px !important;" >
								Editar</a>

									<form action="{{ route('users.destroy', $value->id)}}" method="post" style="float:left;">
									  @csrf
									  @method('DELETE')
									  <button class="btn btn-danger" style="width:80px !important; margin-left:10px;" type="submit">Apagar</button>
									</form>
								</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
