<div class="panel panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Supplier Stats</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                <a type="button" href="<?php echo base_url().'core/addsupplier/'; ?>" class="btn btn-blue pull-right">Tambah Supplier</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($supplier as $s){ ?>
            <tr>
                <td><?php echo $s->id_supplier; ?></td>
                <td><?php echo $s->nama; ?></td>
                <td><?php echo $s->alamat; ?></td>
                <td><?php echo $s->telepon; ?></td>
                <td>
                    <a type="button" href="<?php echo base_url().'core/editsupplier/'.$s->id; ?>" class="btn-sm btn-primary">Edit</a>
                    <a type="button" href="<?php echo base_url().'core/remsupplier/'.$s->id; ?>" class="btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>