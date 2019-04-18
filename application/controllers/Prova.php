<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Prova extends CI_Controller {

    public function index() {
        $this->listar();
    }

    public function listar(){
        $this->load->model('Prova_model', 'pm');

        $data['provas'] = $this->pm->getAll();
        $this->load->view('ListaProvas', $data);
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');
        $this->form_validation->set_rules('tempo', 'tempo', 'required');
        $this->form_validation->set_rules('descricao', 'descricao', 'required');
        $this->form_validation->set_rules('nintegrantes', 'nintegrantes', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('FormProva');
        } else {
            $this->load->model('Prova_model');
            $data = array(
                'nome' => $this->input->post('nome'),
                'tempo' => $this->input->post('tempo'),
                'descricao' => $this->input->post('descricao'),
                'nintegrantes' => $this->input->post('nintegrantes')
            );
            if ($this->Prova_model->insert($data)) {

                $this->session->set_flashdata('mensagem', 'Prova cadastrada com sucesso!');
                redirect('Prova/listar');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao cadastrar...');
                redirect('Prova/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if($id > 0){
            $this->load->model('Prova_model');

            $this->form_validation->set_rules('nome', 'nome', 'required');
            $this->form_validation->set_rules('tempo', 'tempo', 'required');
            $this->form_validation->set_rules('descricao', 'descricao', 'required');
            $this->form_validation->set_rules('nintegrantes', 'nintegrantes', 'required');

            if ($this->form_validation->run() == false) {

                $data['prova'] = $this->Prova_model->getOne($id);
                $this->load->view('FormProva', $data);
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'tempo' => $this->input->post('tempo'),
                    'descricao' => $this->input->post('descricao'),
                    'nintegrantes' => $this->input->post('nintegrantes')
                );

                if ($this->Prova_model->update($id, $data)) {
                    $this->session->set_flashdata('mensagem', 'Prova alterada com sucesso!');
                    redirect('Prova/listar');
                } else {
                    $this->session->set_flashdata('mensagem', 'Falha ao alterar Prova...');
                    redirect('Prova/alterar/' . $id);
                }
            }
        } else {
            redirect('Prova/listar');
        }
    }
    
    public function deletar($id){
        if($id > 0){
            $this->load->model('Prova_model');
            
            if($this->Prova_model->delete($id)){
                $this->session->set_flashdata('mensagem', 'Prova deletada com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar Prova...');
            }
            
            redirect('Prova/listar');
        }
        redirect('Prova/listar');
    }

}
