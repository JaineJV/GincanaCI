<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Equipe extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Usuario_model');
        $this->load->model('Equipe_model');
        $this->Usuario_model->verificaLogin();
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Equipe_model', 'em');

        $data['equipes'] = $this->em->getAll();

        $this->load->view('Header');
        $this->load->view('Equipe/ListaEquipes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        
      
        $this->form_validation->set_rules('nome', 'nome', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('Header');
            $this->load->view('Equipe/FormEquipe');
            $this->load->view('Footer');
        } else {

            $data = array(
                'nome' => $this->input->post('nome')
            );

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = $this->upload->display_errors();//criar uma sessão para ter-se o exit para o usuario tentar novamente
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">'.$errors.'</div>');
                redirect('Equipe/listar');
                exit();
            } else {
                $data['imagem'] = $this->upload->data('file_name');
            }

            if ($this->Equipe_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Equipe cadastrada com sucesso!</div>');
                redirect('Equipe/listar');
            } else {
                unlink('./uploads/'.$data['imagem']);
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Equipe/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('nome', 'nome', 'required');

            if ($this->form_validation->run() == false) {

                $data['equipe'] = $this->Equipe_model->getOne($id);

                $this->load->view('Header');
                $this->load->view('Equipe/FormEquipe', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome')
                );

                if ($this->Equipe_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Equipe alterada com sucesso!</div>');
                    redirect('Equipe/listar');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar Equipe...</div>');
                    redirect('Equipe/alterar/' . $id);
                }
            }
        } else {
            redirect('Equipe/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            unlink('./uploads/'); //falta
            if ($this->Equipe_model->delete($id)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Prova deletada com sucesso!</div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao deletar Prova...</div>');
            }

            redirect('Equipe/listar');
        }
        redirect('Equipe/listar');
    }

}
