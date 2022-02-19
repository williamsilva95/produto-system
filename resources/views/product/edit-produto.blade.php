@extends('main')
@section('content')
    <br><br>
    <div class="container mt-5 row d-flex justify-content-center">
        <br/>
        <div class="card col-md-8">
            <div class="card-body">
                <form action="{{url('editar-produto/'.$product->id)}}" method="post" enctype="multipart/form-data" id="edit-product">
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
                        <label for="title">Titulo</label>
                        <input name="title" type="text" class="form-control" id="title" required value="{{$product->title}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea name="description" class="form-control" id="description" rows="3" required>{{$product->description}}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="price">Preço</label>
                            <input name="price" type=number step=0.01 class="form-control" id="price" required value="{{$product->price}}">
                        </div>
                        <div class="form-group col-6">
                            <label for="stock">Estoque</label>
                            <input name="stock" type="number" class="form-control" id="stock" required value="{{$product->stock}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tag_id">Tag</label>
                        <select class="form-control" id="tag_id" name="tag_id">
                            <option value="null" selected>Selecione</option>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Imagem</label>
                        <input name="image" type="file" class="form-control-file" id="image" value="{{$product->image}}">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mr-3">Salvar</button>
                    <a href="{{url('lista-produto')}}" class="btn btn-light btn-sm border-dark" role="button">Voltar</a>
                </form>
            </div>
        </div>
    </div>
@endsection
