<?php  

class Core extends Main_Controller {
 
    function __construct(){
        parent::__construct();
	
    }
    function index(){	
        $this->dashboard();
    }
    /*--------------supplier-----------------------------*/
    public function supplier(){
        $this->data['headtitle']="Supplier";
        $this->data['menu_id']="5";
        $id="all";
        $this->data['supplier']=$this->basedata->getSupplier($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/supplier/supplier',$this->data);
    }
    public function addsupplier(){
        $this->data['headtitle']="Supplier";
        $this->data['menu_id']="5";
        $this->data['rec']=array();
        $this->tempe->load($this->theme.'/modul',$this->theme.'/supplier/form',$this->data);
    }
    public function savesupplier(){
        $post=$this->input->post();
        $this->data['headtitle']="Supplier";
        $this->data['menu_id']="5";
        $this->data['rec']=array();
        $this->form_validation->set_rules('id', 'ID Supplier', 'required');
        $this->form_validation->set_rules('name', 'Nama Supplier', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat Supplier', 'required');
        $this->form_validation->set_rules('phone', 'No telepon Supplier', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load($this->theme.'/modul',$this->theme.'/supplier/form',$this->data);
        }else{
            $this->basedata->setSupplier($post);
            redirect('core/supplier', 'refresh');
        }
    }
    public function editsupplier(){
        $rec=$this->basedata->getSupplier($this->record);
        $this->data['headtitle']="Supplier";
        $this->data['menu_id']="5";
        $this->data['rec']=$rec;
        $this->tempe->load($this->theme.'/modul',$this->theme.'/supplier/form',$this->data);
    }
    public function remsupplier(){
        $this->basedata->delSupplier($this->record);
        redirect('core/supplier', 'refresh');
    }
    /*--------------end supplier-----------------------------*/
    
    /*--------------kategori-----------------------------*/
    public function kategori(){
        $this->data['headtitle']="Kategori";
        $this->data['menu_id']="6";
        $this->data['parent']="9";
        $id="all";
        $this->data['kategori']=$this->basedata->getKategori($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/kategori/kategori',$this->data);
    }
    public function addkategori(){
        $this->data['headtitle']="Kategori";
        $this->data['menu_id']="6";
        $this->data['rec']=array();
        $this->tempe->load($this->theme.'/modul',$this->theme.'/kategori/form',$this->data);
    }
    public function savekategori(){
        $post=$this->input->post();
        $this->data['headtitle']="Kategori";
        $this->data['menu_id']="6";
        $this->data['rec']=array();
        $this->form_validation->set_rules('id', 'ID Kategori', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load($this->theme.'/modul',$this->theme.'/kategori/form',$this->data);
        }else{
            $this->basedata->setKategori($post);
            redirect('core/kategori', 'refresh');
        }
    }
    public function editkategori(){
        $rec=$this->basedata->getKategori($this->record);
        $this->data['headtitle']="Kategori";
        $this->data['menu_id']="6";
        $this->data['rec']=$rec;
        $this->tempe->load($this->theme.'/modul',$this->theme.'/kategori/form',$this->data);
    }
    public function remkategori(){
        $this->basedata->delKategori($this->record);
        redirect('core/kategori', 'refresh');
    }
    /*--------------end kategori-----------------------------*/
    
    /*--------------satuan-----------------------------*/
    public function satuan(){
        $this->data['headtitle']="Satuan";
        $this->data['menu_id']="7";
        $id="all";
        $this->data['satuan']=$this->basedata->getSatuan($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/satuan/satuan',$this->data);
    }
    public function addsatuan(){
        $this->data['headtitle']="Satuan";
        $this->data['menu_id']="7";
        $this->data['rec']=array();
        $this->tempe->load($this->theme.'/modul',$this->theme.'/satuan/form',$this->data);
    }
    public function savesatuan(){
        $post=$this->input->post();
        $this->data['headtitle']="Satuan";
        $this->data['menu_id']="7";
        $this->data['rec']=array();
        $this->form_validation->set_rules('id', 'ID Satuan', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load($this->theme.'/modul',$this->theme.'/satuan/form',$this->data);
        }else{
            $this->basedata->setSatuan($post);
            redirect('core/satuan', 'refresh');
        }
    }
    public function editsatuan(){
        $rec=$this->basedata->getSatuan($this->record);
        $this->data['headtitle']="Satuan";
        $this->data['menu_id']="7";
        $this->data['rec']=$rec;
        $this->tempe->load($this->theme.'/modul',$this->theme.'/satuan/form',$this->data);
    }
    public function remsatuan(){
        $this->basedata->delSatuan($this->record);
        redirect('core/satuan', 'refresh');
    }
    /*--------------end satuan-----------------------------*/
    
    /*--------------tax-----------------------------*/
    public function tax(){
        $this->data['headtitle']="Tax";
        $this->data['menu_id']="8";
        $id="all";
        $this->data['rec']=$this->basedata->getTax($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/tax/form',$this->data);
    }
    public function savetax(){
        $post=$this->input->post();
        $this->data['headtitle']="Pajak";
        $this->data['menu_id']="8";
        $id="all";
        $this->data['rec']=$this->basedata->getTax($id);
        $this->form_validation->set_rules('tax', 'Pajak', 'required');
        if ($this->form_validation->run() == FALSE){
            $this->tempe->load($this->theme.'/modul',$this->theme.'/tax/form',$this->data);
        }else{
            $this->basedata->setTax($post);
            redirect('core/tax', 'refresh');
        }
    }
    /*--------------end tax-----------------------------*/
    
    /*--------------barang-----------------------------*/
    public function barang(){
        $this->data['headtitle']="Barang";
        $this->data['menu_id']="4";
        $id="all";
        $this->settings['base_url'] = site_url('core/barang');
        $this->settings['total_rows'] = $this->basedata->count_barang();
        $choice = $this->settings["total_rows"] / $this->settings["per_page"];
        $this->settings["num_links"] = floor($choice);
        $this->pagination->initialize($this->settings);
        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['barang']=$this->basedata->getBarang($id,$this->settings["per_page"], $this->data['page']);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/barang/barang',$this->data);
    }
    public function apibrg(){
        $name=$this->input->get('query');
        $rec=$this->basedata->getApiBarang($name);
        echo json_encode($rec);
    }
    public function apiSelBrg(){
        $id=$this->input->post('id');
        $selBrg=$this->basedata->generateListObat($id);
        echo $selBrg;
    }
    public function addbarang(){
        $this->data['headtitle']="Barang";
        $this->data['menu_id']="4";
        $this->data['rec']=array();
        $id="all";
        $this->data['kategori']=$this->basedata->getKategori($id);
        $this->data['satuan']=$this->basedata->getSatuan($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/barang/form',$this->data);
    }
    public function savebarang(){
        $post=$this->input->post();
        $this->data['headtitle']="Barang";
        $this->data['menu_id']="4";
        $this->data['rec']=array();
        $id="all";
        $this->data['kategori']=$this->basedata->getKategori($id);
        $this->data['satuan']=$this->basedata->getSatuan($id);
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
            $this->tempe->load($this->theme.'/modul',$this->theme.'/barang/form',$this->data);
        }else{
            $this->basedata->setBarang($post);
            redirect('core/barang', 'refresh');
        }
    }
    public function editbarang(){
        $batas="";
        $offset="";
        $rec=$this->basedata->getBarang($this->record,$batas,$offset);
        $this->data['headtitle']="Barang";
        $this->data['menu_id']="4";
        $this->data['rec']=$rec;
        $id="all";
        $this->data['kategori']=$this->basedata->getKategori($id);
        $this->data['satuan']=$this->basedata->getSatuan($id);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/barang/form',$this->data);
    }
    public function rembarang(){
        $this->basedata->delBarang($this->record);
        redirect('core/barang', 'refresh');
    }
    /*--------------end barang-----------------------------*/
    
    /*--------------pembelian-----------------------------*/
    public function beli(){
        $this->data['headtitle']="Pembelian";
        $this->data['menu_id']="2";
        $id="all";
        //pagination settings
        $this->settings['base_url'] = site_url('core/beli');
        $this->settings['total_rows'] = $this->basedata->count_beli();
        $choice = $this->settings["total_rows"] / $this->settings["per_page"];
        $this->settings["num_links"] = floor($choice);
        $this->pagination->initialize($this->settings);
        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['beli']=$this->basedata->getBeli($id,$this->settings["per_page"], $this->data['page']);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/beli/beli',$this->data);
    }
    public function addbeli(){
        $this->data['headtitle']="Pembelian";
        $this->data['menu_id']="2";
        $this->data['rec']=array();
        $id="all";
        $this->data['valid']="0";
        $this->data['valdata']="";
        $this->data['supplier']=$this->basedata->getSupplier($id);
        //$this->data['kategori']=$this->basedata->getKategori($id);
        //$this->data['satuan']=$this->basedata->getSatuan($id);
        $this->data['autofaktur']=$this->basedata->autoFakturN("1");
        $this->tempe->load($this->theme.'/modul',$this->theme.'/beli/form',$this->data);
    }
    function actbeli(){
        $array=$this->input->post('lstobat');
        if($this->input->post('idRec')==""){
            if(sizeof($array)>0){
                if(count(array_unique($array))<count($array)){
                    echo"Nama Barang Tidak Boleh Sama";
                    return false;
                }else{
                    $this->basedata->actionbeli($this->input_by);
                }
            }else{
                echo"Nama Barang Tidak Boleh Kosong";
                return false;
            }    
        }else{
            $this->basedata->actionbeli($this->input_by);
        }
    }
    public function editbeli(){
        $this->data['headtitle']="Pembelian";
        $this->data['menu_id']="2";
        $this->data['rec']=$this->basedata->getBeli($this->record,"","");
        $this->data['recOrder']=$this->basedata->getOrder($this->record);
        $this->data['valid']="0";
        $this->data['valdata']="";
        $id="all";
        $this->data['supplier']=$this->basedata->getSupplier($id);
        $this->data['autofaktur']=$this->data['rec'][0]->faktur;
        $this->tempe->load($this->theme.'/modul',$this->theme.'/beli/form',$this->data);
    }
    public function printfo(){
        $this->data['headtitle']="Print Pembelian";
        $this->data['menu_id']="2";
        $this->data['rec']=$this->basedata->getBeli($this->record,"","");
        $this->data['recOrder']=$this->basedata->getOrder($this->record);
        $this->data['autofaktur']=$this->data['rec'][0]->faktur;
        $this->tempe->load($this->theme.'/modul',$this->theme.'/beli/print',$this->data);
    }
    function nextForm(){
        $jumbeli=$this->input->post('jumbeli');
	$table='';
	$table.=$this->generateForm();
	echo $table;
    }
    /*--------------end pembelian-----------------------------*/
    
    /*--------------penjualan-----------------------------*/
    public function jual(){
        $this->data['headtitle']="Penjualan";
        $this->data['menu_id']="3";
        $id="all";
        $this->settings['base_url'] = site_url('core/jual');
        $this->settings['total_rows'] = $this->basedata->count_jual();
        $choice = $this->settings["total_rows"] / $this->settings["per_page"];
        $this->settings["num_links"] = floor($choice);
        $this->pagination->initialize($this->settings);
        $this->data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['jual']=$this->basedata->getjual($id,$this->settings["per_page"], $this->data['page']);
        $this->tempe->load($this->theme.'/modul',$this->theme.'/jual/jual',$this->data);
    }
    public function addjual(){
        $this->data['headtitle']="Penjualan";
        $this->data['menu_id']="3";
        $this->data['rec']=array();
        $id="all";
        $this->data['valid']="0";
        $this->data['valdata']="";
        //$this->data['customer']=$this->basedata->getCustomer($id);
        $this->data['autofaktur']=$this->basedata->autoFakturN("2");
        $this->tempe->load($this->theme.'/modul',$this->theme.'/jual/form',$this->data);
    }
    function actjual(){
        $array=$this->input->post('lstobat');
        if($this->input->post('idRec')==""){
            if(sizeof($array)>0){
                if(count(array_unique($array))<count($array)){
                    echo"Nama Barang Tidak Boleh Sama";
                    return false;
                }else{
                    $this->basedata->actionjual($this->input_by);
                }
            }else{
                echo"Nama Barang Tidak Boleh Kosong";
                return false;
            }    
        }else{
            $this->basedata->actionjual($this->input_by);
        }
    }
    public function editjual(){
        $this->data['headtitle']="Penjualan";
        $this->data['menu_id']="3";
        $this->data['rec']=$this->basedata->getJual($this->record,"","");
        $this->data['recOrder']=$this->basedata->getOrder($this->record);
        $this->data['valid']="0";
        $this->data['valdata']="";
        $id="all";
        $this->data['autofaktur']=$this->data['rec'][0]->faktur;
        $this->tempe->load($this->theme.'/modul',$this->theme.'/jual/form',$this->data);
    }
    public function printfoj(){
        $this->data['headtitle']="Print Penjualan";
        $this->data['menu_id']="3";
        $this->data['rec']=$this->basedata->getjual($this->record,"","");
        $this->data['recOrder']=$this->basedata->getOrder($this->record);
        $this->data['autofaktur']=$this->data['rec'][0]->faktur;
        $this->tempe->load($this->theme.'/modul',$this->theme.'/jual/print',$this->data);
    }
    /*--------------end penjualan-----------------------------*/
    
    
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
        
        $this->data['headtitle']="Dashboard";
        
        $this->data['menu_id']="1";
        $beli=$this->basedata->getDashBeliM();
        $jual=$this->basedata->getDashJualM();
        $brgJual=$this->basedata->getDashBrgJualM();
        if(sizeof($beli)>0){
            foreach($beli as $b){
                $labels[]=date('j M',strtotime($b->tanggal));
                $series[]=intval($b->jumlah);
            }
        }else{
            $labels=array();
            $series=array(0);
        }
        if(sizeof($jual)>0){
            foreach($jual as $j){
                $labelsA[]=date('j M',strtotime($j->tanggal));
                $seriesA[]=intval($j->total);
            }
        }else{
            $labelsA=array();
            $seriesA=array(0);
        }
        if(sizeof($brgJual)>0){
            foreach($brgJual as $bj){
                $labelsB[]=$bj->nama;
                $seriesB[]=$bj->total;
                $this->dataPie[]=array($bj->nama,intval($bj->total));
            }
        }else{
            $labelsB=array();
            $seriesB=array(0);
            $this->dataPie=array();
        }
        $this->data['dataBeli']=json_encode(array("labels"=>$labels,"series"=>array($series)));
        $this->data['dataMaxBeli']=max($series);
        $this->data['dataJual']=json_encode(array("labels"=>$labelsA,"series"=>array($seriesA)));
        $this->data['dataDashLine']=json_encode(array("labelsBeli"=>$labels,"seriesBeli"=>$series,"labelsJual"=>$labelsA,"seriesJual"=>$seriesA));
        $this->data['dataMaxJual']="RP".number_format(max($seriesA),2,',','.');
        $this->data['dataBrgJual']=json_encode($this->dataPie);
        $this->data['dataMaxBrgJual']="RP".number_format(max($seriesB),2,',','.');
        $this->tempe->load($this->theme.'/modul',$this->theme.'/dashboard',$this->data);
    }
    
    /*---------------------end dashboard--------------------------------*/
    
    public function error(){
        $this->data['headtitle']="Error";
        $this->data['menu_id']="1";
        $this->tempe->load($this->theme.'/modul',$this->theme.'/error',$this->data);
    }
	 
	 
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */