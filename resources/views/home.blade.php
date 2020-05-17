@extends('layouts.app')

@section('content')
<! –– Container do app.blade que será processado, definido yield ––>
<div id="container">
    <div style="text-align:center;">
        <strong>Lumen API | CRUD</strong>
        <section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="http://lumenvel-com.umbler.net/login/images/logo2.jpg" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Login</h4>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="email">E-Mail</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Email inválido
									</div>
								</div>

								<div class="form-group">
									<label for="password">Senha
									<a href="recuperar.html" class="float-right">
                                    Esqueceu sua Senha?
                                    </a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
								    <div class="invalid-feedback">
								    	Insira sua Senha 
							    	</div>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Lembrar Minha Senha</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Entrar
									</button>
								</div>
								<div class="mt-4 text-center">
									Não tem uma conta? <a href="cadastrar.html">Crie uma</a>
								</div>
							</form>
						</div>
					</div>

                    
                    <img width="45" src="http://lumenvel-com.umbler.net/login/images/beta.png" alt="versão beta" class="beta">

					<div class="footer">
						Copyright © 2020 — <a href="https://gdigital.com.br/" target="_blank"><img src="https://gdigital.com.br/files/sites/6/2019/08/logo-g-.webp" alt="G Digital Logo" alt="G Digital" width="60" target="_blank"> 
					</div>
				</div>
			</div>
		</div>
	</section>
        
    </div>
</div>
@endsection
