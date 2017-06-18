<?php
/*
 * TODO:
 *

#2 For Galleries, add a text mentioning that they are samples under the main header title
"Here's some samples for you to be inspired"


#4 create the home page


#6 setup the mail

#8 background check with chrome / firefox when in full screen BG goes dark

 */
namespace App\Http\Controllers;

class HomeController extends Controller {
    public $cacheVersionStatic = md5(mt_rand(time()));

    /**
     * Create new instance of controller.
     */
    public function __construct()
    {

    }

    public function renderWeb()
    {
        // do the php
        $pageData = array();

        $pageData['route'] = htmlspecialchars(isset($_GET['REQUEST_URI']) ? $_GET['REQUEST_URI'] : '/');
        $pageData['cache_version_static'] = $this->cacheVersionStatic;

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

        // done, send home
        header('Location: /');
    }
}
