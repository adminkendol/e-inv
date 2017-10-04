<?php
if(sizeof($rec)>0){
    $idRec=$rec[0]->id;
    $tax=$rec[0]->tax;
}else{
    $idRec="";
    $tax="";
}
?>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-gradient">
            <div class="panel-heading">
                <div class="panel-title">Setting Pajak</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close" class="bg"><i class="entypo-cancel"></i></a>
                </div>
            </div>
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
                <div class="panel-body">
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Pajak (%)</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="tax" value="<?php echo $tax; ?>">
                            <input type="hidden" name="idRec" value="<?php echo $idRec; ?>">
                        </div>
                        <button type="submit" class="btn btn-blue">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
        
