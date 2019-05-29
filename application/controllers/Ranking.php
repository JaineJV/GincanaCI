<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ranking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
        
    }
    
    public function index() {
        
        $this->lista();
        
    }

    public function lista() {
        
        $this->load->model('Ranking_Model');
        $data['ranking'] = $this->Ranking_Model->getAll();
        
        $this->load->view('Header');
        $this->load->view('ListaRanking', $data);
        $this->load->view('Footer');
    }

}

