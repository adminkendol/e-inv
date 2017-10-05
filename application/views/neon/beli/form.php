<?php
$tanggal=date("d-m-Y");
$total="Rp.0.00";
if(sizeof($rec)==0){
    $idRec=set_value('idRec');
    $sups=set_value('supplier');
}else{
    $idRec=$rec[0]->id;
    $autofaktur=$rec[0]->faktur;
    $tanggal=date("d-m-Y",strtotime($rec[0]->tanggal));
    $sups=$rec[0]->target_id;
    $total="Rp.".number_format($rec[0]->total,2,',','.');
 }
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-gradient">
            <div class="panel-heading">
                <div class="panel-title">Form Beli</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form method="post" action="" id="form_beli" class="form-horizontal form-groups">
                        <?php
                        if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><?php echo validation_errors();?></span>
                            </div>
                        <?php    
                        }if($valid=="1"){?>
                            <div class="alert alert-warning">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><?php echo $valdata; ?></span>
                            </div>
                        <?php } ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Faktur</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="faktur" id="faktur" value="<?php echo $autofaktur; ?>" readonly >
                            <input type="hidden" id="totallHidden" name="totallHidden" value="">
                            <input type="hidden" id="idRec" name="idRec" value="<?php echo $idRec;?>">
                            <input type="hidden" id="sesbeli" name="sesbeli" value="<?php echo date("YmdHms"); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal Beli</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control tgl" name="tanggal" id="tanggal" value="<?php echo $tanggal; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Supplier</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="supplier" id="supplier">
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
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <?php if(sizeof($rec)==0){ ?> 
                                <button id="addBeli" type="button" class="btn btn-info">
                                    <span class="glyphicon glyphicon-plus"></span> Barang
                                </button>
                            <?php } ?>
			</div>
                    </div>
                    <div class="form-group">
                        <table class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                    <th>Kategori</th>
                                    <th>@harga</th>
                                    <th>Stok</th>
                                    <th>Total</th>
                                    <?php if(sizeof($rec)==0){ ?> 
                                    <th></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody id="tblBarang">
                                <?php if(sizeof($rec)>0){  
                                        if (sizeof($recOrder)>0){ 
                                            foreach($recOrder as $ro){ ?>
                                <tr>
                                    <td><?php echo $ro->nama; ?></td>
                                    <td><?php echo $ro->jumlah; ?></td>
                                    <td><?php echo $ro->kategori; ?></td>
                                    <td><?php echo $ro->harga_beli; ?></td>
                                    <td><?php echo $ro->stok; ?></td>
                                    <td><?php echo $ro->jumlah * $ro->harga_beli; ?></td>
                                </tr>
                                    <?php  }
                                        }
                                    } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <a type="button" id="totall" href="#" class="btn btn-green pull-right"><?php echo $total; ?></a>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <button type="button" onclick="return confirmdlg()" id="simpan" class="btn btn-blue pull-left">Simpan</button>
                        </div>
                        <div class="col-md-1">
                            <a href="<?php echo base_url().'core/beli';?>" type="button" id="cancel" class="btn btn-danger pull-left">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="confirm" style="display:none"> Anda Ingin Meyimpan data ini</div>