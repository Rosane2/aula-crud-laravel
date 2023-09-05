@extends('index')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Cursos</h1>
  </div>
  
  <div class="container">
		<form action="" method="get">
			<div class="mb-3">
				<input type="text" name="pesquisar" placeholder="Digite o nome do curso">
				<button class="btn btn-secondary">Pesquisar</button>
			</div>
			<div>
			<a href="{{ route('cadastrar.curso') }}" class="btn btn-success btn-sm">Incluir</a>
			</div>
			
			
			  <div class="table-responsive mt-4">
				<table class="table table-striped table-sm">
				  <thead>
					<tr>
					  <th scope="col">Nome do Curso</th>
					  <th scope="col">Carga Horária</th>
					  <th scope="col">Ativo</th>
					  <th scope="col">Ações</th>
					</tr>
				  </thead>
				  <tbody>
				    @foreach ( $findCurso as $curso ) 
					<tr>
					  <td>{{ $curso->nomecurso }}</td>
					  <td>{{ $curso->cargahoraria }}</td>
					  <td>{{ $curso->ativo }}</td>
					  <td> 
						  <a id="btn-cursoeditar" onClick="cursoEditar('{{ route('curso.editar') }}', {{ $curso->id }})" class="btn btn-primary btn-sm">Editar</a>
						  <meta name='csrf-token' content=" {{ csrf_token()  }}" />
						  <a id="btn-cursocancelar" onClick="cursoCancelar('{{ route('curso.delete') }}', {{ $curso->id }})" class="btn btn-danger btn-sm">Cancelar</a>
					  </td>
					</tr>
					@endforeach
		
				  </tbody>
				</table>
				
				
			  </div>
			
		</form>
  
  </div>
@endsection