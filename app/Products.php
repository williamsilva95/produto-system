<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = ['title', 'price', 'description', 'image', 'stock', 'tag_id'];

    public function rules() {

        return [

            'title'  => 'required',
            'price'=>'required',
            'description' => 'required',
            'stock' => 'required',
            'tag_id' => 'required|not_in:0',
            'image' => 'required',


        ];
    }

    public $mensages = [

        'title.required' => 'Titulo não informado.',
        'description.required' => 'Descrição não informada.',
        'image.required' => 'Imagem é obrigatório.',
        'price.required' => 'Preço é obrigatório.',
        'stock.required' => 'Estoque é obrigatório.',
        'tag_id.required' => 'Tag não informado.',
        'tag_id.not_in' => 'Tag não selecionado.',

    ];
}
