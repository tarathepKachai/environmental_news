<?php

use GuzzleHttp\Client;
require 'vendor/autoload.php';

class Login extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function Formlogin()
	{
        $data = array();
		parent::view('login/formlogin',$data);
	}
	public function CheckLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		

		$client = new \GuzzleHttp\Client();
		$url = 'http://172.17.8.144/tools/tools_restserver/user/auth';

		$form_data = array(
			'form_params' => array(
				"username" => $username,
				"password" => $password
			)
		);

		$response = $client->request('POST',$url,$form_data);
		$body = $response->getBody();
		$data = json_decode($body,true);

		// Create Session
		if($data['status'] == true ){
			//_print_r('true 555');
			$this->session->set_userdata('session_user', $data['data'][0]['emp_user_name']);
			$this->session->set_userdata('session_title', $data['data'][0]['emp_title']);
			$this->session->set_userdata('session_firstname', $data['data'][0]['emp_firstname']);
			$this->session->set_userdata('session_lastname', $data['data'][0]['emp_lastname']);
			$this->session->set_userdata('session_dept_name_thai', $data['data'][0]['dept_name_thai']);
			// redirect("index");
			//parent::view('manage/main_set');
		}
		// Response ajax
		echo json_encode($data);
		
		//_print_r($data);
		

	}

	public function Logout()
    {
        $this->session->sess_destroy();
        redirect("Index");
    }



}
