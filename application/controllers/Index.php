<?php
class Index extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
        $data = array();
		parent::view('index',$data);
	}


}
