@extends('main')

@section('content')
    <div class="container mt-5">
        {{--Comentado por causa da adição dos swal --}}
        {{--@if(session('status'))
            <div class="row d-flex justify-content-center">
                 <div class="col-md-6 mt-3">
                    <div class="alert alert-success text-center">
                        {{session('status')}}
                    </div>
                 </div>
            </div>
        @endif--}}
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 mt-3">
                <div class="card mb-3">
                    <img
                        src="{{ url('storage/'.$products->image) }}" alt="{{$products->title}}"
                        class="card-img-top" width="500" height="300"/>
                    <div class="card-body">
                        <h4 class="card-title text-center">{{$products->title}}</h4>
                        <h5 class="card-title text-center">R$ {{$products->price}}</h5>
                        <p class="card-text">
                            {{$products->description}}
                        </p>
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <p class="card-text text-left mb-0">
                                    <small class="text-muted">Total Vizualização: {{ $products->total_visualizacao }}</small>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text text-right mb-0">
                                    <small class="text-muted">Estoque: {{ $products->stock }}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{url('adicionar-gostei/'.$products->id)}}" onclick="gostei()" class="btn btn-success btn-sm mr-3">Gostei ({{$products->total_gostei}})</a>
                        <a href="{{url('adicionar-naogostei/'.$products->id)}}" onclick="naoGostei()" class="btn btn-danger btn-sm">Não Gostei ({{$products->total_naogostei}})</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/product.js') }}"></script>
@endsection
