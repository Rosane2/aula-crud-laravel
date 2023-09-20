@extends('index')

@section('content')
<form class="row g-3" method="post" action="{{ route('atualizar.aluno', $find->id)) }}">
  <!-- enviando token na requisição -->
  @csrf
  @method('PUT')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
	<h1 class="h2">Alterar Aluno</h1>
  </div>
  <div class="col-md-4">
    <label class="form-label">Matricula</label>
    <input type="text" name="matricula" class="form-control" value="{{ isset($find->matricula) ? $find->matricula : old('matricula') }}"  required>
  </div>
  <div class="col-md-8">
    <label class="form-label">Nome</label>
    <input type="text" name="nomedoaluno" class="form-control" value="{{ isset($find->nomedoaluno) ? $find->nomedoaluno : old('nomedoaluno') }}" required>
  </div>

  <div class="col-md-3">
    <label class="form-label">CPF</label>
    <input type="text" name="cpf" class="form-control" value="{{ isset($find->cpf) ? $find->cpf : old('cpf') }}">
  </div>
  <div class="col-md-6">
    <label class="form-label">EMAIL</label>
    <input type="text" name="email" class="form-control" value="{{ isset($find->email) ? $find->email : old('email') }}">
  </div>
  <div class="col-md-3">
    <label class="form-label">Telefone</label>
    <input type="text" name="celular" class="form-control" value="{{ isset($find->celular) ? $find->celular : old('celular') }}">
  </div>

  <div class="col-md-4">
    <label class="form-label">CEP</label>
    <input type="text" id="cep" name="cep" class="form-control" value="{{ isset($find->cep) ? $find->cep : old('cep') }}" required>
  </div>
  <div class="col-md-8">
    <label class="form-label">Endereço</label>
    <input type="text" id="rua" name="rua" class="form-control" value="{{ isset($find->rua) ? $find->rua : old('rua') }}">
  </div>
  <div class="col-md-3">
    <label class="form-label">Numero</label>
    <input type="text" id="numero" name="numero" class="form-control" value="{{ isset($find->numero) ? $find->numero : old('numero') }}">
  </div>
  <div class="col-md-3">
    <label class="form-label">Complemento</label>
    <input type="text" id="complemento" name="complemento" class="form-control" value="{{ isset($find->complemento) ? $find->complemento : old('complemento') }}">
  </div>
  <div class="col-md-6">
    <label class="form-label">Bairro</label>
    <input type="text" id="bairro" name="bairro" class="form-control" value="{{ isset($find->bairro) ? $find->bairro : old('bairro') }}">
  </div>
  <div class="col-md-6">
    <label class="form-label">Cidade</label>
    <input type="text" id="cidade" name="cidade" class="form-control" value="{{ isset($find->cidade) ? $find->cidade : old('cidade') }}">
  </div>
  <div class="col-md-6">
    <label class="form-label">UF</label>
    <input type="text" id="uf" name="uf" class="form-control" value="{{ isset($find->uf) ? $find->uf : old('uf') }}">
  </div>



  <div class="col-md-6">
    <label class="form-label"> Curso</label>
        <select class="form-select" name="idcurso_atual">
        <option selected>Clique para selecionar</option>
        @foreach ($findCurso as $curso)
            <option value="{{ $curso->id }}"> {{ $curso->nomecurso }} </option>
        @endforeach
    </select>
  </div>
  <div class="col-md-6">
    <label class="form-label"> Turno</label>
    <select class="form-select" name="idturno_atual">
    <option selected>Clique para selecionar</option>
    @foreach ($findTurno as $turno)
          <option value="{{ $turno->id }}"> {{ $turno->descricao }} </option>
    @endforeach
    </select>
  </div>
  <div class="col-md-4">
    <label class="form-label"> Status</label>
        <select class="form-select" name="idstatus_atual">
        <option selected>Clique para selecionar</option>
        @foreach ($findStatus as $status)
            <option value="{{ $status->id }}"> {{ $status->descricao }} </option>
        @endforeach
    </select>
  </div>
  <div class="col-md-4">
    <label class="form-label"> Primeiro Semestre</label>
    <select class="form-select" name="anosemestre_primeiro">
    <option selected>Clique para selecionar</option>
    @foreach ($findSemestre as $sem)
          <option value="{{ $sem->anosemestre }}"> {{ $sem->anosemestre }} </option>
    @endforeach
    </select>
  </div>
  <div class="col-md-4">
    <label class="form-label"> Ultimo Semestre</label>
    <select class="form-select" name="anosemestre_ultimo">
    <option selected>Clique para selecionar</option>
    @foreach ($findSemestre as $sem)
          <option value="{{ $sem->anosemestre }}"> {{ $sem->anosemestre }} </option>
    @endforeach
    </select>
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Gravar</button>
  </div>
</form>
@endsection