<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  public function __construct()
  {

  }

  public function generateGalleryImages($howMany = null, $slice = 6, $randomize = true)
  {
    $amount = $howMany !== null ? $howMany : 61;

    $images = [];
    for($i=1; $i < $amount; $i++) {
      $images[] = sprintf("/images/gallery/%04d.jpg", $i);
    }

    // randomize and slice for now
    if ($randomize) {
      shuffle($images);
    }

    if ($slice !== null) {
      $images = array_slice($images, 0, $slice, true);
    }

    return $images;
  }
}
