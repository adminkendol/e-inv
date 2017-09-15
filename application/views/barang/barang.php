<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="orange">
                    <h4 class="title">Barang Stats</h4>
                    <a type="button" href="<?php echo base_url().'home/addbarang/'; ?>" class="btn btn-primary pull-right">Tambah Barang</a>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Satuan</th>
                            <th>Isi</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Kadaluarsa</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach($barang as $s){ ?>
                            <tr>
                                <td><?php echo $s->id_barang; ?></td>
                                <td><?php echo $s->nama; ?></td>
                                <td><?php echo $s->kat; ?></td>
                                <td><?php echo $s->stok; ?></td>
                                <td><?php echo $s->sat; ?></td>
                                <td><?php echo $s->isi; ?></td>
                                <td><?php echo number_format($s->harga_beli,2,',','.'); ?></td>
                                <td><?php echo number_format($s->harga_jual,2,',','.'); ?></td>
                                <td><?php echo date("d-m-Y",strtotime($s->expired)); ?></td>
                                <td>
                                    <a type="button" href="<?php echo base_url().'home/editbarang/'.$s->id; ?>" class="btn-sm btn-primary">Edit</a>
                                    <a type="button" href="<?php echo base_url().'home/rembarang/'.$s->id; ?>" class="btn-sm btn-danger">Hapus</a>
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
