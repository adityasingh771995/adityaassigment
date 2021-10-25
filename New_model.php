<?php

Class New_model extends CI_Model{

	public function __construct()
    {
            $this->load->database();
    }

	public function insert_data($data){			
		$this->db->select('*');
		$this->db->from('student_data');
		$this->db->where('email',$data['email']);
		$this->db->limit(1);
		$query=$this->db->get();
		if($query->num_rows()==0){
			$this->db->insert('student_data',$data);
			if($this->db->affected_rows()>0){
				return true;
			}
		}else{
			return false;
		}
	}

	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('student_data');
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	public function getbyid($id){			
		$this->db->select('*');
		$this->db->from('student_data');
		$this->db->where('id',$id);
		$this->db->limit(1);
		$query=$this->db->get();
		if($query->num_rows()==0){
			
			return false;
		}else{
			return $query->result();
		}
	}


	public function update($data,$id){
		$this->db->where('id',$id);
		$this->db->update('student_data',$data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}





}