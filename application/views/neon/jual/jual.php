<script>
    function remTable(id){
        $( "#infodlg" ).html("Anda tidak berhak menghapus");
	$( "#infodlg" ).dialog({ title:"Info...", draggable: false,modal: true});
    }
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="orange">
                    <h4 class="title">Penjualan Stats</h4>
                    <a type="button" href="<?php echo base_url().'core/addjual'; ?>" class="btn btn-primary pull-right">Tambah Penjualan</a>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                            <th>Faktur</th>
                            <th>Tanggal Jual</th>
                            <th>Customer</th>
                            <th>Total Harga</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php foreach($jual as $s){ ?>
                            <tr>
                                <td><?php echo $s->faktur; ?></td>
                                <td><?php echo date("d-m-Y",strtotime($s->tanggal)); ?></td>
                                <td><?php echo $s->customer; ?></td>
                                <td><?php echo number_format($s->total,2,',','.'); ?></td>
                                <td>
                                    <a type="button" href="<?php echo base_url().'core/editjual/'.$s->id; ?>" class="btn-sm btn-primary">Detail</a>
                                    <a type="button" href="<?php echo base_url().'core/printfoj/'.$s->id; ?>" class="btn-sm btn-warning">Print</a>
                                    <a type="button" onclick="return remTable(<?php echo $s->id; ?>)" href="#" class="btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="panel-footer"><?=$pagination?></div>
                </div>
            </div>
        </div>
    </div>
</div>