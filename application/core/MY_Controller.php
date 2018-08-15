<?php

class MY_Controller extends CI_Controller
{

    protected $cur_module;
    protected $cur_class;
    protected $cur_method;
    public $val_lang = 'th';

    public function __construct()
    {
        parent::__construct();
        $this->cur_module = $this->router->module;
        $this->cur_class = $this->router->class;
        $this->cur_method = $this->router->method;
        $this->ci = &get_instance();

        $this->fnc_loadDefaultModle();
        // library
        $this->load->library('Tools');
        // helper
        $this->load->helper('custom');
    }

    private function fnc_fileExists($path)
    {
        $exists = false;
        $arr = glob($path."models/*.php");

        $arr = array_map(function ($ele)
        {
            $tmp = explode('/', $ele);
            return str_replace('.php', '', end($tmp));
        }, $arr);

        if(in_array($this->cur_class.'_model', $arr)) {
            $exists = true;
        }

        return $exists;
    }

    private function fnc_loadDefaultModle()
    {

        if($this->fnc_fileExists(APPPATH) || $this->fnc_fileExists(APPPATH.'modules/'.$this->cur_module.'/')) {
            $this->load->model($this->cur_class.'_model', 'model');
        }
    }

    protected function view($views = null, $param = null)
    {
        $param['path'] = "frontend";
        $param['cur_module'] = $this->cur_module;
        $param['cur_class'] = $this->cur_class;
        $param['cur_method'] = $this->cur_method;

        $this->load->view($param['path'].'/header', $param);
        if($views != null) {
            $view_arr = explode(',', $views);

            if(file_exists(APPPATH.'views/'.$param['path'].'/'.$view_arr[0].'.php')) {
                foreach($view_arr as $key => $view) {
                    if($view != '')
                        $this->load->view($param['path'].'/'.$view, $param);
                }
            } else {
                $this->load->view($param['path'].'/'.'404');
            }
        }
        $this->load->view($param['path'].'/'.'footer');
    }

}
