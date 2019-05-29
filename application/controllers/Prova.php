<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prova extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('Usuario_model');
        $this->load->model('Prova_model');
        $this->Usuario_model->verificaLogin();
    }

    public function index() {
        $this->listar();
    }

    public function listar(){
        $this->load->model('Prova_model', 'pm');

        $data['provas'] = $this->pm->getAll();
        
        $this->load->view('Header');
        $this->load->view('Prova/ListaProvas', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('tempo', 'tempo', 'required');
        $this->form_validation->set_rules('descricao', 'descricao', 'required');
        $this->form_validation->set_rules('nintegrantes', 'nintegrantes', 'required');

        if ($this->form_validation->run() == false) {
            
            $this->load->view('Header');
            $this->load->view('Prova/FormProva');
            $this->load->view('Footer');
        } else {
            $data = array(
                'nome' => $this->input->post('nome'),
                'tempo' => $this->input->post('tempo'),
                'descricao' => $this->input->post('descricao'),
                'nintegrantes' => $this->input->post('nintegrantes')
            );
            if ($this->Prova_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Prova cadastrada com sucesso!</div>');
                redirect('Prova/listar');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Prova/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if($id > 0){

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('tempo', 'tempo', 'required');
            $this->form_validation->set_rules('descricao', 'descricao', 'required');
            $this->form_validation->set_rules('nintegrantes', 'nintegrantes', 'required');

            if ($this->form_validation->run() == false) {

                $data['prova'] = $this->Prova_model->getOne($id);
                
                $this->load->view('Header');
                $this->load->view('Prova/FormProva', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'tempo' => $this->input->post('tempo'),
                    'descricao' => $this->input->post('descricao'),
                    'nintegrantes' => $this->input->post('nintegrantes')
                );

                if ($this->Prova_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Prova alterada com sucesso!</div>');
                    redirect('Prova/listar');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar Prova...</div>');
                    redirect('Prova/alterar/' . $id);
                }
            }
        } else {
            redirect('Prova/listar');
        }
    }
    
    public function deletar($id){
        if($id > 0){
            
            if($this->Prova_model->delete($id)){
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Prova deletada com sucesso!</div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao deletar Prova...</div>');
            }
            
            redirect('Prova/listar');
        }
        redirect('Prova/listar');
    }

}
