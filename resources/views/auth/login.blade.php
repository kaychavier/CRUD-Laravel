@extends('layouts.auth')
@section('content')
<div class="container-fluid">
	<div class="row justify-content-center mt-5">
		<section class="col-12 colsm-6 col-md-4">
			<img src="{{asset('img/user4.png')}}" class="bg">
			<form class="form-container" method="POST" action="{{route('login.store')}}">
				<h4 class="text-center mt-4">Login</h4>
                @csrf
                <div class="form-group">
					<input type="text"  class="form-control" name="email" placeholder="Email">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
				</div>

				<div class="form-group">
					<input type="password" class="form-control" name="password" placeholder="Senha">
                    @error('password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
				</div>

				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" name="remember">
					<label class="form-check-label">Lembre-me</label>
				</div>
				<button class="btn btn-primary btn-block">Entrar</button>
                <p>Ainda não é cadastrado?<a href="{{route('register')}}"> Cadastre-se.</a></p>
			</form>
		</section>
	</div>
</div>
@endsection
