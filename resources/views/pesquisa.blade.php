@extends('main')

@section('content')
    <div class="container mt-4">
        <br/>
        <div class="card">
            <div class="card-header text-right">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <a href="{{url('criar-produto')}}" class="btn btn-primary btn-sm" role="button">Novo Produto</a>
                    </div>
                    <div class="col-md-6">
                        <form class="form-inline my-lg-0 d-flex justify-content-end" action="{{url('pesquisar')}}" method="post">
                            {{csrf_field()}}
                            <input class="form-control mr-sm-2 form-control-sm" type="search" placeholder="Search" aria-label="Search" name="texto">
                            <button class="btn btn-success btn-sm" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach($products as $value)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <img src="{{ url('storage/'.$value->image) }}" alt="{{$value->title}}"
                                     class="card-img-top" height="300"/>
                                <div class="card-body">
                                    <h4 class="card-title text-center">{{$value->title}}</h4>
                                    <h5 class="card-title text-center">R$ {{$value->price}}</h5>
                                    <p class="card-text">
                                        {{$value->description}}
                                    </p>
                                </div>
                                <small class="text-muted text-right mr-2">{{$value->name}}</small>
                                <div class="card-footer text-center">
                                    <a href="{{url('visualizar-produto/'.$value->id)}}" class="btn btn-success btn-sm mr-3" role="button">Vizualizar</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/post.js') }}"></script>
@endsection
