<?php

namespace App\Http\Controllers;

class HomeController extends Controller {
    
    /**
     * Create new instance of controller.
     */
    public function __construct() {
        
    }
    
    public function renderWeb() {
        // do the php
       
        // render the views - includes for now
        include(__DIR__."/../../../resources/views/common/header.phtml");
        include(__DIR__."/../../../resources/views/pages/home.phtml");
        include(__DIR__."/../../../resources/views/common/footer.phtml");
    }
}
