<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestao Academica</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
	
    <!-- Referenciando o cione que está na pasta 	public/css -->
	<link rel="icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Bootstrap core CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Custom styles for this template - referenciando os css que estão na pasta 	public/css -->
    <link href="{{ asset( 'css\dashboard.css' ) }}" rel="stylesheet">	
    <link href="{{ asset( 'css\style.css' ) }}" rel="stylesheet">	    
  </head>

  <body>
		<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
		  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
		  <div class="navbar-nav">
			<div class="nav-item text-nowrap">
			  <a class="nav-link px-3" href="#">Sign out</a>
			</div>
		  </div>
		</header>

		<div class="container-fluid">
		  <div class="row">
		    <!-- Fazendo include do menu.blade.php que está na pasta resources/view/components que estarão na pasta resources/views/pages e cada objeto terá sua subpasta -->
			@include('components.menu')
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				  <!-- Exibir o conteúdo de uma determinada seção do caso cursos a partir de um @section('content') -->
				  @yield('content')
			</main>
		  </div>
		</div>

	@yield('scripts')
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- BlocUI loading   https://jquery.malsup.com/block/#dialog -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.js"></script>
	<script src="/js/dashboard.js"></script>
	<script src="/js/projeto.js"></script>
  </body>
</html>
