<?php

namespace App\Http\Controllers;

use App\Products;
use App\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;
use http\Exception;

class ProductController extends Controller
{
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Products::leftJoin('tags','tags.id','=','products.tag_id')
        ->select('products.*','tags.name')->orderBy('created_at','desc')->paginate(3);

        return view('product.index')->with('products', $products);
    }

    public function create()
    {
        return view('product.create-produto')->with('tags', Tags::all());
    }

    public function show($id)
    {
        $products = Products::find($id);

        if(Cache::has($id) == false)
        {
            Cache::add($id, 'contador', 0.30);
            $products ->total_visualizacao+=1;
            $products->save();
        }
        return view('product.show-produto')->with('products', $products);
    }

    public function store(Request $request)
    {

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            // Recupera a extensão do arquivo
            $extension = $image->getClientOriginalExtension();

            if($extension != 'jpg' && $extension != 'png' && $extension != 'gif'){
                return back()->with('erro', 'Erro: Este arquivo não é uma imagem');
            }

        }

        $products = new Products();
        $products->title = $request->input('title');
        $products->price = $request->input('price');
        $products->description = $request->input('description');
        $products->stock = $request->input('stock');
        $products->tag_id = $request->input('tag_id');
        $products->image = "";

        $validator = validator($request->all(), $products->rules(), $products->mensages);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $products->save();

        if ($request->hasFile('image')) {

            $name = uniqid(date('HisYmd'));
            $nameFile = "{$name}.{$extension}";
            $products->image = $request->file('image')->storeAs('',$nameFile);
            $products->save();

        }

        return redirect('lista-produto');
    }

    public function edit($id)
    {
        $products = Products::find($id);

        return view('product.edit-produto')->with('product',$products)->with('tags', Tags::all());;
    }

    public function update(Request $request, $id)
    {
        $products = Products::find($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            // Recupera a extensão do arquivo
            $extension = $image->getClientOriginalExtension();

            if($extension != 'jpg' && $extension != 'png' && $extension != 'gif'){
                return back()->with('erro', 'Erro: Este arquivo não é uma imagem');
            }

        }
        $products->title = $request->input('title');
        $products->price = $request->input('price');
        $products->description = $request->input('description');
        $products->stock = $request->input('stock');
        $products->tag_id = $request->input('tag_id');

        $validator = validator($request->all(), $products->rules(), $products->mensages);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $products->save();

        if ($request->hasFile('image')) {

            $name = uniqid(date('HisYmd'));
            $nameFile = "{$name}.{$extension}";
            $products->image = $request->file('image')->storeAs('',$nameFile);
            $products->save();

        }
        return redirect('visualizar-produto/'.$products->id);
    }

    public function destroy($id)
    {
        $products = Products::find($id);
        $products->delete();

        return redirect('lista-produto');
    }

    public function adicionarGostei($id)
    {
        $products = Products::find($id);

        if(Cache::has('Voto '.$id) == false)
        {
            Cache::add('Voto'. $id. 'contador', 0.30);
            $products->total_gostei+=1;
            $products->save();

            return back()->with('status','Muito obrigado!');
        }else{
            return back();
        }
    }

    public function adicionarNaoGostei($id)
    {
        $products = Products::find($id);

        if(Cache::has('Voto '.$id) == false)
        {
            Cache::add('Voto'. $id. 'contador', 0.30);
            $products->total_naogostei+=1;
            $products->save();

            return back()->with('status','Obrigado');
        }else{
            return back();
        }
    }
    public function pesquisar(Request $request){
        if($request->input('texto') == false){
            return redirect('/');
        }
        $products = Products::where('title','like','%'.$request->input('texto').'%')
        ->orWhere('description','like','%'.$request->input('texto').'%')
            ->orWhere('price','like','%'.$request->input('texto').'%')->get();

        return view('pesquisa')->with('products',$products);
    }

    public function exportar(Request $request)
    {
        try {
            return $this->exportarExcel($request->all());
        } catch(Exception $exception) {
            return redirect()->back()->with(['alert' => 'danger', 'message' => 'Erro ao exportar planilha']);
        }
    }

    public function exportarExcel()
    {
        // Obtem consulta
        $products = $this->gerarConsultaExportacao()->get();

        // Retorna o resultado da consulta da planilha
        return Excel::download(new ProductsExport($products), 'produtos.xlsx');
    }

    public function gerarConsultaExportacao()
    {
        $query = Products::query()
            ->leftJoin('tags','tags.id','=','products.tag_id')
            ->select([
                'products.id',
                'products.title',
                'products.description',
                'products.price',
                'products.stock',
                'products.total_visualizacao',
                'products.created_at',
                'tags.name',
            ]);

        return $query;
    }
}
