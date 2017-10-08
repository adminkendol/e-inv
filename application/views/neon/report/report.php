<div class="panel panel-gradient">
    <div class="panel-heading">
        <div class="panel-title"><h4 class="title"><?php echo $headtitle; ?></h4></div>
        <div class="panel-options">
            <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <div>
                
            </div>
        </div>
    </div>
    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Faktur</th>
                <th>Nama Barang</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th><?php echo $typeReport; ?></th>
                <th><?php echo $target; ?></th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach($report as $s){ ?>
            <tr>
                <td><?php echo $s->faktur; ?></td>
                <td><?php echo $s->barang; ?></td>
                <td><?php echo $s->tanggal; ?></td>
                <td><?php echo $s->jumlah; ?></td>
                <td><?php echo number_format($s->total,2,',','.'); ?></td>
                <td><?php echo number_format($s->harga,2,',','.'); ?></td>
                <td><?php echo $s->target; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="panel-footer"><?=$pagination?></div>
</div>