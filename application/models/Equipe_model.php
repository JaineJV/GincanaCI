<?php

class Equipe_model extends CI_Model {
    
    public function getAll(){
        
        $query = $this->db->get('equipe');
        return $query->result();
        
    }
    
    public function insert($data = array()){
        
        $this->db->insert('equipe', $data);
        return $this->db->affected_rows();
        
    }
    
    public function getOne($id){
        
        $this->db->where('nome', $id);
        $query = $this->db->get('equipe');
        return $query->row(0);
        
    }
    
    public function update($id, $data = array()){
        if($id > 0){
            $this->db->where('id', $id);
            $this->db->update('nome', $data);
            return $this->db->affected_rows();
        } else {
            return false;
        }
        
    }
    
    public function delete($id){
        if($id > 0){
            $this->db->where('nome', $id);
            $this->db->delete('equipe');
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
        
    }
}
