<?php
//$exp=date('d-m-Y',strtotime("+1 year"));
if(sizeof($rec)==0){
    $idRec=set_value('idRec');
    $faktur=set_value('faktur');
    $tanggal=set_value('tanggal');
    $sups=set_value('supplier');
    $barang=set_value('barang');
    $barang_id=set_value('barang_id');
    $stok=set_value('stok');
    $isi=set_value('isi');
    $kats=set_value('kategori');
    $sats=set_value('satuan');
    $buy=set_value('buy');
    $exp=date('d-m-Y',strtotime("+1 year"));
}else{
    //print_r($rec);die;
    $idRec=$rec[0]->id;
    $faktur=$rec[0]->faktur;
    $tanggal=date("d-m-Y",strtotime($rec[0]->tanggal));
    $sups=$rec[0]->supplier_id;
    $barang=$rec[0]->barang_name;
    $barang_id=$rec[0]->barang_id;
    $stok=$rec[0]->stok;
    $isi=$rec[0]->isi;
    $kats=$rec[0]->kategori;
    $sats=$rec[0]->satuan;
    $buy=$rec[0]->harga_beli;
    
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Form Beli</h4>
                    <p class="category">Lengkapi isi field</p>
                </div>
                <div class="card-content">
                    <form method="post" action="<?php echo base_url().'core/savebeli';?>">
                        <?php
                        if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><?php echo validation_errors();?></span>
                            </div>
                        <?php    
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Faktur</label>
                                    <input type="text" class="form-control" name="faktur" value="<?php echo $faktur; ?>">
                                    <input type="hidden" name="idRec" value="<?php echo $idRec; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tanggal Beli</label>
                                    <input type="text" class="form-control tgl" name="tanggal" value="<?php echo $tanggal; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Supplier</label>
                                    <select class="form-control" name="supplier">
                                        <option value=""></option>
                                        <?php foreach($supplier as $sup){ 
                                            if($sup->id==$sups){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                            ?>
                                        <option value="<?php echo $sup->id; ?>" <?php echo $selected; ?>><?php echo $sup->nama; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Barang</label>
                                    <input type="text" class="form-control" name="barang" id="barang" value="<?php echo $barang; ?>">
                                    <input type="hidden" name="barang_id" id="barang_id" value="<?php echo $barang_id; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Kategori</label>
                                    <select class="form-control" name="kategori">
                                        <option value=""></option>
                                        <?php foreach($kategori as $kat){ 
                                            if($kat->id==$kats){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                            ?>
                                        <option value="<?php echo $kat->id; ?>" <?php echo $selected; ?>><?php echo $kat->kategori; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Satuan</label>
                                    <select class="form-control" name="satuan">
                                        <option value=""></option>
                                        <?php foreach($satuan as $sat){ 
                                            if($sat->id==$sats){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                        ?>
                                        <option value="<?php echo $sat->id; ?>" <?php echo $selected; ?>><?php echo $sat->satuan; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Stok</label>
                                    <input type="text" class="form-control" name="stok" value="<?php echo $stok; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Harga beli</label>
                                    <input type="text" class="form-control" name="buy" value="<?php echo $buy; ?>">
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Isi</label>
                                    <input type="text" class="form-control" name="isi" value="<?php echo $isi; ?>">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-left">Simpan</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
