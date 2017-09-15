<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="orange">
                    <h4 class="title">Kategori Stats</h4>
                    <a type="button" href="<?php echo base_url().'home/addkategori/'; ?>" class="btn btn-primary pull-right">Tambah Kategori</a>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Kategori</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach($kategori as $s){ ?>
                            <tr>
                                <td><?php echo $s->id_kategori; ?></td>
                                <td><?php echo $s->kategori; ?></td>
                                <td>
                                    <a type="button" href="<?php echo base_url().'home/editkategori/'.$s->id; ?>" class="btn-sm btn-primary">Edit</a>
                                    <a type="button" href="<?php echo base_url().'home/remkategori/'.$s->id; ?>" class="btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
