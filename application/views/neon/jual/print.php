<style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}
.table > tbody > tr > .no-line {
    border-top: none;
}
.table > thead > tr > .no-line {
    border-bottom: none;
}
.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
<div class="container-fluid" id="printableArea" style="background-color:white;">
    <div class="row">
        <div class="col-md-12">
            <div class="invoice-title">
                <h2>Invoice</h2><h3 class="pull-right">Order # <?php echo $autofaktur; ?></h3>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <address>
                        <strong>Customer:</strong><br>
    			<?php echo $rec[0]->customer; ?><br>
                        <?php echo $rec[0]->alamat; ?><br>
                        <?php echo $rec[0]->phone1; ?><br>
                    </address>
    		</div>
    		<div class="col-md-6 text-right">
                    <address>
                        <strong>Tanggal Order:</strong><br>
    			<?php echo date("d-m-Y",strtotime($rec[0]->tanggal)); ?><br>
                    </address>
    		</div>
            </div>
        </div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Order summary</strong></h3>
    		</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td class="text-center">Barang</td>
                                    <td class="text-center">Jumlah</td>
                                    <td class="text-center">Kategori</td>
                                    <td class="text-center">@harga</td>
                                    <td class="text-center">Stok</td>
                                    <td class="text-center">Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(sizeof($rec)>0){  
                                                if (sizeof($recOrder)>0){ 
                                                    foreach($recOrder as $ro){ ?>
                                    <tr>
                                        <td class="text-center"><?php echo $ro->nama; ?></td>
                                        <td class="text-center"><?php echo $ro->jumlah; ?></td>
                                        <td class="text-center"><?php echo $ro->kategori; ?></td>
                                        <td class="text-center"><?php echo $ro->harga_beli; ?></td>
                                        <td class="text-center"><?php echo $ro->stok; ?></td>
                                        <td class="text-center"><?php echo $ro->jumlah * $ro->harga_beli; ?></td>
                                    </tr>
                                                <?php  }
                                                }
                                        
                                     } ?>
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">RP.<?php echo number_format($rec[0]->total,2,',','.'); ?></td>
    				</tr>
    				<tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Pajak</strong></td>
                                    <td class="no-line text-right"></td>
    				</tr>
    				<tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">RP.<?php echo number_format($rec[0]->total,2,',','.'); ?></td>
    				</tr>
                            </tbody>
    			</table>
                    </div>
    		</div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<button type="button" onclick="printDiv('printableArea')" id="simpan" class="btn btn-primary pull-left">Cetak</button>
<a href="<?php echo base_url().'core/jual';?>" type="button" id="cancel" class="btn btn-danger pull-left">Batal</a>