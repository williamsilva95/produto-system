@extends('main')

@section('content')
    <br><br>
    <div class="container mt-5 row d-flex justify-content-center">
        <br/>
        <div class="card col-md-8">
            <div class="card-body">
                <form action="{{url('criar-tag')}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}

                    @if(session('erro'))
                        <div class="alert alert-danger">
                            {{session('erro')}}
                        </div>
                    @endif
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Nome">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mr-3">Salvar</button>
                    <a href="{{url('lista-tag')}}" class="btn btn-light btn-sm border-dark" role="button">Voltar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
