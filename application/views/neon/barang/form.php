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
    $exp=date('d-m-Y',strtotime("+1 year"));
}else{
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
<div class="row">
    <div class="col-sm-8">
        <div class="panel panel-gradient">
            <div class="panel-heading">
                <div class="panel-title">Form Barang</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url().'core/savebarang';?>" class="form-horizontal form-groups">
                        <?php
                        if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><?php echo validation_errors();?></span>
                            </div>
                        <?php    
                        }
                        ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">ID Barang</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="idRec" value="<?php echo $idRec; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Barang</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kategori</label>
                        <div class="col-sm-5">
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
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Stok</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="stok" value="<?php echo $stok; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Kadaluarsa</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control tgl" name="exp" value="<?php echo $exp; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Harga beli</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="buy" value="<?php echo $buy; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Harga jual</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="sell" value="<?php echo $sell; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Isi</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="isi" value="<?php echo $isi; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-blue">Simpan</button>
			</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>