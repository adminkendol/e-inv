<?php 

/* 
 * Author: chandra.
 * date created : 2016-08-17
 * class API models.
 */

class Basedata extends CI_Model {
    function __construct(){
	parent::__construct();
    }
    public function getMenu(){
        $query=$this->db->query("SELECT * FROM menu ORDER BY sort ASC");
        return $query->result();
    }
    /*---------------------supplier---------------*/
    public function getSupplier($id){
        if($id!="all"){
            $where="WHERE id='$id'";
        }else{
            $where="";
        }
        $query=$this->db->query("SELECT * FROM supplier $where ORDER BY id DESC");
        return $query->result();
    }
    public function setSupplier($post){
        $cek=$this->getSupplier($post['idRec']);
        $data = array(
            'id_supplier'=>$post['id'],
            'nama'=>$post['name'],
            'alamat'=>$post['alamat'],
            'telepon'=>$post['phone']
        );
        if(sizeof($cek)==0){
            $this->db->insert('supplier',$data);
        }else{
            $this->db->where('id', $post['idRec']);
            $this->db->update('supplier', $data);
        }
    }
    public function delSupplier($id){
        $this->db->query("DELETE FROM supplier WHERE id='$id'");
    }
    /*---------------------end supplier---------------*/
    
    /*---------------------kategori---------------*/
    public function getKategori($id){
        if($id!="all"){
            $where="WHERE id='$id'";
        }else{
            $where="";
        }
        $query=$this->db->query("SELECT * FROM kategori $where ORDER BY id DESC");
        return $query->result();
    }
    public function setKategori($post){
        $cek=$this->getKategori($post['idRec']);
        $data = array(
            'id_kategori'=>$post['id'],
            'kategori'=>$post['kategori']
        );
        if(sizeof($cek)==0){
            $this->db->insert('kategori',$data);
        }else{
            $this->db->where('id', $post['idRec']);
            $this->db->update('kategori', $data);
        }
    }
    public function delKategori($id){
        $this->db->query("DELETE FROM kategori WHERE id='$id'");
    }
    /*---------------------end kategori---------------*/
    
    /*---------------------satuan---------------*/
    public function getSatuan($id){
        if($id!="all"){
            $where="WHERE id='$id'";
        }else{
            $where="";
        }
        $query=$this->db->query("SELECT * FROM satuan $where ORDER BY id DESC");
        return $query->result();
    }
    public function setSatuan($post){
        $cek=$this->getSatuan($post['idRec']);
        $data = array(
            'id_satuan'=>$post['id'],
            'satuan'=>$post['satuan']
        );
        if(sizeof($cek)==0){
            $this->db->insert('satuan',$data);
        }else{
            $this->db->where('id', $post['idRec']);
            $this->db->update('satuan', $data);
        }
    }
    public function delSatuan($id){
        $this->db->query("DELETE FROM satuan WHERE id='$id'");
    }
    /*---------------------end satuan---------------*/
    
    /*---------------------tax---------------*/
    public function getTax($id){
        if($id!="all"){
            $where="WHERE id='$id'";
        }else{
            $where="";
        }
        $query=$this->db->query("SELECT * FROM tax $where ORDER BY id DESC");
        return $query->result();
    }
    public function setTax($post){
        $cek=$this->getTax($post['idRec']);
        $data = array(
            'tax'=>$post['tax']
        );
        if(sizeof($cek)==0){
            $this->db->insert('tax',$data);
        }else{
            $this->db->where('id', $post['idRec']);
            $this->db->update('tax', $data);
        }
    }
    /*---------------------end tax---------------*/
    
    /*---------------------barang---------------*/
    public function getBarang($id,$batas,$offset){
        if($id!="all"){
            $where="WHERE b.id='$id'";
        }else{
            $where="";
        }
        if($batas==""){
            $limit="";
        }else{
            $limit="LIMIT $offset,$batas";
        }
        $query=$this->db->query("SELECT b.*,k.kategori AS kat,s.satuan AS sat 
                FROM barang b
                LEFT JOIN kategori k ON k.id=b.kategori
                LEFT JOIN satuan s ON s.id=b.satuan 
                $where ORDER BY id DESC $limit");
        return $query->result();
    }
    public function getApiBarang($name){
        $query=$this->db->query("SELECT b.id,b.nama AS label
                FROM barang b
                WHERE b.nama like '%$name%'
                ");
        return $query->result();
    }
    public function count_barang(){
        $query = $this->db->get("barang")->num_rows();
        return $query;
    }
    public function setBarang($post){
        $batas="";
        $offset="";
        $cek=$this->getBarang($post['idRec'],$batas,$offset);
        $data = array(
            'id_barang'=>$post['id'],
            'nama'=>$post['name'],
            'kategori'=>$post['kategori'],
            'stok'=>$post['stok'],
            'satuan'=>$post['satuan'],
            'isi'=>$post['isi'],
            'harga_beli'=>$post['buy'],
            'harga_jual'=>$post['sell'],
            'expired'=>date("Y-m-d",strtotime($post['exp']))
        );
        if(sizeof($cek)==0){
            $this->db->insert('barang',$data);
        }else{
            $this->db->where('id', $post['idRec']);
            $this->db->update('barang', $data);
        }
    }
    public function delBarang($id){
        $this->db->query("DELETE FROM barang WHERE id='$id'");
    }
    /*---------------------end barang---------------*/
    
    
    /*---------------------beli---------------*/
    public function getBeli($id,$batas,$offset){
        if($id!="all"){
            $where="WHERE p.id='$id'";
        }else{
            $where="";
        }
        if($batas==""){
            $limit="";
        }else{
            $limit="LIMIT $offset,$batas";
        }
        $query=$this->db->query("SELECT p.*,b.nama AS bars,s.nama AS sups 
                FROM pembelian p
                LEFT JOIN barang b ON b.id_barang=p.barang
                LEFT JOIN supplier s ON s.id_supplier=p.supplier 
                $where ORDER BY id DESC $limit");
        log_message('debug', '[QUERY CEK GET BELI:]['.$this->db->last_query().'][RESULT:]['.json_encode($query->result()).']', false);
        return $query->result();
    }
    public function count_beli(){
        $query = $this->db->get("pembelian")->num_rows();
        return $query;
    }
    function autoFaktur(){
        $query=$this->db->query("select count(1) as jumlah from pembelian group by sesbeli");
	$max=$query->num_rows()+1;
	$menus= ('BELI-FK-'.date('Ymd').'-'.$max);
	return $menus;
    }
    function generateListBeli(){
	$jumbeli=$this->input->post('jumbeli');
		$table='';
		$i=0;
		$table.='<div class="well Blue">
                            <div class="well-header">
                                <h5>Detail Barang</h5>
                            </div>
                            <div class="well-content">
                                <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th><center>Kategori</center> </th>
                                            <th class="hidden-480"><center>Harga Jual</center> </th>
                                            <th class="hidden-480"><center>Stok</center> </th>
                                            <th><center>Sub Total Per Barang</center> </th>
                                            <th><center>Hapus</center> </th>
                                            </tr>
                                    </thead>
                                    <tbody></div>';
                                    for($i=0;$i<$jumbeli;$i++){
                                        $listobat=$this->generateListObat($i);
					$table.='<tr id="tableRow'.$i.'">
                                                    <td>'.$listobat.'</td>
                                                    <td> <input type="text" id="jumlah'.$i.'" onChange="return refreshDetail('.$i.')" name="jumlah[]" value="0" style="width:50px" placeholder="Jumlah Barang"></td>
                                                    <td> <center><span id="kat'.$i.'">?  </span></center></td>
                                                    <td data-value="78025368997"><center><span id="harga'.$i.'"> ?</span></center> </td>
                                                    <td data-value="78025368997"><center><span id="stok'.$i.'"> ?</span></center> </td>
                                                    <td data-value="disabled"><center><span name="subtot" id="subtot'.$i.'" class="control-label"> 0 </span></center> </td>
                                                    <td data-value="disabled"><center><a style="cursor:pointer" onClick="return remTable('.$i.')"><span class="label label-inverse"> DEL </span></a></center> </td>
						</tr>';
                                    }
					$table.=' </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <a type="button" id="totall" href="#" class="btn btn-primary pull-right">Rp.0.00</a>';
            return $table;
    }
    function generateListObat($id){
        $select='';
        $select.='<select  id="lstobat'.$id.'" name="lstobat[]" onChange="return refreshDetail('.$id.')">';
        $select.='<option value="">Pilih Obat</option>';
        $query=$this->db->query("select *,kategori.kategori from barang left join kategori on kategori.id=barang.kategori");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $select.='<option value="'.$data->id_barang.'">'.$data->nama.'</option>';
            }
        }
        $select.='</select>';
        return $select;
    }
    function generateComboSupplier(){
        $select='';
        $select.='<select onchange="return refreshtable()" name="comboSupplier" id="comboSupplier">';
	$select.='<option value="">Pilih Supplier</option>';
	$query=$this->db->query("select id_supplier,nama from supplier");
	if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $select.='<option value="'.$data->id_supplier.'">'.$data->nama.'</option>';
            }
	}
	$select.='</select>';
	return $select;
    }
    function refreshDetail(){
        $id=$this->input->post('obatId');
	$jumlah=$this->input->post('jumlah');
	$query=$this->db->query("select *,kategori.kategori from barang left join kategori on kategori.id=barang.kategori where id_barang='$id'");
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $data) {
                    echo $data->kategori.'|'. number_format($data->harga_beli).'|'. ($data->stok).'|'. ($data->harga_beli*$jumlah);
		}
            }
    }
    function actionbeli(){
        $tanggal=$this->input->post('tanggal');
	$faktur=$this->input->post('faktur');
	$supplier=$this->input->post('comboSupplier');
	$sesbeli=$this->input->post('sesbeli');
	$i=0;
	$jumlahBeli=count($this->input->post('jumlah'));
	$ljumObat=$this->input->post('jumlah');
	$lObat=$this->input->post('lstobat');
		
	for($i;$i<$jumlahBeli;$i++){
            $jumObat = $ljumObat[$i];
            $Obat = $lObat[$i];
            $getHarga=$this->gethargaobat($Obat,$jumObat);
			
            $data=array(
			 'barang'=>$Obat,
			 'jumlah'=>$jumObat,
			 'faktur'=>$faktur,
			 'tanggal'=>$tanggal,
			 'supplier'=>$supplier,
			 'total'=>$getHarga,
			 'sesbeli'=>$sesbeli,
			);
			 
			//$this->db->trans_start();
            $this->db->insert('pembelian',$data);
			//$this->db->trans_complete();
            $this->tambahBarang($Obat,$jumObat);
        }
    }
    function tambahBarang($id,$jumObat){
        $query=$this->db->query("select id_barang,stok from barang where id_barang='$id'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $stok=$data->stok+$jumObat;
		$this->db->query("update barang set stok='$stok' where id_barang='$id'");
            }
	}
    }
    function gethargaobat($id,$jumObat){
        $query=$this->db->query("select harga_beli  from barang where id_barang='$id'");
	if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $harga=$data->harga_beli*$jumObat;
            }
	}
	return $harga;
    }
    function getDashBeliM(){
        $query=$this->db->query("SELECT a.tanggal,
        (SELECT SUM(b.jumlah)
        FROM pembelian b
        WHERE b.tanggal =a.tanggal) as jumlah 
        FROM pembelian a
        WHERE a.tanggal BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
        GROUP BY a.tanggal");
        return $query->result();
    }
    function getDashJualM(){
        $query=$this->db->query("SELECT a.tanggal,
        (SELECT SUM(b.total)
        FROM jual b
        WHERE b.tanggal =a.tanggal) as total 
        FROM jual a
        WHERE a.tanggal BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
        GROUP BY a.tanggal");
        return $query->result();
    }
    /*---------------------end beli---------------*/
    
    
}
