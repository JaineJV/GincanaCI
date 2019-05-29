<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Integrante extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
        $this->load->model('Integrante_model');
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Integrante_model', 'im');

        $data['integrantes'] = $this->im->getAll();

        $this->load->view('Header');
        $this->load->view('Integrante/ListaIntegrantes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('id_equipe', 'equipe', 'required');
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('nascimento', 'nascimento', 'required');
        $this->form_validation->set_rules('rg', 'rg', 'required');
        $this->form_validation->set_rules('cpf', 'cpf', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->model('Equipe_model', 'em');

            $data['equipes'] = $this->em->getAll();
            
            $this->load->view('Header');
            $this->load->view('Integrante/FormIntegrante', $data);
            $this->load->view('Footer');
        } else {
            $data = array(
                'id_equipe' => $this->input->post('id_equipe'),
                'nome' => $this->input->post('nome'),
                'nascimento' => $this->input->post('nascimento'),
                'rg' => $this->input->post('rg'),
                'cpf' => $this->input->post('cpf')
            );
            if ($this->Integrante_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Integrante cadastrado com sucesso!</div>');
                redirect('Integrante/listar');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Integrante/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('id_equipe', 'equipe', 'required');
            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('nascimento', 'nascimento', 'required');
            $this->form_validation->set_rules('rg', 'rg', 'required');
            $this->form_validation->set_rules('cpf', 'cpf', 'required');

            if ($this->form_validation->run() == false) {

                $data['integrante'] = $this->Integrante_model->getOne($id);

                $this->load->view('Header');
                $this->load->view('Integrante/FormIntegrante', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'id_equipe' => $this->input->post('id_equipe'),
                    'nome' => $this->input->post('nome'),
                    'nascimento' => $this->input->post('nascimento'),
                    'rg' => $this->input->post('rg'),
                    'cpf' => $this->input->post('cpf')
                );

                if ($this->Integrante_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Integrante alterado com sucesso!</div>');
                    redirect('Integrante/listar');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar Integrante...</div>');
                    redirect('Integrante/alterar/' . $id);
                }
            }
        } else {
            redirect('Integrante/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {

            if ($this->Integrante_model->delete($id)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Integrante deletado com sucesso!</div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao deletar Integrante...</div>');
            }

            redirect('Integrante/listar');
        }
        redirect('Integrante/listar');
    }

}
