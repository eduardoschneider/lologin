<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	
	 $request->validate([
	'name'=>'required',
	'email'=> 'required',
	'cpf'=> 'required',
	'city'=> 'required',
	'state'=> 'required',
	'cep' => 'required',
	'address' => 'required',
	'number' => 'required',
	'telephone' => 'required',
	'password' => 'required'
	  ]);
	  $user = new User([
		'name' => $request->get('name'),
		'email'=> $request->get('email'),
		'cpf'=> $request->get('cpf'),
		'city'=> $request->get('city'),
		'state'=> $request->get('state'),
		'cep'=> $request->get('cep'),
		'address'=> $request->get('address'),
		'number'=> $request->get('number'),
		'telephone'=> $request->get('telephone'),
		'password'=> Hash::make($request->get('password')),
		
	  ]);
	  $user->save();
	  return redirect('/home')->with('success', 'User has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
	   $user = User::find($id);
	   $user->password = '';
       return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	 $request->validate([
		'name'=>'required',
		'email'=> 'required',
		'cpf'=> 'required',
		'city'=> 'required',
		'state'=> 'required',
		'cep' => 'required',
		'address' => 'required',
		'number' => 'required',
		'telephone' => 'required',
		'password' => 'required'
	  ]);

      $user = User::find($id);
      $user->name = $request->get('name');
      $user->email = $request->get('email');
	  $user->cpf = $request->get('cpf');
	  $user->city = $request->get('city');
	  $user->state = $request->get('state');
	  $user->cep = $request->get('cep');
      $user->address = $request->get('address');
	  $user->number = $request->get('number');
	  $user->telephone = $request->get('telephone');
	  $user->password = Hash::make($request->get('password'));// muda a senha do seu usuario já criptografada pela função bcrypt

	  
      $user->save();

      return redirect('/home')->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	 $user = User::find($id);
     $user->delete();

     return redirect('/home')->with('success', 'User has been deleted Successfully');
    }
}
