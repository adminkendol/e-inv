<?php
//$exp=date('d-m-Y',strtotime("+1 year"));
if(sizeof($rec)==0){
    $idRec=set_value('idRec');
    $id=set_value('id');
    $name=set_value('name');
    $stok=set_value('stok');
    $isi=set_value('isi');
    $kats=set_value('kategori');
    $sats=set_value('satuan');
    $buy=set_value('buy');
    $sell=set_value('sell');
    //$exp=set_value('exp');
    $exp=date('d-m-Y',strtotime("+1 year"));
}else{
    //print_r($rec);die;
    $idRec=$rec[0]->id;
    $id=$rec[0]->id_barang;
    $name=$rec[0]->nama;
    $stok=$rec[0]->stok;
    $isi=$rec[0]->isi;
    $kats=$rec[0]->kategori;
    $sats=$rec[0]->satuan;
    $buy=$rec[0]->harga_beli;
    $sell=$rec[0]->harga_jual;
    $exp=date("d-m-Y",strtotime($rec[0]->expired));
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Form Barang</h4>
                    <p class="category">Lengkapi isi field</p>
                </div>
                <div class="card-content">
                    <form method="post" action="<?php echo base_url().'home/savebarang';?>">
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
                                    <label class="control-label">ID Barang</label>
                                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="idRec" value="<?php echo $idRec; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nama Barang</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Kategori</label>
                                    <select class="form-control" name="kategori">
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
                                    <label class="control-label">Kadaluarsa</label>
                                    <input type="text" class="form-control tgl" name="exp" value="<?php echo $exp; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Harga beli</label>
                                    <input type="text" class="form-control" name="buy" value="<?php echo $buy; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Harga jual</label>
                                    <input type="text" class="form-control" name="sell" value="<?php echo $sell; ?>">
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
