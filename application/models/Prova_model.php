<?php

class Prova_model extends CI_Model{
    
    public function getAll(){
        $query = $this->db->get('prova');
        
        return $query->result();
    }
    
    public function insert($data = array()){
        $this->db->insert('prova', $data);
        
        return $this->db->affected_rows();
    }
    
    public function getOne($id){
        $this->db->where('id', $id);
        $query = $this->db->get('prova');
        
        return $query->row(0);
    }
    
    public function update($id, $data = array()){
        if($id > 0){
            $this->db->where('id', $id);
            $this->db->update('prova', $data);
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
    
    public function delete($id){
        if($id > 0){
            $this->db->where('id', $id);
            $this->db->delete('prova');
            
            return $this->db->affected_rows();
        } else {
            return false;
        }
    }
}

