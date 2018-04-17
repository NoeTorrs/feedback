<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Controller extends CI_Controller{
	
	function __construct(){
        parent::__construct();
        $this->load->model('Main_Model');
    }

	public function index()
	{

		$this->load->view('index');
	}

	public function admin()
	{
		$data = array('reviews'=>$this->Main_Model->Reviews(),
						'comments'=>$this->Main_Model->Comments());
		$this->load->view('admin',$data);
	}

	public function login()
	{
			if ($this->input->post('login') == true )
			{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
					if ($username == 'admin' || $password == 'admin') {
						# code...
						redirect('Main_Controller/admin');
					}
			}
			else{
				$this->index();
			}

	}

	public function logout()
	{

		$logout = $this->input->post('logout');
		if (isset($_POST['logout'])) {
			# code...
			$this->index();
		}
	}

	public function Upload_Review()
	{
		if (isset($_POST['btngood'])){
			$data['status'] = 1;
		}
		else {
			$data['empID'] = $this->input->post('empID');
			$data['comments'] = $this->input->post('message-text');
			$data['status'] = 0;
		}
		$this->Main_Model->Upload($data);
		redirect('Main_Controller/');

	}

}