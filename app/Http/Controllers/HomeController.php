<?php
/*
 * TODO:
 *
#6 setup the mail - doesn't work on digitalocean
 */
namespace App\Http\Controllers;
use App\Gallery as Gallery;

class HomeController extends Controller {
    public $cacheVersionStatic;

    /**
     * Create new instance of controller.
     */
    public function __construct()
    {
      $this->cacheVersionStatic = time();
    }

    public function renderWeb()
    {
        // do the php
        $pageData = array();

        $pageData['route'] = htmlspecialchars(isset($_GET['REQUEST_URI']) ? $_GET['REQUEST_URI'] : '/');
        $pageData['cache_version_static'] = $this->cacheVersionStatic;
        $pageData['gallery_image_urls'] = $this->generateGalleryImageUrls(null, 61, false);

        // render the views - includes for now
        include(__DIR__."/../../../resources/views/common/header.phtml");
        include(__DIR__."/../../../resources/views/pages/home.phtml");
        include(__DIR__."/../../../resources/views/common/footer.phtml");
    }

    public function post()
    {
        // check if we want to send mail

        $this->sendMail();
    }

    private function sendMail()
    {
        if (empty($_POST)) {
            return null;
        }

        $postData = array_map(function($item) {
            return htmlspecialchars($item);
        }, $_POST);

        #mail('mb.iordache@gmail.com', 'test', 'testbody');

        // done, send home
        header('Location: /');
    }

    private function generateGalleryImageUrls($howMany = null, $slice = 6, $randomize = true)
    {
      $gallery = new Gallery();
      return $gallery->generateGalleryImages($howMany, $slice, $randomize);
    }


}
