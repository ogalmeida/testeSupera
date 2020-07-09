<?php

namespace App\Http\Controllers\utils;

class Image{
  public static function uploadImage($file){
    $name = time().$file->getClientOriginalName();
    $file->move(public_path('img/'), $name);

    return $name;
  }
}
