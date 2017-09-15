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
    
}
