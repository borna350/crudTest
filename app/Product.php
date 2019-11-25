<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";
    protected $primarykey="id";
  protected $fillable = [
      'product_name', 'product_price', 'cat_id'
  ];
}
