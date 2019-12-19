@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a user</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('contacts.store') }}">
          @csrf
          <div class="form-group">    
              <label for="nome">Nome:</label>
              <input type="text" required class="form-control" name="nome"/>
          </div>
          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" required class="form-control" name="email"/>
          </div>
	  <div class="form-group">
              <label for="telefone">telefone:</label>
              <input type="text" required class="form-control" name="telefone"/>
          </div>
          <div class="form-group">
              <label for="cep">CEP:</label>
              <input type="text" required class="form-control" name="cep"/>
          </div>
          <div class="form-group">
              <label for="uf">UF:</label>
              <input type="text" required class="form-control" name="uf"/>
          </div>
          <div class="form-group">
              <label for="cidade">Cidade:</label>
              <input type="text" required class="form-control" name="cidade"/>
          </div>
	  <div class="form-group">
              <label for="bairro">Bairro:</label>
              <input type="text" required class="form-control" name="bairro"/>
          </div>
	  <div class="form-group">
              <label for="rua">Rua:</label>
              <input type="text" required class="form-control" name="rua"/>
          </div>                  
          <button type="submit" class="btn btn-primary-outline">Add user</button>
      </form>
  </div>
</div>
</div>
@endsection
