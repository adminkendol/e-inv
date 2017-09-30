<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Base_Controller extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        //do whatever you want to do when object instantiate
    }
}
 
class Main_Controller extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('nama')){
            redirect('login');
        }
        $this->config->load('config', true);
        $this->config->load('pagination', TRUE);
        $this->data['title']=$this->config->item('title');
        $this->settings = $this->config->item('pagination');
        $this->load->model(array('base/basedata'));
        $this->data['menu']=$this->basedata->getMenu();
        $last = $this->uri->total_segments();
        $this->record = $this->uri->segment($last);
        $this->input_by=$this->session->userdata('id');
        
        
        
        $this->data['dataBeli']= json_encode(array());
        $this->data['dataJual']=json_encode(array());
        $this->data['dataBrgJual']=json_encode(array());
        
    }
}
