@extends('template')

@section('conteudo')
  <h1>Formulário de Aluno</h1>

  <form action="{{ $aluno->id ? route('aluno.atualizar', $aluno->id) : route('aluno.salvar') }}" method="POST" enctype="multipart/form-data">
    

    @if($aluno->id)
      @method('PUT')
    @endif
    @csrf
    <div class="form-group">
      <label for="nome">Nome:</label>
      <input type="text" class="form-control" name="nome" value="{{ $aluno->nome }}" required>
    </div>

    <div class="mb-3">
  <label for="cpf" class="form-label">CPF</label>
  <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $aluno->cpf }}" required maxlength="11" oninput="validateCPF(this)">
  <div id="cpf-error" class="invalid-feedback" style="display: none;">Digite 11 caracteres para o CPF.</div>
  </div>

    <div class="form-group">
      <label for="sexo">Sexo:</label>
      <select name="sexo" class="form-control" required>
        <option value="">Selecione</option>
        <option value="M" @if ($aluno->sexo == 'M') selected @endif>Masculino</option>
        <option value="F" @if ($aluno->sexo == 'F') selected @endif>Feminino</option>
      </select>
    </div>

    <div class="form-group">
      <label for="codigo_turma">Código da Turma:</label>
      <input type="text" class="form-control" name="codigo_turma" value="{{ $aluno->codigo_turma }}" required>
    </div>

    <div class="form-group">
      <label for="codigo_materia">Código da Matéria:</label>
      <input type="text" class="form-control" name="codigo_materia" value="{{ $aluno->codigo_materia }}" required>
    </div>

    <div class="form-group">
      <label for="arquivo">Imagem:</label>
      <input type="file" class="form-control" id="arquivo" name="arquivo" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('aluno.listar') }}" class="btn btn-secondary">Cancelar</a>
  </form>
@endsection