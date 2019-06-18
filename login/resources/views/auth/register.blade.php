@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="border:1px solid black;">
                <div class="card-header" style="border-bottom:1px solid black; color:white; background-color:#3490dc;">{{ __('Cadastro de Usuário') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="cpf" class="col-md-4 col-form-label text-md-right">{{ __('CPF') }}</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" onkeydown="javascript: fMasc( this, mCPF );" maxlength="14" class="form-control @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}" required autocomplete="cpf">

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						
						<div class="form-group row">
                            <label for="cep" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>

                            <div class="col-md-6">
                                <input id="cep" onkeydown="javascript: fMasc( this, mNum );" maxlength="8" type="text" class="form-control @error('cep') is-invalid @enderror" name="cep" value="{{ old('cep') }}" required autocomplete="cep">

                                @error('cep')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" readonly>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" readonly>

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="email" readonly>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number">

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telephone') }}</label>

                            <div class="col-md-6">
                                <input id="telephone" onkeydown="javascript: fMasc( this, mTel );" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="email">

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="float:right;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
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
</script>
@endsection
