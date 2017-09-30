<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title><?php echo $title; ?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/css/bootcomplete.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <!--<link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/jquery.ui.dialog.css" type="text/css" />-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/jquery.ui.all.css" type="text/css" />
</head>

<body>
    <div id="infodlg" style="display:none"></div> 
    <div class="wrapper">
        <!--<div class="sidebar" data-color="purple" data-image="<?php echo base_url(); ?>assets/img/sidebar-1.jpg">-->
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar" data-color="red">
            <div class="logo">
                <a href="<?php echo base_url(); ?>" class="simple-text">
                    <?php echo $title; ?>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <?php foreach($menu as $m){ ?>
                    <li class="<?php if($menu_id==$m->menu_id){ echo "active";} else{ echo "notactive"; }  ?>">
                        <a href="<?php echo base_url()."core/".$m->url; ?>">
                            <i class="material-icons"><?php echo $m->icon; ?></i>
                            <p><?php echo $m->menu_name; ?></p>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> <?php echo $headtitle; ?> </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Another One</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="<?php echo base_url().'login/destroy'; ?>">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group  is-empty">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="content">
                <?php echo $contents; ?>
            </div>
            <!--<footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Company</a>
                            </li>
                            <li>
                                <a href="#">Portfolio</a>
                            </li>
                            <li>
                                <a href="#">Blog</a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>-->
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<!--<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>-->
<script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui-1.10.3.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="<?php echo base_url(); ?>assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="<?php echo base_url(); ?>assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url(); ?>assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.bootcomplete.js"></script>
<script src="<?php echo base_url(); ?>assets/carts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/carts/highcharts-3d.js"></script>
<script src="<?php echo base_url(); ?>assets/carts/modules/exporting.js"></script>
<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fire.js"></script>
<script src="<?php echo base_url(); ?>assets/js/charts.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       var path =window.location.pathname.split('/');
       var lastPath=path[path.length - 1];
       //var lastPath=path[path.length - 2];
       // Javascript method's body can be found in assets/js/demos.js
        //demo.initDashboardPageCharts();
        $('.tgl').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
        }).on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });
        if (lastPath=="dashboard"){
            dataDailySalesChart=<?php if($dataJual){echo $dataJual;} ?>;
            optionsDailySalesChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                chartPadding: {
                    top: 20,
                    right: 0,
                    bottom: 0,
                    left: 30
                }
            };
            var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);
            md.startAnimationForLineChart(dailySalesChart);
        
            dataCompletedTasksChart =$.parseJSON(JSON.stringify(<?php if($dataBeli){echo $dataBeli;} ?>));
            console.log("dash:"+JSON.stringify(dataCompletedTasksChart));
            optionsCompletedTasksChart = {
                low: 0,
                chartPadding: {
                    top: 20,
                    right: 0,
                    bottom: 0,
                    left: 0
                }
            };
            var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);
            md.startAnimationForPieChart(completedTasksChart);
            
            var datas= <?php if($dataBrgJual){echo $dataBrgJual;} ?>;
            var dom = 'dailyPieBrg';
            var judul = 'Penjualan perminggu';
            var pointer = 'Barang dalam pejualan';
            charts.pie(datas,dom,judul,pointer);
        }else if ((lastPath=="addbeli")||(lastPath=="savebeli")){
            //var sesId=parseInt($("#totallHidden").val());
            var id=0;
            $("#addBeli").click(function(){
                /*if(sesId!=0){
                    id=sesId;
                }*/
                id=parseInt(id) + 1;
                $.post("<?php echo base_url()."core/apiSelBrg"; ?>", {id: id}, function(result){
                    $("#tblBarang").append("<tr>\n\
                        <td>"+result+"</td>\n\
                        <td><input type='text' id='jumlah"+id+"' onChange='return refreshDetail("+id+")' name='jumlah[]' value='0' style='width:50px' placeholder='Jumlah Barang'></td>\n\
                        <td><span id='kat"+id+"'>?  </span></td>\n\
                        <td><span id='harga"+id+"'> ?</span></td>\n\
                        <td><span id='stok"+id+"'> ?</span></td>\n\
                        <td><span name='subtot' id='subtot"+id+"' class='control-label'> 0 </span><input type='hidden' id='subtotHid"+id+"' value=''></td>\n\
                        <td><a href='javascript:void(0);' class='remCF' idn='"+id+"'>Hapus</a></td>\n\
                    </tr>");
                });
            });
            $("#tblBarang").on('click','.remCF',function(){
                $(this).parent().parent().remove();
                values=0;
                $('span[name=subtot]').each( function () {
                    if (!isNaN(parseInt($(this).html()))){ 						   
                        values=values+parseInt($(this).html()); 
                    }
                }); 
                $("#totall").html(formatDollar(values));
                $("#totallHidden").val(values);
            });
        }
        
        //console.log("pie:"+JSON.stringify(datas));
    });
    function selBrg(id){
        $.post("<?php echo base_url()."core/apiSelBrg"; ?>", {id: id}, function(result){
            return result;
        });
    }
    function refreshDetail(id){
        var obatId=$("#lstobat"+id).val();
	var jumlah=$("#jumlah"+id).val();
	var total=0;
	var values = 0;
	if (isNaN($("#jumlah"+id).val())|| ($("#jumlah"+id).val()<0)){ 
            $( "#infodlg" ).html("Jumlah Tidak Sesuai !!!");
            $( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});
            $("#jumlah"+id).val('0');
            return false;
	} else {
            $.ajax({
                url:'<?php echo base_url(); ?>core/refreshDetail/',		 
                type:'POST',
                data:"obatId="+obatId+"&jumlah="+jumlah,
                success:function(data){
                    if(data!=''){
                        msg = data.split("|"); $('#kat'+id).html(msg[0]); $('#harga'+id).html(msg[1]);$('#stok'+id).html(msg[2]);$('#subtot'+id).html(msg[3]);$('#subtotHid'+id).val(msg[3]);
                        $('span[name=subtot]').each( function () {
                            if (!isNaN(parseInt($(this).html()))){ 						   
                                values=values+parseInt($(this).html()); 
                            }
                        }); 
                        $("#totall").html(formatDollar(values)); 
                        $("#totallHidden").val(values);
                    } else { 
                        $('#kat'+id).html('?'); $('#harga'+id).html('?'); $('#stok'+id).html('?'); $('#subtot'+id).html('0'); 
                    }
                }
            });
	} <!-- END OF ELSE -->
		
    }
    function formatDollar(num) {
        var p = num.toFixed(2).split(".");
	return "Rp." + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
            return  num + (i && !(i % 3) ? "," : "") + acc;
	}, "") + "." + p[1];
    }
    function confirmdlg(){
        if($("#supplier").val()==''){
            $( "#infodlg" ).html("Supplier Tidak Boleh Kosong");
            $( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});		
        } else if($("#faktur").val()==''){
            $( "#infodlg" ).html("Nomor Faktur Tidak Boleh Kosong");
            $( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});
        } else if($("#tanggal").val()==''){
            $( "#infodlg" ).html("Tanggal beli Tidak Boleh Kosong");
            $( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});		
	} else {
            $("#confirm").dialog({
                resizable: false,
		modal: true,
		title:"Info...",
		draggable: false,
		width: 'auto',
		height: 'auto',
		buttons: {
                    "Ya": function(){
                            save();   
                            $(this).dialog("close");
			},
                    "Tutup": function(){
                            $(this).dialog("close");
			}
		}
            });
	} <!-- END OF ELSE -->
    }
    function save(){
        console.log("post:"+$('#form_beli').serialize());
	$.ajax({
            url:'<?php echo base_url(); ?>core/actbeli/',		 
            type:'POST',
            data:$('#form_beli').serialize(),
            error:  function (xhr, status) {
                        alert(status);
                    },
            success:function(data){
                if(data!=''){
                    $( "#infodlg" ).html(data);
                    $( "#infodlg" ).dialog({ title:"Info...", draggable: false,modal: true});					 
		} else {
                    $( "#infodlg" ).html("Sukses Menyimpan Data... ");	
                    $( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true, buttons: {
                        "Ya":function(){
                                window.location="<?php echo base_url() ?>core/beli";
				$(this).dialog("close");
                            } 
                    }});						
		}
            }
	});		
    }
    function printDiv(divName) {
        var $this = $(this);
        var originalContent = $('body').html();
        var printArea = $this.parents('#'+divName).html();
        $('body').html(printArea);
        window.print();
        $('body').html(originalContent);
    }
    /*$('#barang').bootcomplete({
        url:'<?php echo base_url()."core/apibrg"; ?>',
        minLength:2
    });*/
    
     
</script>

</html>