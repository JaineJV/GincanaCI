<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pontuacao extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Usuario_model');
        $this->load->model('Pontuacao_model');
        $this->Usuario_model->verificaLogin();
    }

    public function index() {
        $this->listar();
    }

    public function listar() {
        $this->load->model('Pontuacao_model', 'pm');

        $data['pontuacoes'] = $this->pm->getAll();

        $this->load->model('Prova_model', 'pm');

        $data['provas'] = $this->pm->getAll();

        $this->load->view('Header');
        $this->load->view('Pontuacao/ListaPontuacoes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('id_equipe', 'equipe', 'required');
        $this->form_validation->set_rules('id_prova', 'prova', 'required');
        $this->form_validation->set_rules('id_usuario', 'usuario', 'required');
        $this->form_validation->set_rules('pontos', 'pontos', 'required');
        $this->form_validation->set_rules('data_hora', 'data_hora', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->model('Equipe_model', 'em');

            $data['equipes'] = $this->em->getAll();

            $this->load->model('Prova_model', 'pm');

            $data['provas'] = $this->pm->getAll();

            $this->load->model('Usuario_model', 'um');

            $data['usuarios'] = $this->um->getAll();

            $this->load->view('Header');
            $this->load->view('Pontuacao/FormPontuacao', $data);
            $this->load->view('Footer');
        } else {
           
            $data = array(
                'id_equipe' => $this->input->post('id_equipe'),
                'id_prova' => $this->input->post('id_prova'),
                'id_usuario' => $this->input->post('id_usuario'),
                'pontos' => $this->input->post('pontos'),
                'data_hora' => $this->input->post('data_hora')
            );
            if ($this->Pontuacao_model->insert($data)) {

                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Pontuação cadastrada com sucesso!</div>');
                redirect('Pontuacao/listar');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao cadastrar...</div>');
                redirect('Pontuacao/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('id_equipe', 'equipe', 'required');
            $this->form_validation->set_rules('id_prova', 'prova', 'required');
            $this->form_validation->set_rules('id_usuario', 'usuario', 'required');
            $this->form_validation->set_rules('pontos', 'pontos', 'required');
            $this->form_validation->set_rules('data_hora', 'data_hora', 'required');

            if ($this->form_validation->run() == false) {

                $data['pontuacao'] = $this->Pontuacao_model->getOne($id);

                $this->load->view('Header');
                $this->load->view('Pontuacao/FormPontuacao', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'id_equipe' => $this->input->post('id_equipe'),
                    'id_prova' => $this->input->post('id_prova'),
                    'id_usuario' => $this->input->post('id_usuario'),
                    'pontos' => $this->input->post('pontos'),
                    'data_hora' => $this->input->post('data_hora')
                );

                if ($this->Pontuacao_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Pontuação alterada com sucesso!</div>');
                    redirect('Pontuacao/listar');
                } else {
                    $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao alterar Pontuação...</div>');
                    redirect('Pontuacao/alterar/' . $id);
                }
            }
        } else {
            redirect('Pontuacao/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {

            if ($this->Pontuacao_model->delete($id)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-success" role="alert">Pontuação deletada com sucesso!</div>');
            } else {
                $this->session->set_flashdata('mensagem', '<div class="alert alert-danger" role="alert">Falha ao deletar Pontuação...</div>');
            }

            redirect('Pontuacao/listar');
        }
        redirect('Pontuacao/listar');
    }

}
