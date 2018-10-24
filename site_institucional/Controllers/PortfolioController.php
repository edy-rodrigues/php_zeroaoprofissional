<?php
namespace Controllers;

use \Core\Controller;
use \Models\Portfolio;

class PortfolioController extends Controller {

    public function index() {
        $data = array();
        
        $Portfolio = new Portfolio();
        $data['portfolio'] = $Portfolio->getPortfolio();

        $this->loadTemplate('portfolio', $data);
    }

}
?>