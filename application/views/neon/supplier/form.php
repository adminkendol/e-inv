<?php
if(sizeof($rec)==0){
    $idRec=set_value('idRec');
    $id=set_value('id');
    $name=set_value('name');
    $alamat=set_value('alamat');
    $phone=set_value('phone');
}else{
    $idRec=$rec[0]->id;
    $id=$rec[0]->id_supplier;
    $name=$rec[0]->nama;
    $alamat=$rec[0]->alamat;
    $phone=$rec[0]->telepon;
}
?>
<div class="row">
    <div class="col-sm-8">
        <div class="panel panel-gradient">
            <div class="panel-heading">
                <div class="panel-title">Form Satuan</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url().'core/savesupplier';?>" class="form-horizontal form-groups">
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
                        <label class="col-sm-3 control-label">ID Supplier</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="idRec" value="<?php echo $idRec; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nama Supplier</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Alamat Supplier</label>
                        <div class="col-sm-5">
                            <textarea class="form-control" rows="5" name="alamat"><?php echo $alamat; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">No Telepon</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
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