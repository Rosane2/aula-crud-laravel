@extends('index')

@section('content')
<form class="row g-3" method="post" action="{{ route('atualizar.curso', $findCurso->id) }}">
  <!-- enviando token na requisição -->
  @csrf
  @method('PUT')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Alterar Cursos</h1>
  </div>
  <div class="col-md-6">
    <label class="form-label">Nome do Curso</label>
    <input type="text" name="nomecurso" class="form-control" value="{{ isset($findCurso->nomecurso) ? $findCurso->nomecurso : old('nomecurso') }}">
  </div>
  <div class="col-md-3">
    <label class="form-label">Carga Horaria</label>
    <input type="text" name="cargahoraria" class="form-control" value="{{ isset($findCurso->cargahoraria) ? $findCurso->cargahoraria : old('cargahoraria')  }}">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Gravar</button>
  </div>
</form>
@endsection