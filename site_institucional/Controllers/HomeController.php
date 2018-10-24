<?php
namespace Controllers;

use \Core\Controller;
use \Models\Portfolio;

class HomeController extends Controller {

    public function index() {
        $data = array();
        
        $Portfolio = new Portfolio();
        $data['portfolio'] = $Portfolio->getPortfolio(8);

        $this->loadTemplate('home', $data);
    }

}
?>