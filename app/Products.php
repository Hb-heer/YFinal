<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model

{
    protected $table = 'product';
    protected $fillable = ['name', 'description','Active','sku','regularprice','saleprice','Brand'];

    public function categories()
    {
       return $this->belongsToMany(Categories::class);
    }
    public function rules()
    {
        return [
            'name' => 'required|max:3',
            'description' => 'required|max:5',
            'sku' => 'required|max:2',
            'regularprice' => 'nullable',
            'saleprice' => 'nullable',
        ];
    }
}
