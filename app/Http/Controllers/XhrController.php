<?php
/*
 * TODO:
 *
#6 setup the mail - doesn't work on digitalocean
 */
namespace App\Http\Controllers;
use App\Gallery;

class XhrController extends Controller {
    /**
     * Create new instance of controller.
     */
    public function __construct()
    {
    }

    public function renderAllGalleries()
    {
      $pageData['gallery_image_urls'] = $this->generateGalleryImageUrls();

      include(__DIR__."/../../../resources/views/pages/gallery.phtml");
    }

    private function generateGalleryImageUrls()
    {
      $gallery = new Gallery();
      return $gallery->generateGalleryImages(null, null, false);
    }
}
