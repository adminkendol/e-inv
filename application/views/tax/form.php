<?php
if(sizeof($rec)>0){
    $idRec=$rec[0]->id;
    $tax=$rec[0]->tax;
}else{
    $idRec="";
    $tax="";
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Form Pajak</h4>
                    <p class="category">Lengkapi isi field</p>
                </div>
                <div class="card-content">
                    <form method="post" action="<?php echo base_url().'core/savetax';?>">
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
                            <div class="col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label">Pajak (%)</label>
                                    <input type="text" class="form-control" name="tax" value="<?php echo $tax; ?>">
                                    <input type="hidden" name="idRec" value="<?php echo $idRec; ?>">
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
