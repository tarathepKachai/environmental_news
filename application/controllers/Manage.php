<?php

class Manage extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION['session_user'])) {
            redirect("Login/Formlogin");
        }
    }

    public function PageManage() {
        $data = array();

        $data['list_act'] = $this->model->ListAct();
        //_print_r($data);

        parent::view('manage/main_set', $data);
    }

    public function Get_slide() {
        header('Content-Type: application/json');
        $this->load->model("Manage_model");

        $result = $this->Manage_model->Get_slide();
        echo json_encode($result);
    }

    public function Upload_slide() {

        $txt = $this->input->post("text");
        $datetime = date("Y-m-d H:i:s");
        
        $config['upload_path'] = './assetfrontend/slide/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
//        $config['max_width'] = 1024;
//        $config['max_height'] = 768;
        $date = new DateTime();
        $new_name = $date->getTimestamp();
        $config['file_name'] = $new_name;
        //$this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        echo $_FILES['slide_file']['name'];
        if (!$this->upload->do_upload('slide_file')) {
            $error = array('error' => $this->upload->display_errors());
            //print_r($error);
            //$this->load->view('upload_form', $error);
            // $this->PageManage();
            $data = array();

            $data['list_act'] = $this->model->ListAct();
            $data['upload'] = false;
            parent::view('manage/main_set', $data);
        } else {
            $data_upload = array('upload_data' => $this->upload->data());
            //print_r($data);

            
            $upload_insert = array(
                ""
            );
            
            $data = array();
            $data['list_act'] = $this->model->ListAct();
            $data['upload'] = true;
            parent::view('manage/main_set', $data);
        }
        
       
    }

}
