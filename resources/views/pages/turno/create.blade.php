@extends('index')

@section('content')
<form class="row g-3" method="post" action="{{ route('cadastrar.turno') }}">
  <!-- enviando token na requisição -->
  @csrf
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Incluir Turno</h1>
  </div>
  <div class="col-md-6">
    <label class="form-label">Nome do Turno</label>
    <input type="text" name="descricao" class="form-control" value="{{ old('descricao') }}" required>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Gravar</button>
  </div>
</form>
@endsection