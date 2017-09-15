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
    public function getBarang($id){
        if($id!="all"){
            $where="WHERE b.id='$id'";
        }else{
            $where="";
        }
        $query=$this->db->query("SELECT b.*,k.kategori AS kat,s.satuan AS sat 
                FROM barang b
                LEFT JOIN kategori k ON k.id=b.kategori
                LEFT JOIN satuan s ON s.id=b.satuan 
                $where ORDER BY id DESC");
        return $query->result();
    }
    public function setBarang($post){
        $cek=$this->getBarang($post['idRec']);
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
}
