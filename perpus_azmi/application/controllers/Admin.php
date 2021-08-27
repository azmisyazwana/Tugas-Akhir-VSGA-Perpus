<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Models','m');
	}

	public function index()
	{
		$this->load->view('admin/index');
	}

	public function user()
	{
		$select = $this->db->select('*');
		$data['read']=$this->m->Get_All('user',$select);
		$this->load->view('admin/user', $data);
	}

	function tambah_user()
	{
		$select = $this->db->select('*');
		$data['read']=$this->m->Get_All('user',$select);
		$this->load->view('admin/tambah_user');
	}

	function action_tambah_user()
	{
		$data=array(
			'nama'		=>	$this->input->post('nama'),
			'username'	=>	$this->input->post('username'),
			'password'	=>	$this->input->post('password'),
			'akses'	=>	$this->input->post('akses')
		);
		$this->m->Save($data, 'user');
		
		redirect(base_url().'admin/user');
	}

	public function ubah_user()
	{
		$select = $this->db->select('*');
		$select = $this->db->where('username', $_GET['username']);
		$data['read']=$this->m->Get_All('user',$select);
		$this->load->view('admin/ubah_user',$data);
	}

	public function action_ubah_user()
	{
		$table = 'user';
		$where=array(
			'username'		=>	$this->input->post('username')
		);		
		
		$data=array(
			'nama'		=>	$this->input->post('nama'),
			'username'	=>	$this->input->post('username'),
			'password'	=>	$this->input->post('password'),
			'akses'		=>	$this->input->post('akses')
		);
		
		
		$this->m->Update($where, $data, $table);
		redirect('admin/user');
	}

	public function action_delete_user()
	{
		$table = 'user';
		$where=array(
			'username'		=>	$_GET['username']
		);
		$read = $this->m->Get_Where($where, $table);
		
		$this->m->Delete($where, $table);
		redirect(base_url().'admin/user');
	}

	public function buku()
	{
		$select = $this->db->select('*');
		$data['read']=$this->m->Get_All('buku',$select);
		$this->load->view('admin/buku', $data);
	}

	public function ubah_produk()
	{
		$select = $this->db->select('*');
		$select = $this->db->where('id_buku', $_GET['id_buku']);
		$data['read']=$this->m->Get_All('buku',$select);
		$this->load->view('admin/ubah_buku',$data);
	}
	function action_tambah_produk()
	{
		$data=array(
			'id_buku'		=>	$this->input->post('id_buku'),
			'judul_buku'	=>	$this->input->post('judul_buku'),
			'isbn'			=>	$this->input->post('isbn'),
			'pengarang'		=>	$this->input->post('pengarang')
		);
		$this->m->Save($data, 'buku');
		
		redirect(base_url().'admin/buku');
	}
	public function action_ubah_produk()
	{
		$table = 'buku';
		$where=array(
			'id_buku'		=>	$this->input->post('id_buku')
		);		
		
		$data=array(
			'id_buku'		=>	$this->input->post('id_buku'),
			'judul_buku'	=>	$this->input->post('judul_buku'),
			'isbn'			=>	$this->input->post('isbn'),
			'pengarang'		=>	$this->input->post('pengarang')
		);
		
		
		$this->m->Update($where, $data, $table);
		redirect('admin/buku');
	}

	public function action_delete_produk()
	{
		$table = 'buku';
		$where=array(
			'id_buku'		=>	$_GET['id_buku']
		);
		$read = $this->m->Get_Where($where, $table);
		
		$this->m->Delete($where, $table);
		redirect(base_url().'admin/buku');
	}
	public function anggota()
	{
		$select = $this->db->select('*');
		$data['read']=$this->m->Get_All('anggota',$select);
		$this->load->view('admin/anggota', $data);
	}

	function action_tambah_anggota()
	{
		$data=array(
			'id_anggota'			=>	$this->input->post('id_anggota'),
			'nama'					=>	$this->input->post('nama'),
			'jenis_kelamin'			=> 	$this->input->post('jenis_kelamin'),
			'alamat'				=>	$this->input->post('alamat'),
		);
		if(!empty($_FILES['image']['name']))
		{
			$path = 'assets/img/';
			$upload = $this->_do_upload($path);
			$data['image'] = $upload;
		}else{
			$data['image'] = "default.png";
		}
		
		$this->m->Save($data, 'anggota');
		
		redirect('admin/anggota');
	}

	public function ubah_anggota()
	{
		$select = $this->db->select('*');
		$select = $this->db->where('id_anggota', $_GET['id_anggota']);
		$data['read']=$this->m->Get_All('anggota',$select);
		$this->load->view('admin/ubah_anggota',$data);
	}

	public function action_ubah_anggota()
	{
		$table = 'anggota';
		$where=array(
			'id_anggota'		=>	$this->input->post('id_anggota')
		);		
		
		$data=array(
			'id_anggota'			=>	$this->input->post('id_anggota'),
			'nama'					=>	$this->input->post('nama'),
			'jenis_kelamin'			=> 	$this->input->post('jenis_kelamin'),
			'alamat'				=>	$this->input->post('alamat'),
		);
		if(!empty($_FILES['image']['name']))
		{
			$path = 'assets/img/';
			$upload = $this->_do_upload($path);
			$data['image'] = $upload;
		}else{
			$data['image'] = "default.png";
		}
				
		$this->m->Update($where, $data, $table);
		redirect('admin/anggota');
	}

	public function action_delete_anggota()
	{
		$table = 'anggota';
		$where=array(
			'id_anggota'		=>	$_GET['id_anggota']
		);
		$read = $this->m->Get_Where($where, $table);
		
		$this->m->Delete($where, $table);
		redirect(base_url().'admin/anggota');
	}
	private function _do_upload($path){	
		$config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500000; //set max size allowed in Kilobyte
        $config['max_width']            = 500000; // set max width image allowed
        $config['max_height']           = 500000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('image')) //upload and validate
        {
            $data['inputerror'][] = 'image';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
	public function print(){
		$select = $this->db->select('*');
		$select = $this->db->where('id_anggota', $_GET['id_anggota']);
		$data['read'] = $this->m->Get_All('anggota','$select');
		$this->load->view('admin/cetak',$data);
	}
	public function cetak()
	{
		$select = $this->db->select('*');
		$data['read']=$this->m->Get_All('anggota',$select);
		$this->load->view('admin/anggota', $data);
	}
}