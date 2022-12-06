@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11 col-md-9 p-0">
            <div class="card">
                <div class="card-header">
                    <p>Criar pessoa</p>
                    <a class="btn btn-sm btn-primary" href="{{route('person.index')}}">Voltar à lista</a>
                </div>
                <div class="card-body">
                    <form action="{{route('person.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text"  class="form-control" name="name" placeholder="Nome" value="{{old('name')}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <input type="text"  class="form-control" name="cpf" placeholder="CPF"  value="{{old('cpf')}}">
                            @error('cpf')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <input type="text"  class="form-control" name="email" placeholder="Email"  value="{{old('email')}}">
                            @error('email')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <input type="text" class="form-control" name="password" placeholder="Senha" value="{{old('password')}}">
                            @error('password')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <input type="file" class="form-control" name="img" accept="image/*">
                            @error('img')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <select class="form-control" name="type"  value="{{old('type')}}" required>
                                <option value="">Tipo de usuário</option>
                                <option value="student">Estudante</option>
                                <option value="teacher">Professor</option>
                            </select>
                            @error('type')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <button class="btn btn-sm btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
