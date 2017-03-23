<?php

namespace App\Controller;

use App\Model\Villes;

class HomeController extends Controller {

    /**
     * HomeController constructor
     */
    public function __construct() {

    }

    /**
     * permet de retourner la home page
     * @throws \App\Router\RouterException
     */
    public function index(){
        $this->render("home");
    }

    public function search($msg){
        if(!$this->isAjax())
            $this->error(500);
        $response = Villes::find($msg);
        echo json_encode($response);
    }

    /**
     * Redirection vers la page home
     */
    public function racine(){
        header('Location: /home');
        die();
    }

}