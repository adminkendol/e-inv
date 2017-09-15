<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="orange">
                    <h4 class="title">Satuan Stats</h4>
                    <a type="button" href="<?php echo base_url().'home/addsatuan/'; ?>" class="btn btn-primary pull-right">Tambah Satuan</a>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Satuan</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach($satuan as $s){ ?>
                            <tr>
                                <td><?php echo $s->id_satuan; ?></td>
                                <td><?php echo $s->satuan; ?></td>
                                <td>
                                    <a type="button" href="<?php echo base_url().'home/editsatuan/'.$s->id; ?>" class="btn-sm btn-primary">Edit</a>
                                    <a type="button" href="<?php echo base_url().'home/remsatuan/'.$s->id; ?>" class="btn-sm btn-danger">Hapus</a>
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
