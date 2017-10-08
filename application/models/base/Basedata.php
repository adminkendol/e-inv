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
    
    /*---------------------customer---------------*/
    public function getCust($id,$batas,$offset){
        if($id!="all"){
            $where="WHERE cus.id='$id'";
        }else{
            $where="";
        }
        if($batas==""){
            $limit="";
        }else{
            $limit="LIMIT $offset,$batas";
        }
        $query=$this->db->query("SELECT cus.*
                FROM customer cus
                $where ORDER BY id DESC $limit");
        return $query->result();
    }
    public function count_cust(){
        $query = $this->db->get("customer")->num_rows();
        return $query;
    }
    public function setCustomer($post){
        $batas="";
        $offset="";
        $cek=$this->getCust($post['idRec'],$batas,$offset);
        $data = array(
            'customer'=>$post['customer'],
            'ktp'=>$post['ktp'],
            'alamat'=>$post['alamat'],
            'phone1'=>$post['phone1'],
            'phone2'=>$post['phone2'],
            'email'=>$post['email']
        );
        if(sizeof($cek)==0){
            $this->db->insert('customer',$data);
        }else{
            $this->db->where('id', $post['idRec']);
            $this->db->update('customer', $data);
        }
    }
    public function delCustomer($id){
        $this->db->query("DELETE FROM customer WHERE id='$id'");
    }
    /*---------------------end customer---------------*/
    
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
    
    /*---------------------user---------------*/
    public function getUser($id){
        if($id!="all"){
            $where="WHERE id='$id'";
        }else{
            $where="";
        }
        $query=$this->db->query("SELECT * FROM t_user $where ORDER BY id DESC");
        return $query->result();
    }
    public function setUser($post){
        $cek=$this->getUser($post['idRec']);
        $data = array(
            'nama'=>$post['name'],
            'username'=>$post['username'],
            'password'=>md5($post['password'])
        );
        if(sizeof($cek)==0){
            $this->db->insert('t_user',$data);
        }else{
            $this->db->where('id', $post['idRec']);
            $this->db->update('t_user', $data);
        }
    }
    public function delUser($id){
        $this->db->query("DELETE FROM t_user WHERE id='$id'");
    }
    /*---------------------end kategori---------------*/
    
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
            $and="AND fak.id='$id'";
        }else{
            $and="";
        }
        if($batas==""){
            $limit="";
        }else{
            $limit="LIMIT $offset,$batas";
        }
        $query=$this->db->query("SELECT fak.id,fak.faktur,fak.tanggal,sup.nama AS sup_nama,fak.total,fak.target_id,sup.alamat,sup.telepon
                FROM faktur fak
                LEFT JOIN supplier sup ON sup.id=fak.target_id 
                WHERE fak.faktur_type_id='1' $and ORDER BY fak.id DESC $limit");
        log_message('debug', '[QUERY CEK GET BELI:]['.$this->db->last_query().'][RESULT:]['.json_encode($query->result()).']', false);
        return $query->result();
    }
    public function getOrder($id){
        $query=$this->db->query("SELECT fo.id,fo.jumlah,fo.barang_id,bar.nama,bar.id_barang,kat.kategori,bar.harga_beli,bar.stok
                FROM faktur_order fo
                LEFT JOIN barang bar ON bar.id=fo.barang_id
                LEFT JOIN kategori kat ON kat.id=bar.kategori
                WHERE fo.faktur_id='$id'");
        return $query->result();
    }
    public function count_beli(){
        $this->db->where("faktur_type_id","1");
        $query = $this->db->get("faktur")->num_rows();
        return $query;
    }
    function autoFaktur(){
        $query=$this->db->query("select count(1) as jumlah from pembelian group by sesbeli");
	$max=$query->num_rows()+1;
	$menus= ('BELI-FK-'.date('Ymd').'-'.$max);
	return $menus;
    }
    function autoFakturN($flag){
        if($flag=="1"){
            $word="BELI";
        }else{
            $word="JUAL";
        }
        $query=$this->db->query("select count(1) as jumlah from faktur where faktur_type_id='$flag' group by sesion");
	$max=$query->num_rows()+1;
	$menus= ($word.'-FK-'.date('Ymd').'-'.$max);
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
    function actionbeli($input_by){
        $idRec=$this->input->post('idRec');
        $tanggal=date("Y-m-d",strtotime($this->input->post('tanggal')));
	$faktur=$this->input->post('faktur');
	$supplier=$this->input->post('supplier');
	$sesbeli=$this->input->post('sesbeli');
	$i=0;
	$jumlahBeli=count($this->input->post('jumlah'));
        $total=$this->input->post('totallHidden');
	$ljumObat=$this->input->post('jumlah');
        
        $cek=$this->getBeli($idRec,"","");
        $lObat=$this->input->post('lstobat');
        if(sizeof($cek)==0){
            $data=array('faktur_type_id'=>'1',
                    'faktur'=>$faktur,
                    'target_id'=>$supplier,
                    'tanggal'=>$tanggal,
                    'total'=>$total,
                    'sesion'=>$sesbeli,
                    'input_by'=>$input_by,
                    'input_date'=>date('Y-m-d h:i:s'));
            $this->db->insert('faktur',$data);
            $id=$this->db->insert_id();
            for($i;$i<$jumlahBeli;$i++){
                $jumObat = $ljumObat[$i];
                $Obat = $lObat[$i];
                $getId=$this->getIdObat($Obat);
                $data=array(
			 'faktur_id'=>$id,
			 'barang_id'=>$getId,
			 'jumlah'=>$jumObat
			);
                $this->db->trans_start();
                $this->db->insert('faktur_order',$data);
                $this->db->trans_complete();
                $this->tambahBarang($Obat,$jumObat);
            }
        }else{
            $data=array('faktur_type_id'=>'1',
                    'faktur'=>$faktur,
                    'target_id'=>$supplier,
                    'tanggal'=>$tanggal,
                    //'total'=>$total,
                    //'sesion'=>$sesbeli,
                    'edit_by'=>$input_by,
                    'edit_date'=>date('Y-m-d h:i:s'));
            $this->db->where('id', $idRec);
            $this->db->update('faktur', $data);
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
    function getIdObat($id){
        $query=$this->db->query("select id  from barang where id_barang='$id'");
	if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $idObat=$data->id;
            }
	}
	return $idObat;
    }
    /*---------------------end beli---------------*/
    
    
    /*---------------------penjualan---------------*/
    public function getJual($id,$batas,$offset){
        if($id!="all"){
            $and="AND fak.id='$id'";
        }else{
            $and="";
        }
        if($batas==""){
            $limit="";
        }else{
            $limit="LIMIT $offset,$batas";
        }
        $query=$this->db->query("SELECT fak.id,fak.faktur,fak.tanggal,cus.customer,
                cus.id as customer_id,cus.ktp,cus.alamat,cus.phone1,cus.phone2,cus.email,
                fak.total,fak.target_id,cus.alamat,cus.phone1
                FROM faktur fak
                LEFT JOIN customer cus ON cus.id=fak.target_id 
                WHERE fak.faktur_type_id='2' $and ORDER BY fak.id DESC $limit");
        log_message('debug', '[QUERY CEK GET JUAL:]['.$this->db->last_query().'][RESULT:]['.json_encode($query->result()).']', false);
        return $query->result();
    }
    public function count_jual(){
        $this->db->where("faktur_type_id","2");
        $query = $this->db->get("faktur")->num_rows();
        return $query;
    }
    function actionjual($input_by){
        $idRec=$this->input->post('idRec');
        $tanggal=date("Y-m-d",strtotime($this->input->post('tanggal')));
	$faktur=$this->input->post('faktur');
        if($this->input->post('customer_id')!=""){
            $supplier=$this->input->post('customer_id');
        }else{
            $dataCus=array('customer'=>$this->input->post('customer'),
                    'ktp'=>$this->input->post('ktp'),
                    'alamat'=>$this->input->post('alamat'),
                    'phone1'=>$this->input->post('phone1'),
                    'phone2'=>$this->input->post('phone2'),
                    'email'=>$this->input->post('email'),
                    'input_by'=>$input_by,
                    'input_date'=>date('Y-m-d h:i:s'));
            $this->db->insert('customer',$dataCus);
            $supplier=$this->db->insert_id();
        }
	$sesbeli=$this->input->post('sesjual');
	$i=0;
	$jumlahBeli=count($this->input->post('jumlah'));
        $total=$this->input->post('totallHidden');
	$ljumObat=$this->input->post('jumlah');
        
        $cek=$this->getJual($idRec,"","");
        $lObat=$this->input->post('lstobat');
        if(sizeof($cek)==0){
            $data=array('faktur_type_id'=>'2',
                    'faktur'=>$faktur,
                    'target_id'=>$supplier,
                    'tanggal'=>$tanggal,
                    'total'=>$total,
                    'sesion'=>$sesbeli,
                    'input_by'=>$input_by,
                    'input_date'=>date('Y-m-d h:i:s'));
            $this->db->insert('faktur',$data);
            $id=$this->db->insert_id();
            for($i;$i<$jumlahBeli;$i++){
                $jumObat = $ljumObat[$i];
                $Obat = $lObat[$i];
                $getId=$this->getIdObat($Obat);
                $data=array(
			 'faktur_id'=>$id,
			 'barang_id'=>$getId,
			 'jumlah'=>$jumObat
			);
                $this->db->trans_start();
                $this->db->insert('faktur_order',$data);
                $this->db->trans_complete();
                $this->tambahBarang($Obat,$jumObat);
            }
        }else{
            $data=array('faktur_type_id'=>'2',
                    'faktur'=>$faktur,
                    'target_id'=>$supplier,
                    'tanggal'=>$tanggal,
                    'edit_by'=>$input_by,
                    'edit_date'=>date('Y-m-d h:i:s'));
            $this->db->where('id', $idRec);
            $this->db->update('faktur', $data);
        }
    }
    /*---------------------end penjualan---------------*/
    
    /*---------------------dashboard---------------*/
    function getDashBeliM(){
        $query=$this->db->query("SELECT a.tanggal,
        (SELECT SUM(b.total)
        FROM faktur b
        WHERE b.tanggal =a.tanggal AND b.faktur_type_id='1') as jumlah 
        FROM faktur a
        WHERE a.tanggal BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
        AND a.faktur_type_id='1'
        GROUP BY a.tanggal");
        return $query->result();
    }
    function getDashJualM(){
        $query=$this->db->query("SELECT a.tanggal,
        (SELECT SUM(b.total)
        FROM faktur b
        WHERE b.tanggal =a.tanggal AND b.faktur_type_id='2') as total 
        FROM faktur a
        WHERE a.tanggal BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
        AND a.faktur_type_id='2'
        GROUP BY a.tanggal");
        return $query->result();
    }
    function getDashBrgJualM(){
        $query=$this->db->query("SELECT bar.nama,
            (SELECT SUM(fo1.jumlah*bar1.harga_jual)
            FROM faktur_order fo1
            INNER JOIN faktur fak1 ON fak1.id=fo1.faktur_id
            INNER JOIN barang bar1 ON bar1.id=fo1.barang_id
            WHERE fak1.faktur_type_id='2'
            AND fak1.tanggal=fak.tanggal
            ) as total
            FROM faktur_order fo
            INNER JOIN faktur fak ON fak.id=fo.faktur_id
            INNER JOIN barang bar ON bar.id=fo.barang_id
            WHERE fak.faktur_type_id='2'
            AND fak.tanggal BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
            GROUP BY fo.barang_id
            ");
        return $query->result();
    }
    /*---------------------end dashboard---------------*/
    
    /*---------------------report---------------*/
    function getReport($type,$batas,$offset){
        if($type=="1"){
            $field="bar.harga_beli,sup.nama";
            $join ="INNER JOIN supplier sup ON sup.id=fak.target_id";
        }else{
            $field="bar.harga_jual,cus.customer";
            $join ="INNER JOIN customer cus ON cus.id=fak.target_id";
        }
        if($batas==""){
            $limit="";
        }else{
            $limit="LIMIT $offset,$batas";
        }
        $query=$this->db->query("SELECT fak.faktur, bar.nama,fak.tanggal,fo.jumlah,fak.total,$field
        FROM faktur_order fo
        INNER JOIN faktur fak ON fak.id=fo.faktur_id
        INNER JOIN barang bar ON bar.id=fo.barang_id
        $join
        WHERE fak.faktur_type_id = '$type'
        ORDER BY fo.faktur_id ASC $limit");
        return $query->result();
    }
    /*---------------------end report---------------*/
    
    
    /*-----------------------API------------------*/
    public function getCustomer($name){
        $query=$this->db->query("SELECT * FROM customer WHERE customer LIKE '%$name%'");
        return $query->result();
    }
    /*-----------------------end API------------------*/
    
    
    /*-----------------------login------------------*/
    public function cekLogin($post){
        $pass=md5($post['password']);
        $query=$this->db->query("SELECT id,nama,role
        FROM t_user
        WHERE username='$post[username]'
        AND password='$pass'");
        return $query->result();
    }
    
    
    /*-----------------------end login------------------*/
}
