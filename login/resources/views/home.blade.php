@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border:1px solid black;">
                <div class="card-header" style="border-bottom:1px solid black; color:white; background-color:#3490dc;">Informações Cadastradas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="alert alert-success" style="display:flex; align-content:center; justify-content:center; height:46px; border:1px solid green;">
                        <p> Sr(a) {{ $user->name }}, abaixo estão seus dados cadastrados! </p>
                    </div>
										
					<form method="post" action="{{ route('users.update', $user->id) }}">
						@method('PATCH')
						@csrf
						<div class="row">
							  <div class="form-group col-md-4">
								  <label for="name">Name:</label>
								  <input type="text" class="form-control" name="name" value='{{ $user->name }}'/>
							  </div>
							  <div class="form-group col-md-4">
								  <label for="email">CPF :</label>
								  <input type="text" class="form-control" name="cpf" value='{{ $user->cpf }}' onkeydown="javascript: fMasc( this, mCPF );" maxlength="14"/>
							  </div>
							  <div class="form-group col-md-4">
								  <label for="email">E-mail :</label>
								  <input type="text" class="form-control" name="email" value='{{ $user->email }}'/>
							  </div>
						  </div>
						  <div class="row">
							  <div class="form-group col-md-3">
								  <label for="address">CEP:</label>
								  <input id="cep" type="text" class="form-control" name="cep" value='{{ $user->cep }}' onkeydown="javascript: fMasc( this, mNum );" maxlength="8"/>
							  </div>
								<div class="form-group col-md-3">
								  <label for="email">Cidade :</label>
								  <input id="city" type="text" class="form-control" name="city" value='{{ $user->city }}' readonly/>
							  </div>
								<div class="form-group col-md-1">
								  <label for="email">Estado :</label>
								  <input id="state" type="text" class="form-control" name="state" value='{{ $user->state }}' readonly/>
							  </div>
							  <div class="form-group col-md-5">
								  <label for="address">Endereço:</label>
								  <input id="address" type="text" class="form-control" name="address" value='{{ $user->address }}' readonly/>
							  </div>
						  </div>
						  <div class="row">
							  <div class="form-group col-md-4">
								  <label for="telephone">Telefone:</label>
								  <input type="text" class="form-control" name="telephone" value='{{ $user->telephone }}' onkeydown="javascript: fMasc( this, mTel );"/>
							  </div>
							  <div class="form-group col-md-4">
								  <label for="address">Número:</label>
								  <input type="number" class="form-control" name="number" value='{{ $user->number }}'/>
							  </div>
							  <div class="form-group col-md-4">
								  <label for="password">Senha:</label>
								  <input type="password" class="form-control" name="password" value='{{ $user->password }}'/ required style="border:1px solid red;">
							  </div>
						  </div>
						  <button type="submit" class="btn btn-primary" style="float:right;">Salvar Alterações</button>
					  </form>
					
                </div>
            </div>
        </div>
    </div>
</div>
<br/><br/><br/>

<div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border:1px solid black;">
                <div class="card-header" style="border-bottom:1px solid black; color:white; background-color:#3490dc;">Passagem</div>
                <div class="card-body">

					<form method="post" action="{{ route('voos.store') }}">
						@method('POST')
						@csrf
						<div class="row">
							<font size="2px" color="red">    *Para qualquer problema com a passagem, comparecer à agência física.</font>
							  <div class="form-group col-md-6">
								  <label for="destino">Destino:</label>
									<select name="destino" class="form-control">
									  <option value="De São Paulo para Uberaba">São Paulo -> Uberaba</option> 
									  <option value="De Uberaba para São Paulo">Uberaba -> São Paulo</option>
									  <option value="De Rio de Janeiro para São Paulo">Rio de Janeiro -> São Paulo</option>
									<option value="De São Paulo para Rio de Janeiro">São Paulo -> Rio de Janeiro</option>
									</select>
							  </div>
							  <div class="form-group col-md-6">
								  <label for="horario">Horário:</label>
									<select name="horario" class="form-control">
									  <option value="17:00">17:00</option> 
									  <option value="20:00">20:00</option>
									  <option value="23:00">23:00</option>
									</select>
							  </div>
						  </div>
						  <button type="submit" class="btn btn-success" style="float:right;">Comprar Passagem</button>
<br/>
					  </form>
					 Seus voos:
					 <table class="table table-hover table-bordered" style="text-align:center;">
                        <thead>
                            <tr>
                                <th> Destino </th>
                                <th> Horario </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($voo as $key => $value)
                            <tr>
                                <td> {{ $value->destino }} </td>
                                <td> {{ $value->horario }} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $("#cep").focusout(function(){
            var cep = $("#cep").val();
            cep = cep.replace("-", "");
 
            var urlStr = "https://viacep.com.br/ws/"+ cep +"/json/";
            

            $.ajax({
                url : urlStr,
                type : "get",
                dataType : "json",
                success : function(data){
                    console.log(data);                  
                    $("#city").val(data.localidade);
                    $("#state").val(data.uf);
                    $("#address").val(data.logradouro);
                },
                error : function(erro){
                    console.log(erro);
                }
            });
            
    });
});

</script>
<script type="text/javascript">
	function fMasc(objeto,mascara) {
		obj=objeto
		masc=mascara
		setTimeout("fMascEx()",1)
	}
	function fMascEx() {
		obj.value=masc(obj.value)
	}
	function mTel(tel) {
		tel=tel.replace(/\D/g,"")
		tel=tel.replace(/^(\d)/,"($1")
		tel=tel.replace(/(.{3})(\d)/,"$1)$2")
		if(tel.length == 9) {
			tel=tel.replace(/(.{1})$/,"-$1")
		} else if (tel.length == 10) {
			tel=tel.replace(/(.{2})$/,"-$1")
		} else if (tel.length == 11) {
			tel=tel.replace(/(.{3})$/,"-$1")
		} else if (tel.length == 12) {
			tel=tel.replace(/(.{4})$/,"-$1")
		} else if (tel.length > 12) {
			tel=tel.replace(/(.{4})$/,"-$1")
		}
		return tel;
	}
	function mCNPJ(cnpj){
		cnpj=cnpj.replace(/\D/g,"")
		cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
		cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
		cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
		cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
		return cnpj
	}
	function mCPF(cpf){
		cpf=cpf.replace(/\D/g,"")
		cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
		cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
		cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
		return cpf
	}

	function mNum(num){
		num=num.replace(/\D/g,"")
		return num
	}

	function diminui(){
		document.getElementById("diminui").style.height == "1px";
}
</script>
@endsection
