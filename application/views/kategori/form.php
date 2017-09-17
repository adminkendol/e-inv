<?php
if(sizeof($rec)==0){
    $idRec=set_value('idRec');
    $id=set_value('id');
    $kat=set_value('kategori');
}else{
    $idRec=$rec[0]->id;
    $id=$rec[0]->id_kategori;
    $kat=$rec[0]->kategori;
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Form Kategori</h4>
                    <p class="category">Lengkapi isi field</p>
                </div>
                <div class="card-content">
                    <form method="post" action="<?php echo base_url().'core/savekategori';?>">
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
                                    <label class="control-label">ID Kategori</label>
                                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                                    <input type="hidden" name="idRec" value="<?php echo $idRec; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Kategori</label>
                                    <input type="text" class="form-control" name="kategori" value="<?php echo $kat; ?>">
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
