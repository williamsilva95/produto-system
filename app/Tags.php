<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';

    protected $fillable = ['name'];

    public function rules() {

        return [

            'name'  => 'required'


        ];
    }

    public $mensages = [

        'name.required' => 'Nome não informado.'

    ];
}
