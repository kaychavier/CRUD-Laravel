@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11 col-md-9 p-0">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <span>{{session()->get('success')}}</span>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <p>Lista de pessoas</p>
                    <a class="btn btn-sm btn-primary" href="{{route('person.create')}}">+</a>
                </div>
                <div class="card-body">
                    <table class="table table-borderless table-hover table-responsive">
                        <thead>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Senha</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @forelse ($people as $person)
                                <tr>
                                    <td>{{$person->name}}</td>
                                    <td>{{$person->type}}</td>
                                    <td>{{$person->email}}</td>
                                    <td>{{$person->cpf}}</td>
                                    <td>{{$person->password}}</td>
                                    <td>
                                        <a href="{{route('person.edit', $person)}}" class="btn btn-sm btn-success">Alterar</a>
                                        <form action="{{route('person.destroy', $person)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Deseja excluir esta pessoa?')">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Nenhuma pessoa encontrada</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$people->links('vendor.pagination.bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
