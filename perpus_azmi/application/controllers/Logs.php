<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Models','m');
	}

	public function index()
	{
		$this->load->view('log/index');

	}
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$akses 	= $this->input->post('akses');

		$select = $this->db->select('*');
		$select = $this->db->where('username',$username);
		$select = $this->db->where('password',$password);
		$select = $this->db->where('akses',$akses);
		$data['read']=$this->m->Get_All('user',$select);
		
		if(count($data)>0){
			if($akses != 'admin'){
				header("location: ../Admin/index");
			}
			elseif ($akses != 'anggota') {
						header("location: ../Anggota/index");
			}		
		}else{
			echo "Gagal";
		}

	}

	public function logout(){
		$this->session->session_destroy();
		redicect('index');
	}
}