@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }

 body {
	 overflow-x:hidden;
background-color: #d0e7ec;
background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='4' height='4' viewBox='0 0 4 4'%3E%3Cpath fill='%23f5f3f7' fill-opacity='0.4' d='M1 3h1v1H1V3zm2-2h1v1H3V1z'%3E%3C/path%3E%3C/svg%3E");}
</style>
<div class="card uper" style="border:1px solid black;">
                <div class="card-header" style="border-bottom:1px solid black; color:white; background-color:#3490dc;">
    Adicionar Novo Usuário
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
		<div class="row">
			  <div class="form-group col-md-4">
				  @csrf
				  <label for="name">Name:</label>
				  <input type="text" class="form-control" name="name"/>
			  </div>
			  <div class="form-group col-md-4">
				  <label for="cpf">CPF :</label>
				  <input type="text" class="form-control" name="cpf" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14"/>
			  </div>
			  <div class="form-group col-md-4">
				  <label for="email">E-mail :</label>
				  <input type="text" class="form-control" name="email"/>
			  </div>
		  </div>
		  <div class="row">
			  <div class="form-group col-md-3">
				  <label for="cep">CEP:</label>
				  <input type="text" class="form-control" name="cep" maxlength="8" onkeydown="javascript: fMasc( this, mNum );"  id="cep"/>
			  </div>
			  <div class="form-group col-md-3">
				  <label for="city">Cidade:</label>
				  <input type="text" class="form-control" name="city" id="city" readonly/>
			  </div>
			  <div class="form-group col-md-1">
				  <label for="state">Estado:</label>
				  <input type="text" class="form-control" name="state" id="state" readonly/>
			  </div>
			  <div class="form-group col-md-5">
				  <label for="address">Endereço:</label>
				  <input type="text" class="form-control" name="address" id="address" readonly/>
			  </div>
		  </div>
		  <div class="row">
			  <div class="form-group col-md-4">
				  <label for="number">Number:</label>
				  <input type="number" class="form-control" name="number"/>
			  </div>
			  <div class="form-group col-md-4">
				  <label for="telephone">Telefone:</label>
				  <input type="text" class="form-control" name="telephone" onkeydown="javascript: fMasc( this, mTel );" maxlength="14"/>
			  </div>
			  <div class="form-group col-md-4">
				  <label for="password">Senha:</label>
				  <input type="password" class="form-control" name="password"/>
			  </div>
		  </div>
          <button type="submit" class="btn btn-primary" style="float:right; margin-left:10px;">Adicionar</button>
		  <button class="btn btn-danger" style="float:right;"><a style="color:white;" href="javascript:history.back()">Voltar</a></button>
      </form>
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
</script>
@endsection