<?php

use GuzzleHttp\Client;
require 'vendor/autoload.php';

class PickupSpare extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function Pickup()
	{
		$data = array();
		$client = new \GuzzleHttp\Client();
		// paytran_list
		$url1 = 'http://172.17.8.144/tools/tools_restserver/parts/paytran_list';
		$response1 = $client->request('GET',$url1);
		$body1 = $response1->getBody();
		// rcvtran_list
		$url2 = 'http://172.17.8.144/tools/tools_restserver/parts/rcvtran_list';
		$response2 = $client->request('GET',$url2);
		$body2 = $response2->getBody();


		$data['paytran_list'] = json_decode($body1,true);
		$data['rcvtran_list'] = json_decode($body2,true);
		//_print_r($data);
		parent::view('pickup_spare/pickup',$data);
	}

	public function PickupDetailPaytran()
	{
		//header('Content-Type: application/json');
		//$data = $this->model->GetNameajax($value);
		$billno = $this->input->post('name');
		$client = new \GuzzleHttp\Client();
		$url = 'http://172.17.8.144/tools/tools_restserver/parts/paydetail_by_id';

		$form_data = array(
			'form_params' => array(
				"BILLNO" => $billno
				
			)
		);

		$response = $client->request('POST',$url,$form_data);
		$body = $response->getBody();
		$data = json_decode($body,true);

        echo json_encode($data);
	}

	public function PickupDetailRcvtran()
	{
		//header('Content-Type: application/json');
		//$data = $this->model->GetNameajax($value);
		$billno = $this->input->post('name');
		$client = new \GuzzleHttp\Client();
		$url = 'http://172.17.8.144/tools/tools_restserver/parts/rcvdetail_by_id';

		$form_data = array(
			'form_params' => array(
				"BILLNO" => $billno
				
			)
		);

		$response = $client->request('POST',$url,$form_data);
		$body = $response->getBody();
		$data = json_decode($body,true);

        echo json_encode($data);
	}

	
	

}
