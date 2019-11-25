<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";
    protected $primarykey="id";
  protected $fillable = [
      'cat_name'
  ];
}
