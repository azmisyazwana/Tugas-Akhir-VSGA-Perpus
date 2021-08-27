<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

/**
 * 
 */
class Models extends CI_Model
{
	
	public function Get_All($table,$select)
	{
		$select;
		$query = $this->db->get($table);
		return $query->result();
	}
	function Save($data, $table){
		$result=$this->db->insert($table, $data);
		return $result;
	}
	public function Get_Where($where, $table)
	{
		$query = $this->db->get_where($table, $where);
		return $query->result();
	}
	function Get_Page($limit, $start, $table){
        $query = $this->db->get($table, $limit, $start);
        return $query;
    }
	
	function Update($where, $data, $table){
		$this->db->update($table, $data, $where);
		return $this->db->affected_rows();
	}
	function Update_All($data, $table){
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}
	function Delete($where, $table){
		$result=$this->db->delete($table, $where);
		return $result;
	}
	function Delete_All($table){
		$result=$this->db->delete($table);
		return $result;
	}
}