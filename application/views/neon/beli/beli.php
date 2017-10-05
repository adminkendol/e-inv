<script>
    function remTable(id){
        toastr.error('Anda tidak berhak menghapus');
    }
</script>
<div class="panel panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title">Pembelian Stats</h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                <a type="button" href="<?php echo base_url().'core/addbeli'; ?>" class="btn btn-blue pull-right">Tambah Pembelian</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Faktur</th>
                <th>Tanggal Beli</th>
                <th>Supplier</th>
                <th>Total Harga</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($beli as $s){ ?>
            <tr>
                <td><?php echo $s->faktur; ?></td>
                <td><?php echo date("d-m-Y",strtotime($s->tanggal)); ?></td>
                <td><?php echo $s->sup_nama; ?></td>
                <td><?php echo number_format($s->total,2,',','.'); ?></td>
                <td>
                    <a type="button" href="<?php echo base_url().'core/editbeli/'.$s->id; ?>" class="btn-sm btn-primary">Detail</a>
                    <a type="button" href="<?php echo base_url().'core/printfo/'.$s->id; ?>" class="btn-sm btn-warning">Print</a>
                    <a type="button" onclick="return remTable(<?php echo $s->id; ?>)" href="#" class="btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="panel-footer"><?=$pagination?></div>
</div>