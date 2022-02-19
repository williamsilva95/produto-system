@extends('main')

@section('content')
    <div class="container mt-4">
        <br/>
        <div class="card">
            <div class="card-header text-right">
                <a href="{{url('criar-tag')}}" class="btn btn-primary btn-sm" role="button">Nova Tag</a>
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <table class="table col-md-12">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Nome</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $value)
                        <tr>
                            <th scope="row" class="text-center">{{$value->id}}</th>
                            <td class="text-center">{{$value->name}}</td>
                            <td class="text-center">
                                <a href="{{url('editar-tag/'.$value->id)}}" class="btn btn-primary btn-sm mr-3" role="button">Editar</a>
                                <a href="{{url('deletar-tag/'.$value->id)}}" onClick="deletar()" class="btn btn-danger btn-sm " role="button">Deletar</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row d-flex justify-content-center">
                    {{$tags->render()}}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/product.js') }}"></script>
@endsection
