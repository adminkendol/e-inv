<?php  

class Core extends CI_Controller {
 
    var $limit=10;
    var $offset=10;
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
                    redirect('core/loginPage');		
            }*/
            $this->dashboard();
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
            redirect('core/supplier', 'refresh');
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
        redirect('core/supplier', 'refresh');
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
            redirect('core/kategori', 'refresh');
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
        redirect('core/kategori', 'refresh');
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
            redirect('core/satuan', 'refresh');
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
        redirect('core/satuan', 'refresh');
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
            redirect('core/tax', 'refresh');
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
        $this->settings['base_url'] = site_url('core/barang');
        $this->settings['total_rows'] = $this->basedata->count_barang();
        $choice = $this->settings["total_rows"] / $this->settings["per_page"];
        $this->settings["num_links"] = floor($choice);
        $this->pagination->initialize($this->settings);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['pagination'] = $this->pagination->create_links();
        $data['barang']=$this->basedata->getBarang($id,$this->settings["per_page"], $data['page']);
        $this->tempe->load('modul','barang/barang',$data);
    }
    public function apibrg(){
        $name=$this->input->get('query');
        $rec=$this->basedata->getApiBarang($name);
        echo json_encode($rec);
    }
    public function addbarang(){
        $data['title']=$this->title;
        $data['headtitle']="Barang";
        $data['menu']=$this->menu;
        $data['menu_id']="4";
        $data['rec']=array();
        $id="all";
        $data['kategori']=$this->basedata->getKategori($id);
        $data['satuan']=$this->basedata->getSatuan($id);
        $this->tempe->load('modul','barang/form',$data);
    }
    public function savebarang(){
        $post=$this->input->post();
        $data['title']=$this->title;
        $data['headtitle']="Barang";
        $data['menu']=$this->menu;
        $data['menu_id']="4";
        $data['rec']=array();
        $id="all";
        $data['kategori']=$this->basedata->getKategori($id);
        $data['satuan']=$this->basedata->getSatuan($id);
        $this->form_validation->set_rules('id', 'ID Barang', 'required');
        $this->form_validation->set_rules('name', 'Barang', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('stok', 'Stok', 'required');
        $this->form_validation->set_rules('exp', 'Kadaluarsa', 'required');
        $this->form_validation->set_rules('buy', 'Harga Jual', 'required');
        $this->form_validation->set_rules('sell', 'Harga Beli', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load('modul','barang/form',$data);
        }else{
            $this->basedata->setBarang($post);
            redirect('core/barang', 'refresh');
        }
    }
    public function editbarang(){
        $batas="";
        $offset="";
        $rec=$this->basedata->getBarang($this->record,$batas,$offset);
        $data['title']=$this->title;
        $data['headtitle']="Barang";
        $data['menu']=$this->menu;
        $data['menu_id']="4";
        $data['rec']=$rec;
        $id="all";
        $data['kategori']=$this->basedata->getKategori($id);
        $data['satuan']=$this->basedata->getSatuan($id);
        $this->tempe->load('modul','barang/form',$data);
    }
    public function rembarang(){
        $this->basedata->delBarang($this->record);
        redirect('core/barang', 'refresh');
    }
    /*--------------end barang-----------------------------*/
    
    /*--------------pembelian-----------------------------*/
    public function beli(){
        $data['title']=$this->title;
        $data['headtitle']="Pembelian";
        $data['menu']=$this->menu;
        $data['menu_id']="2";
        $id="all";
        //pagination settings
        $this->settings['base_url'] = site_url('core/beli');
        $this->settings['total_rows'] = $this->basedata->count_beli();
        $choice = $this->settings["total_rows"] / $this->settings["per_page"];
        $this->settings["num_links"] = floor($choice);
        $this->pagination->initialize($this->settings);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['pagination'] = $this->pagination->create_links();
        $data['beli']=$this->basedata->getBeli($id,$this->settings["per_page"], $data['page']);
        $this->tempe->load('modul','beli/beli',$data);
    }
    /*public function addbeli(){
        $data['title']=$this->title;
        $data['headtitle']="Pembelian";
        $data['menu']=$this->menu;
        $data['menu_id']="2";
        $data['rec']=array();
        $id="all";
        $data['supplier']=$this->basedata->getSupplier($id);
        $data['kategori']=$this->basedata->getKategori($id);
        $data['satuan']=$this->basedata->getSatuan($id);
        $this->tempe->load('modul','beli/form',$data);
    }*/
    function addbeli(){
        $data['title']=$this->title;
        $data['headtitle']="Pembelian";
        $data['menu']=$this->menu;
        $data['menu_id']="2";
        $data['rec']=array();
        $id="all";
        
        $data['judul']='Pembelian';
	$data['view']='beli/form_beli';
	$data['table']=$this->generateFaktur();
	//$this->load->view('index',$data);
        $this->tempe->load('modul','beli/form_beli',$data);
    }
    function actbeli(){
        $array=$this->input->post('lstobat');
	if(count(array_unique($array))<count($array)){
            echo"Nama Barang Tidak Boleh Sama";
            return false;
	}else{
            $this->basedata->actionbeli();
	}
    }
    function nextForm(){
        $jumbeli=$this->input->post('jumbeli');
	$table='';
	$table.=$this->generateForm();
	echo $table;
    }
    /*--------------end pembelian-----------------------------*/
    function generateFaktur(){
        $table='';
	$table.='<table>';
	$table.='<tr>';
	//$table.='<tr><input type="text" id="jumbeli" name="jumbeli"  class="input-xlarge"   href="#"  placeholder="Jumlah Item Pembelian">  &nbsp; &nbsp;</td>';
        $table.='<tr><td><input type="text" class="form-control" id="jumbeli" name="jumbeli" value=""></td>';
	$table.='</tr>';
	$table.='</table>';
        return $table; 
    }
    function generateForm(){
        $table='';
	$faktur=$this->basedata->autoFaktur();
	$listObat=$this->generateListBeli();
	$customer=$this->basedata->generateComboSupplier();
	$sesbeli='<input type="hidden" id="sesbeli" name="sesbeli" value="'.date("YmdHms").'">';
	$table.=$sesbeli;
	$table.='<table border="0" style="width:100%">
                    <tbody>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>
                                <input type="hidden"  id="tanggal"  name="tanggal" readonly="" size="10" value="'.date("Y-m-d").'">
				<a href="#" type="button" class="btn btn-warning">'.date("d-F-Y").'</a>
                            </td>
			</tr>
			<tr>
                            <td>Supplier</td>
                            <td>:</td>
                            <td>'.$customer.'</td>
			</tr>
			<tr>
                            <td>No Faktur</td>
                            <td>:</td>
                            <td><input type="text" class="span6" id="faktur" name="faktur" placeholder="Faktur" value="'.$faktur.'" style="width:400px"></td>
			</tr>
			<tr>
                            <td colspan="3"><br><hr><br></td>
			</tr>
                    </tbody>
                </table>
		<table style="width:100%">
                    <tr>
			<td>'.$listObat.'</td>
                    </tr>
                    <tr>
                        <td>
                            <a onclick="return confirmdlg()" type="button" class="btn btn-primary">Simpan</a>
                            <a href="'.base_url().'jual"  type="button" class="btn btn-danger">Kembali</a>
			</td>
                    </tr>
		</table>';
				 
        return $table; 
    }
    function generateListBeli(){
        return $this->basedata->generateListBeli();
    }
    function refreshDetail(){
	$this->basedata->refreshDetail();
    }
    
    /*---------------------dashboard--------------------------------*/
    public function dashboard(){
        $data['title']=$this->title;
        $data['headtitle']="Dashboard";
        $data['menu']=$this->menu;
        $data['menu_id']="1";
        $beli=$this->basedata->getDashBeliM();
        foreach($beli as $b){
            $labels[]=date('j M',strtotime($b->tanggal));
            $series[]=$b->jumlah;
        }
        $data['dataBeli']=json_encode(array("labels"=>$labels,"series"=>array($series)));
        //echo json_encode($dataBeli);die;
        $this->tempe->load('modul','dashboard',$data);
    }
    
    /*---------------------end dashboard--------------------------------*/
    
    
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