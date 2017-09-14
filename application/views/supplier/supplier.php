<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="orange">
                    <h4 class="title">Supplier Stats</h4>
                    <p class="category">New supplier on 15th September, 2016</p>
                    <a type="button" href="<?php echo base_url().'home/addsupplier/'; ?>" class="btn btn-primary pull-right">Tambah Supplier</a>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                        </thead>
                        <tbody>
                            <?php foreach($supplier as $s){ ?>
                            <tr>
                                <td><?php echo $s->id_supplier; ?></td>
                                <td><?php echo $s->nama; ?></td>
                                <td><?php echo $s->alamat; ?></td>
                                <td><?php echo $s->telepon; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
