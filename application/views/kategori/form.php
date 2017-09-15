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
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Form Supplier</h4>
                    <p class="category">Lengkapi isi field</p>
                </div>
                <div class="card-content">
                    <form method="post" action="<?php echo base_url().'home/savesupplier';?>">
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
                                    <label class="control-label">ID Supplier</label>
                                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="idRec" value="<?php echo $idRec; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nama Supplier</label>
                                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Alamat Supplier</label>
                                    <textarea class="form-control" rows="5" name="alamat"><?php echo $alamat; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">No Telepon</label>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
