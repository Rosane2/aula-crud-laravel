@extends('index')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Tipo Status</h1>
  </div>
  
  <div class="container">
		<form action="" method="get">
			<div class="mb-3">
				<input type="text" name="pesquisar" placeholder="Digite a descricao do status">
				<button class="btn btn-secondary">Pesquisar</button>
			</div>
			<div>
			<a href="{{ route('cadastrar.tipostatus') }}" class="btn btn-success btn-sm">Incluir</a>
			</div>
			
			
			  <div class="table-responsive mt-4">
				<table class="table table-striped table-sm">
				  <thead>
					<tr>
					  <th scope="col">ID Status</th>
					  <th scope="col">Nome do Status</th>
					  <th scope="col">Ações</th>
					</tr>
				  </thead>
				  <tbody>
				    @foreach ( $find as $linha ) 
					<tr>
					  <td>{{ $linha->id }}</td>
					  <td>{{ $linha->descricao }}</td>
					  <td>{{ $linha->ativo }}</td>
					  <td> 
						  <a href="{{ route('atualizar.tipostatus', $linha->id) }}" id="btn-editar" class="btn btn-primary btn-sm">Editar</a>
						  <meta name='csrf-token' content=" {{ csrf_token()  }}" />
						  <a id="btn-cancelar" onClick="Cancelar('{{ route('tipostatus.delete') }}', {{ $linha->id }})" class="btn btn-danger btn-sm">Cancelar</a>
						  <a id="btn-habilitar" onClick="Habilitar('{{ route('tipostatus.habilitar') }}', {{ $linha->id }})" class="btn btn-info btn-sm">Habilitar</a>
					  </td>
					</tr>
					@endforeach
		
				  </tbody>
				</table>
				
				
			  </div>
			
		</form>
  
  </div>
@endsection