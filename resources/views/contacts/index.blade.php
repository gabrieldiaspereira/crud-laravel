@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div class="col-sm-12">
    <h1 class="display-3">Users</h1>    
  <div>
    <a style="margin: 19px;" href="{{ route('contacts.create')}}" class="btn btn-primary">New user</a>
  </div>  
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nome</td>
          <td>Email</td>
          <td>Telefone</td>
          <td>CEP</td>
          <td>UF</td>
	  <td>Cidade</td>
	  <td>Bairro</td>
	  <td>Rua</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->id}}</td>
            <td>{{$contact->nome}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->telefone}}</td>
            <td>{{$contact->cep}}</td>
            <td>{{$contact->uf}}</td>
            <td>{{$contact->cidade}}</td>
            <td>{{$contact->bairro}}</td>
            <td>{{$contact->rua}}</td>
            <td>
                <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('contacts.destroy', $contact->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
