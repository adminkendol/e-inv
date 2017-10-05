<div class="panel panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Barang Stats</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                <a type="button" href="<?php echo base_url().'core/addbarang/'; ?>" class="btn btn-blue pull-right">Tambah Barang</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
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
            </tr>
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
                    <a type="button" href="<?php echo base_url().'core/editbarang/'.$s->id; ?>" class="btn-sm btn-primary">Edit</a>
                    <a type="button" href="<?php echo base_url().'core/rembarang/'.$s->id; ?>" class="btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="panel-footer"><?=$pagination?></div>
</div>