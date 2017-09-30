<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Login extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->config->load('config', true);
        $this->config->load('pagination', TRUE);
        $this->title = $this->config->item('title');
        // access pagination settings
        $this->settings = $this->config->item('pagination');
        $this->load->model(array('base/basedata'));
        $this->menu=$this->basedata->getMenu();
        $last = $this->uri->total_segments();
        $this->record = $this->uri->segment($last);
    }
    public function index(){
        $data['title']=$this->title;
        $data['headtitle']="Login";
        $data['menu']=$this->menu;
        $data['menu_id']="0";
        $data['valid']="0";
        $this->tempe->load('modul','login',$data);
    }
    public function enter(){
        $data['title']=$this->title;
        $data['headtitle']="Login";
        $data['menu']=$this->menu;
        $data['menu_id']="0";
        $data['valid']="0";
        $post=$this->input->post();
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load('modul','login',$data);
        }else{
            $result=$this->basedata->cekLogin($post);
            if(sizeof($result)>0){
                $data['valid']="0";
                $arraydata = array(
                    'id'  => $result[0]->id,
                    'nama'  => $result[0]->nama,
                    'role'  => $result[0]->role
                );
                $this->session->set_userdata($arraydata);
                redirect('core/dashboard', 'refresh');
            }else{
                $data['valid']="1";
                $this->tempe->load('modul','login',$data);
            }
        }
    }
    public function ceklogin(){
        if(!$this->session->userdata('nama')){
            redirect('login');
        }
    }
    public function destroy(){
        $this->session->sess_destroy();
        redirect('login');
    }
    
}
