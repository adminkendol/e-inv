<?php  

class home extends CI_Controller {
 
    var $limit=10;
    var $offset=10;
    function __construct(){
        parent::__construct();
        $this->config->load('config', true);
        $this->title = $this->config->item('title');
        $this->load->model(array('base/basedata'));
        $this->menu=$this->basedata->getMenu();
    }
    function index($limit='',$offset=''){	
            /*$this->load->model("init"); 
            $this->init->getLasturl();
            $this->load->model("dashboard_model");
            if($this->session->userdata('LOGIN')=='TRUE'){
                $data['judul']='';
                $data['bulan']=$this->dashboard_model->bulan();
                $data['tahun']=$this->dashboard_model->tahun();
            	 
                $data['view']='dashboard';
                $this->load->view('index',$data); 
                    
            } else {
                    redirect('home/loginPage');		
            }*/
            $this->dashboard();
    }
    public function dashboard(){
        $data['title']=$this->title;
        $data['headtitle']="Dashboard";
        $data['menu']=$this->menu;
        $data['menu_id']="1";
        $this->tempe->load('modul','dashboard',$data);
    }
    public function supplier(){
        $data['title']=$this->title;
        $data['headtitle']="Supplier";
        $data['menu']=$this->menu;
        $data['menu_id']="5";
        $data['supplier']=$this->basedata->getSupplier();
        $this->tempe->load('modul','supplier/supplier',$data);
    }
    public function addsupplier(){
        $data['title']=$this->title;
        $data['headtitle']="Supplier";
        $data['menu']=$this->menu;
        $data['menu_id']="5";
        $this->tempe->load('modul','supplier/form',$data);
    }
    public function savesupplier(){
        $post=$this->input->post();
        print_r($post);
    }
        function dashPenjualan($bulan='',$tahun=''){
		$this->load->model("dashboard_model");
		$data['series1']=$this->dashboard_model->sales_this_month($bulan,$tahun);
		$this->load->view('dashboard/chart1',$data);
	}
	function dashPembelian($bulan='',$tahun=''){
		$this->load->model("dashboard_model");
		$data['series2']=$this->dashboard_model->buy_this_month($bulan,$tahun);
		$this->load->view('dashboard/chart2',$data);
	}
	function loginPage(){
		$this->load->view('login');
	}
	function loginAct(){
		$this->load->model("user_model");
		$this->user_model->cek();
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect('home/loginPage');		
	}
    public function error(){
        $data['title']=$this->title;
        $data['headtitle']="Error";
        $data['menu']=$this->menu;
        $data['menu_id']="1";
        $this->tempe->load('modul','error',$data);
    }
	 
	 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */