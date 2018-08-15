<?php

class MDL_Controller extends MY_Controller
{

    protected $main_link;
    protected $action_link;


    public function __construct()
    {
        parent::__construct();
        $this->main_link = base_url() . $this->cur_module . '/';
        $this->action_link = $this->main_link . $this->cur_class . '/';

    }

    public function view($view = null, $data = null)
    {
        # กำหนดค่า path ต่างๆ เข้าไปใน view
        $data['main_link'] = $this->main_link;
        $data['action_link'] = $this->action_link;
        $data['cur_class'] = $this->cur_class;
        $data['cur_method'] = $this->cur_method;

        $this->load->view('../modules/' . $this->cur_module . '/views/' . 'header', $data);
        $sub_view = explode(',', $view);
        foreach ($sub_view as $vv) {
            $this->load->view('../modules/' . $this->cur_module . '/views/' . $vv, $data);
        }

        $this->load->view('../modules/' . $this->cur_module . '/views/' . 'footer');
    }

}
