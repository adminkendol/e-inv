<?php
//$exp=date('d-m-Y',strtotime("+1 year"));
//print_r($autofaktur);die;
$tanggal=date("d-m-Y");
$total="Rp.0.00";
if(sizeof($rec)==0){
    $idRec=set_value('idRec');
    $customer=set_value('customer');
    $ktp=set_value('ktp');
    $alamat=set_value('alamat');
    $phone1=set_value('phone1');
    $phone2=set_value('phone2');
    $email=set_value('email');
}else{
    //print_r($rec);die;
    $idRec=$rec[0]->id;
    $autofaktur=$rec[0]->faktur;
    $tanggal=date("d-m-Y",strtotime($rec[0]->tanggal));
    $customer=$rec[0]->customer;
    $ktp=$rec[0]->ktp;
    $alamat=$rec[0]->alamat;
    $phone1=$rec[0]->phone1;
    $phone2=$rec[0]->phone2;
    $email=$rec[0]->email;
    $total="Rp.".number_format($rec[0]->total,2,',','.');
 }
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Form Jual</h4>
                    <p class="category">Lengkapi isi field</p>
                </div>
                <div class="card-content">
                    <form method="post" action="" id="form_beli">
                        <?php
                        if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><?php echo validation_errors();?></span>
                            </div>
                        <?php    
                        }if($valid=="1"){?>
                            <div class="alert alert-warning">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><?php echo $valdata; ?></span>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Faktur</label>
                                    <input type="text" class="form-control" name="faktur" id="faktur" value="<?php echo $autofaktur; ?>" readonly >
                                    <input type="hidden" id="totallHidden" name="totallHidden" value="">
                                    <input type="hidden" id="idRec" name="idRec" value="<?php echo $idRec;?>">
                                    <input type="hidden" id="sesbeli" name="sesbeli" value="<?php echo date("YmdHms"); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tanggal Beli</label>
                                    <input type="text" class="form-control tgl" name="tanggal" id="tanggal" value="<?php echo $tanggal; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nama Customer</label>
                                    <input type="text" class="form-control" name="customer" id="customer" value="<?php echo $customer; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">KTP / SIM</label>
                                    <input type="text" class="form-control" name="ktp" id="ktp" value="<?php echo $ktp; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Alamat Customer</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $alamat; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Telepon 1</label>
                                    <input type="text" class="form-control" name="phone1" id="phone1" value="<?php echo $phone1; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Telepon 2</label>
                                    <input type="text" class="form-control" name="phone2" id="phone2" value="<?php echo $phone2; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Email Customer</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                                </div>
                            </div>
                        </div>
                        <?php if(sizeof($rec)==0){ ?> 
                        <button id="addBeli" type="button" class="btn btn-info">
                            <span class="glyphicon glyphicon-plus"></span> Barang
                        </button>
                        <?php } ?>
                        <div class="clearfix"></div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                    <th>Kategori</th>
                                    <th>@harga</th>
                                    <th>Stok</th>
                                    <th>Total</th>
                                    <th></th>
                                </thead>
                                <tbody id="tblBarang">
                                    <?php if(sizeof($rec)>0){  
                                                if (sizeof($recOrder)>0){ 
                                                    foreach($recOrder as $ro){ ?>
                                    <tr>
                                        <td><?php echo $ro->nama; ?></td>
                                        <td><?php echo $ro->jumlah; ?></td>
                                        <td><?php echo $ro->kategori; ?></td>
                                        <td><?php echo $ro->harga_beli; ?></td>
                                        <td><?php echo $ro->stok; ?></td>
                                        <td><?php echo $ro->jumlah * $ro->harga_beli; ?></td>
                                    </tr>
                                                <?php  }
                                                }
                                        
                                     } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a type="button" id="totall" href="#" class="btn btn-warning pull-right"><?php echo $total; ?></a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <button type="button" onclick="return confirmdlg()" id="simpan" class="btn btn-primary pull-left">Simpan</button>
                        <a href="<?php echo base_url().'core/jual';?>" type="button" id="cancel" class="btn btn-danger pull-left">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="confirm" style="display:none"> Anda Ingin Meyimpan data ini</div>