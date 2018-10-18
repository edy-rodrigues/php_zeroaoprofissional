<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }

    public function index() {

        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'Todas as notícias';

        $this->load->view('template/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function view($uri) {
        $data['news_item'] = $this->news_model->get_news($uri);

        if(empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('template/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('template/footer', $data);
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Crie uma nova notícia';

        $this->form_validation->set_rules('title', 'Titulo', 'required');
        $this->form_validation->set_rules('text', 'Texto', 'required');

        if($this->form_validation->run() === false) {
            $this->load->view('template/header', $data);
            $this->load->view('news/create', $data);
            $this->load->view('template/footer', $data);
        } else {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }
}
