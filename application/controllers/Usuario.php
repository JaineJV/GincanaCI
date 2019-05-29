<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Usuario_model');
    }

    public function index() {
        $this->load->view('Usuario/Login');
    }

    public function login() {
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Usuario/Login');
        } else {

            $usuario = $this->Usuario_model->getUsuario(
                    $this->input->post('email'), $this->input->post('senha')
            );

            if ($usuario) {
                $data = array(
                    'idUsuario' => $usuario->id,
                    'email' => $usuario->email,
                    'logado' => true
                );

                $this->session->set_userdata($data);
                redirect($this->config->base_url());
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-warning"> Usuário e senha incorretos</div>');
                redirect($this->config->base_url() . 'Usuario/login');
            }
        }
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('Usuario/CadastroUsuario');
        } else {

            $data = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'senha' => sha1($this->input->post('senha') . 'jaineSENAC')
            );
            if ($this->Usuario_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Usuário cadastrado com sucesso!</div>');
                redirect('Usuario/login');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Usuario/cadastrar');
            }
        }
    }

    public function alterar() {
        $id = $this->session->userdata('idUsuario');
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');


        if ($this->form_validation->run() == false) {

            $data['usuario'] = $this->Usuario_model->getOne($id);

            $this->load->view('Usuario/CadastroUsuario', $data);
        } else {
            $data = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
            );

            if ($this->input->post('senha') != '') {
                $data['senha'] = sha1($this->input->post('senha') . 'jaineSENAC');
            }

            if ($this->Usuario_model->update($id, $data)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Usuário alterado com sucesso!</div>');
                redirect('Prova/listar');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar Usuário...</div>');
                redirect('Usuario/alterar/' . $id);
            }
        }
    }

    public function redefinirSenha() {

        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('Usuario/RedefinirSenha');
        } else {
            $email = $this->Usuario_model->redefinir(
                    $this->input->post('email')
            );
            
                if (valid_email($email)) {
                    echo 'email is valid';

                $this->load->library('email');
                $this->email->from(' sistemagincana@email.com ', 'Sistema Gincana');
                $this->email->to($this->session->set_userdata($email));

                $this->email->subject('Email Test');
                $this->email->message('Testing the email class.');

                $this->email->send();
            } else {
                echo 'email is not valid';
            }
        }
    }

    public function sair() {
        $this->session->sess_destroy();
        redirect($this->config->base_url());
    }

}
