      <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
  	<script>
	/*$(document).ready(function() {
            $( ".datepicker" ).datepicker();
	});*/
	function next(){
            $jum=$("#jumbeli").val();
            if($jum=='') {
                $( "#infodlg" ).html("Jumlah Tidak Boleh Kosong");
		$( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});		
		return false;
            } else if($jum <= 0 ){
                $( "#infodlg" ).html("Jumlah Tidak Boleh Kurang atau Lebih Kecil Dari NOL !!! ");
		$( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});	
		return false;
            } else if (isNaN($jum)){
                $( "#infodlg" ).html("Terjadi Kesalahan Input !!!! ");
		$( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});	
		return false;
            } else {
                $.ajax({
			url:'<?php echo base_url(); ?>core/nextForm/',		 
			type:'POST',
			data:$('#form_barang').serialize(),
			success:function(data){ 
			  	$("#contentform").html(data);
			 }
		});			
			return false;
            }
	}
	function refreshDetail(id){
		var obatId=$("#lstobat"+id).val();
		var jumlah=$("#jumlah"+id).val();
		var total=0;
		 var values = 0;
		if (isNaN($("#jumlah"+id).val())|| ($("#jumlah"+id).val()<0)){ 
			 $( "#infodlg" ).html("Jumlah Tidak Sesuai !!!");
			 $( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});
			 $("#jumlah"+id).val('0')
			 return false;
		} else {
			$.ajax({
				url:'<?php echo base_url(); ?>core/refreshDetail/',		 
				type:'POST',
				data:"obatId="+obatId+"&jumlah="+jumlah,
				success:function(data){ 
					 if(data!=''){
						msg = data.split("|"); $('#kat'+id).html(msg[0]); $('#harga'+id).html(msg[1]);$('#stok'+id).html(msg[2]);$('#subtot'+id).html(msg[3]);
						$('span[name=subtot]').each( function () {
								if (!isNaN(parseInt($(this).html()))){ 						   
									values=values+parseInt($(this).html()); }
								}); 
							$("#totall").html(formatDollar(values)); 
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
	function remTable(id){
		$( "#infodlg" ).html("Fitur ini masih dalam pembuatan");
		$( "#infodlg" ).dialog({ title:"Info...", draggable: false,modal: true});
	}
	function save(){
            console.log("post:"+$('#form_barang').serialize());
		$.ajax({
			url:'<?php echo base_url(); ?>core/actbeli/',		 
			type:'POST',
			data:$('#form_barang').serialize(),
                        error: function (xhr, status) {
                            alert(status);
                        },
			success:function(data){
                            	if(data!=''){
					 $( "#infodlg" ).html(data);
					 $( "#infodlg" ).dialog({ title:"Info...", draggable: false,modal: true});					 
				} else {
					$( "#infodlg" ).html("Sukses Menyimpan Data... ");	
					$( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true, buttons: {
					 "Ya": function(){
						  window.location="<?php echo base_url() ?>core/beli";
						  $(this).dialog("close");
					  } 
					 }});						
				}
			 }
		});		
	}
	function confirmdlg(){
            if($("#comboSupplier").val()==''){
                $( "#infodlg" ).html("Supplier Tidak Boleh Kosong");
		$( "#infodlg" ).dialog({ title:"Info...", draggable: false, modal: true});		
            } else if($("#faktur").val()==''){
                $( "#infodlg" ).html("Nomor Faktur Tidak Boleh Kosong");
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
			
	</script>
     
<form method="post" class="form1" id="form_barang" name="form_barang"/>
<div class="span6" style="width:100%">
                        <div class="well blue">
                            <div class="well-header">
                                <h5>Detail Pembelian</h5>
                                
                            </div>

                            <div class="well-content no-search">
                                   <div id="contentform">
                                    <div class="form_row">
                                        <label class="field_name">Jumlah Pembelian</label>
                                        <div class="field">
                                            <?php echo $table ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form_row">
                                        <div class="field">
                                            <a onclick="return next()" type="button" href="#" class="btn btn-primary">Next</a>
                                            <a href="<?php echo base_url()?>core/beli" type="button" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </div>
                                    </div>
                            	</div>
                        </div>
                    </div>

 
</form>
 <div id="confirm" style="display:none"> Anda Ingin Meyimpan data ini</div>     