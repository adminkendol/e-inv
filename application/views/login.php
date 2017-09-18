<?php
    $username=set_value('username');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">Halaman Login</h4>
                    <p class="category">Masukan user dan password</p>
                </div>
                <div class="card-content">
                    <form method="post" action="<?php echo base_url().'login/enter';?>">
                        <?php
                        if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span><?php echo validation_errors();?></span>
                            </div>
                        <?php } if($valid=="1"){?>
                            <div class="alert alert-warning">
                                <button type="button" aria-hidden="true" class="close">×</button>
                                <span>Password salah</span>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Username</label>
                                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <label class="control-label">Password</label>
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group label-floating">
                                    <button type="submit" class="btn btn-danger pull-left">Login</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
