<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  use HasFactory;

  protected $guarded = array('id');

  public function category()
  {
    return $this->belongsTo('App\Models\Category');
  }

  public static function doSearch($name, $price_heigh, $price_low, $calorie_heigh, $calorie_low, $category_id)
  {
    $query = Menu::query();

    if (!empty($name)) {
      $query->where('name', 'LIKE',  "%{$name}%");
    }

    if (!empty($price_heigh) && !empty($price_low)) {
      $query->whereBetween('price', [$price_heigh, $price_low]);
    } elseif (!empty($price_low)) {
      $query->where('price', '<=', $price_low);
    } elseif (!empty($price_heigh)) {
      $query->where('price', '>=', $price_heigh);
    }

    if (!empty($calorie_low) && !empty($calorie_heigh)) {
      $query->where('calorie', '<=', $calorie_low)->where('calorie', '>=', $calorie_heigh);
    } elseif (!empty($calorie_low)) {
      $query->where('calorie', '<=', $calorie_low);
    } elseif (!empty($calorie_heigh)) {
      $query->where('calorie', '>=', $calorie_heigh);
    }

    if (!empty($category_id)) {
      $query->where('category_id', $category_id);
    }
    $results = $query->get();
    return $results;
  }

  function isSelectedCategory($category_id)
  {
    return $this->category_id == $category_id ? 'selected' : '';
  }
}
