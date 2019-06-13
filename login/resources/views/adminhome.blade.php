@extends('layouts.app')

@section('content')
<div class="container">
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

					<a href="">Adicionar</a>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="5">No. </th>
                                <th> Member Name </th>
                                <th> Email </th>
								<th> Address </th>
								<th> Telephone </th>
                                <th> Admin=1, User=0 </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $value)
                            <tr>
                                <td> {{ $key+1 }} </td>
                                <td> {{ $value->name }} </td>
                                <td> {{ $value->email }} </td>
								<td> {{ $value->address }} </td>
								<td> {{ $value->telephone }} </td>
                                <td> {{ $value->admin }} </td>
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
