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
                        <p> You're logged in as ADMINISTRATOR </p>
                    </div>

					<a href="{{ route('users.create')}}" class="btn btn-primary">Add</a>
                    <table class="table table-hover table-bordered" style="text-align:center;">
                        <thead>
                            <tr>
                                <th width="5">No. </th>
                                <th> Member Name </th>
                                <th> Email </th>
                                <th> Admin? </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $value)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td> {{ $value->name }} </td>
                                <td> {{ $value->email }} </td>
                                <td> {{ $value->admin }} </td>
								<td style="display:flex; align-items:center; justify-content:center;"><a href="{{ route('users.edit',$value->id)}}" class="btn btn-primary" style="float:left;">Edit</a>

									<form action="{{ route('users.destroy', $value->id)}}" method="post" style="float:left;">
									  @csrf
									  @method('DELETE')
									  <button class="btn btn-danger" type="submit">Delete</button>
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
