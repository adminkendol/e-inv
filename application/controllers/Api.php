<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        //$this->load->model(array('base/basedata'));
        $this->config->load('config', true);
        $this->server = $this->config->item('server_url');
    }
    public function kategori(){
        
    }
    public function cabang(){
        $html = $this->simple_html_dom->load_file($this->server.'?Kategori=1&Cabang_ID=1');
        foreach($this->simple_html_dom->find('td[align=right]') as $aa){
            foreach($aa->find('td[nowrap]') as $bb){
                $resultA=$bb->plaintext;
                $resultB=explode("?",$bb->find('a')[0]->href);
                $data[]=array("id"=>str_replace("Cabang_ID=","",$resultB[1]),"name"=>$resultA);
            }
        }
        echo json_encode($data);
    }
    public function parse(){
        $kat=$this->input->post('kat');
        $id=$this->input->post('id');
        $html = $this->simple_html_dom->load_file($this->server.'?Kategori='.$kat.'&Cabang_ID='.$id);
        foreach($this->simple_html_dom->find('td[rowspan=3]') as $aa){
            foreach($aa->find('table[width=100%%]') as $bb){
                foreach($bb->find('td[width=100%]') as $cc){
                    $resultA=$cc->find('span[class=Judul2]')[0]->plaintext;
                    $resultB=$cc->find('span[class=detail]')[0]->plaintext;
                    $resultC=$cc->find('td[class=judul]')[0]->plaintext;
                    $resultD=$cc->find('td[class=tanggal2]')[0]->plaintext;
                    $detail=$cc->find('td[valign=top]')[0];
                    $resultE=str_replace("<br...","",$detail->find('span[class=detail]')[0]->plaintext);
                    $data[]=array("t1"=>$resultA,"t2"=>$resultB,"t3"=>$resultC,"t4"=>$resultD,"t5"=>$resultE);
                }
            }
        }
        foreach($this->simple_html_dom->find('td[width=23%]') as $dd){
            foreach($dd->find('a') as $ee){
                $total[]=$ee->href;
            }
        }
        $totalArray=explode("&",$total[0]);
        $dataArray=array("total"=>str_replace("totalRows_rsPerKategoriFilter=","",$totalArray[1]),"data"=>$data);
        echo json_encode($dataArray);
    }
    
}    