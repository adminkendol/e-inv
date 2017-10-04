<div class="panel panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Satuan Stats</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                <a type="button" href="<?php echo base_url().'core/addsatuan/'; ?>" class="btn btn-blue pull-right">Tambah Satuan</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Satuan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($satuan as $s){ ?>
            <tr>
                <td><?php echo $s->id_satuan; ?></td>
                <td><?php echo $s->satuan; ?></td>
                <td>
                    <a type="button" href="<?php echo base_url().'core/editsatuan/'.$s->id; ?>" class="btn-sm btn-primary">Edit</a>
                    <a type="button" href="<?php echo base_url().'core/remsatuan/'.$s->id; ?>" class="btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>