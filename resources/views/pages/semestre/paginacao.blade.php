@extends('index')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Ano/Semestre</h1>
  </div>
  
  <div class="container">
		<form action="" method="get">
			<div class="mb-3">
				<input type="text" name="pesquisar" placeholder="Digite o ano semestre">
				<button class="btn btn-secondary">Pesquisar</button>
			</div>
			<div>
			<a href="{{ route('cadastrar.semestre') }}" class="btn btn-success btn-sm">Incluir</a>
			</div>
			
			  <div class="table-responsive mt-4">
				<table class="table table-striped table-sm">
				  <thead>
					<tr>
					  <th scope="col">Ano Semestre</th>
					  <th scope="col">Ativo</th>
					  <th scope="col">Ações</th>
					</tr>
				  </thead>
				  <tbody>
				    @foreach ( $find as $linha ) 
					<tr>
					  <td>{{ $linha->anosemestre }}</td>
					  <td>{{ $linha->ativo }}</td>
					  <td> 
						  <meta name='csrf-token' content=" {{ csrf_token()  }}" />
						  <a id="btn-cancelar" onClick="Cancelar('{{ route('semestre.delete') }}', {{ $linha->anosemestre }})" class="btn btn-danger btn-sm">Cancelar</a>
						  <a id="btn-habilitar" onClick="Habilitar('{{ route('semestre.habilitar') }}', {{ $linha->anosemestre }})" class="btn btn-info btn-sm">Habilitar</a>
					  </td>
					</tr>
					@endforeach
		
				  </tbody>
				</table>
				
				
			  </div>
			
		</form>
  
  </div>
@endsection