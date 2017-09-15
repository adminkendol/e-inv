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
        $last = $this->uri->total_segments();
        $this->record = $this->uri->segment($last);
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
    /*--------------supplier-----------------------------*/
    public function supplier(){
        $data['title']=$this->title;
        $data['headtitle']="Supplier";
        $data['menu']=$this->menu;
        $data['menu_id']="5";
        $id="all";
        $data['supplier']=$this->basedata->getSupplier($id);
        $this->tempe->load('modul','supplier/supplier',$data);
    }
    public function addsupplier(){
        $data['title']=$this->title;
        $data['headtitle']="Supplier";
        $data['menu']=$this->menu;
        $data['menu_id']="5";
        $data['rec']=array();
        $this->tempe->load('modul','supplier/form',$data);
    }
    public function savesupplier(){
        $post=$this->input->post();
        //print_r($post);
        $data['title']=$this->title;
        $data['headtitle']="Supplier";
        $data['menu']=$this->menu;
        $data['menu_id']="5";
        $data['rec']=array();
        $this->form_validation->set_rules('id', 'ID Supplier', 'required');
        $this->form_validation->set_rules('name', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Supplier', 'required');
        $this->form_validation->set_rules('phone', 'No telepon Supplier', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load('modul','supplier/form',$data);
        }else{
            $this->basedata->setSupplier($post);
            redirect('home/supplier', 'refresh');
        }
    }
    public function editsupplier(){
        $rec=$this->basedata->getSupplier($this->record);
        $data['title']=$this->title;
        $data['headtitle']="Supplier";
        $data['menu']=$this->menu;
        $data['menu_id']="5";
        $data['rec']=$rec;
        $this->tempe->load('modul','supplier/form',$data);
    }
    public function remsupplier(){
        $this->basedata->delSupplier($this->record);
        redirect('home/supplier', 'refresh');
    }
    /*--------------end supplier-----------------------------*/
    
    /*--------------kategori-----------------------------*/
    public function kategori(){
        $data['title']=$this->title;
        $data['headtitle']="Kategori";
        $data['menu']=$this->menu;
        $data['menu_id']="6";
        $id="all";
        $data['kategori']=$this->basedata->getKategori($id);
        $this->tempe->load('modul','kategori/kategori',$data);
    }
    public function addkategori(){
        $data['title']=$this->title;
        $data['headtitle']="Kategori";
        $data['menu']=$this->menu;
        $data['menu_id']="6";
        $data['rec']=array();
        $this->tempe->load('modul','kategori/form',$data);
    }
    public function savekategori(){
        $post=$this->input->post();
        $data['title']=$this->title;
        $data['headtitle']="Kategori";
        $data['menu']=$this->menu;
        $data['menu_id']="6";
        $data['rec']=array();
        $this->form_validation->set_rules('id', 'ID Kategori', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load('modul','kategori/form',$data);
        }else{
            $this->basedata->setKategori($post);
            redirect('home/kategori', 'refresh');
        }
    }
    public function editkategori(){
        $rec=$this->basedata->getKategori($this->record);
        $data['title']=$this->title;
        $data['headtitle']="Kategori";
        $data['menu']=$this->menu;
        $data['menu_id']="6";
        $data['rec']=$rec;
        $this->tempe->load('modul','kategori/form',$data);
    }
    public function remkategori(){
        $this->basedata->delKategori($this->record);
        redirect('home/kategori', 'refresh');
    }
    /*--------------end kategori-----------------------------*/
    
    /*--------------satuan-----------------------------*/
    public function satuan(){
        $data['title']=$this->title;
        $data['headtitle']="Satuan";
        $data['menu']=$this->menu;
        $data['menu_id']="7";
        $id="all";
        $data['satuan']=$this->basedata->getSatuan($id);
        $this->tempe->load('modul','satuan/satuan',$data);
    }
    public function addsatuan(){
        $data['title']=$this->title;
        $data['headtitle']="Satuan";
        $data['menu']=$this->menu;
        $data['menu_id']="7";
        $data['rec']=array();
        $this->tempe->load('modul','satuan/form',$data);
    }
    public function savesatuan(){
        $post=$this->input->post();
        $data['title']=$this->title;
        $data['headtitle']="Satuan";
        $data['menu']=$this->menu;
        $data['menu_id']="7";
        $data['rec']=array();
        $this->form_validation->set_rules('id', 'ID Satuan', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load('modul','satuan/form',$data);
        }else{
            $this->basedata->setSatuan($post);
            redirect('home/satuan', 'refresh');
        }
    }
    public function editsatuan(){
        $rec=$this->basedata->getSatuan($this->record);
        $data['title']=$this->title;
        $data['headtitle']="Satuan";
        $data['menu']=$this->menu;
        $data['menu_id']="7";
        $data['rec']=$rec;
        $this->tempe->load('modul','satuan/form',$data);
    }
    public function remsatuan(){
        $this->basedata->delSatuan($this->record);
        redirect('home/satuan', 'refresh');
    }
    /*--------------end satuan-----------------------------*/
    
    /*--------------tax-----------------------------*/
    public function tax(){
        $data['title']=$this->title;
        $data['headtitle']="Tax";
        $data['menu']=$this->menu;
        $data['menu_id']="8";
        $id="all";
        $data['rec']=$this->basedata->getTax($id);
        $this->tempe->load('modul','tax/form',$data);
    }
    public function savetax(){
        $post=$this->input->post();
        $data['title']=$this->title;
        $data['headtitle']="Pajak";
        $data['menu']=$this->menu;
        $data['menu_id']="8";
        $id="all";
        $data['rec']=$this->basedata->getTax($id);
        $this->form_validation->set_rules('tax', 'Pajak', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load('modul','tax/form',$data);
        }else{
            $this->basedata->setTax($post);
            redirect('home/tax', 'refresh');
        }
    }
    /*--------------end tax-----------------------------*/
    
    /*--------------barang-----------------------------*/
    public function barang(){
        $data['title']=$this->title;
        $data['headtitle']="Barang";
        $data['menu']=$this->menu;
        $data['menu_id']="4";
        $id="all";
        $data['satuan']=$this->basedata->getBarang($id);
        $this->tempe->load('modul','barang/barang',$data);
    }
    /*--------------end barang-----------------------------*/
    
    
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