<?php

namespace App\Http\Controllers;

use App\Tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    public function index()
    {
        $tags = Tags::select('tags.*')->orderBy('created_at','asc')->paginate(5);

        return view('tag.index')->with('tags', $tags);
    }

    public function create()
    {
        return view('tag.create-tag');
    }

    public function store(Request $request)
    {

        $tags = new Tags();
        $tags->name = $request->input('name');

        $validator = validator($request->all(), $tags->rules(), $tags->mensages);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $tags->save();


        return redirect('lista-tag');
    }

    public function edit($id)
    {
        $tags = Tags::find($id);

        return view('tag.edit-tag')->with('tag',$tags);
    }

    public function update(Request $request, $id)
    {
        $tags = Tags::find($id);

        $tags->name = $request->input('name');

        $validator = validator($request->all(), $tags->rules(), $tags->mensages);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $tags->save();

        return redirect('lista-tag');
    }

    public function destroy($id)
    {
        $tags = Tags::find($id);
        $tags->delete();

        return redirect('lista-tag');
    }
}
