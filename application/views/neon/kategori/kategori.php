<div class="panel  panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Kategori Stats</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                <a type="button" href="<?php echo base_url().'core/addkategori/'; ?>" class="btn btn-blue pull-right">Tambah Kategori</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kategori</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($kategori as $s){ ?>
            <tr>
                <td><?php echo $s->id_kategori; ?></td>
                <td><?php echo $s->kategori; ?></td>
                <td>
                    <a type="button" href="<?php echo base_url().'core/editkategori/'.$s->id; ?>" class="btn-sm btn-primary">Edit</a>
                    <a type="button" href="<?php echo base_url().'core/remkategori/'.$s->id; ?>" class="btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>	