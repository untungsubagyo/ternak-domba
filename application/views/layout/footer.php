<!-- Jquery Core Js -->
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap Core Js -->
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/bootstrap/js/bootstrap.js"></script>
<!-- Select Plugin Js -->
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/adminbsb/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Custom Js -->
<script src="<?php echo base_url();?>assets/template/adminbsb/js/admin.js"></script>

<script>
$(function () { 
    tampil_data();	//pemanggilan fungsi tampil farm.
    
    $('#dataku').dataTable({
        "columnDefs": [{ "orderable": false, "targets": 2 }]
    });
     
    //fungsi tampil farm
    function tampil_data(){
        $.ajax({
            type  : 'ajax',
            url   : '<?php echo base_url()?>pendaftaran/mitra/get_all',
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                              '<td>'+data[i].kode_farm+'</td>'+
                            '<td>'+data[i].nama_farm+'</td>'+
                             
                            '<td style="text-align:center;">'+
                            '<div>'+
                                '<a href="javascript:;" class="btn btn-warning waves-effect item_edit" data="'+data[i].id_farm+'"><i class="material-icons">edit</i></a>'+' '+
                                '<a href="javascript:;" class="btn btn-danger waves-effect item_hapus" data="'+data[i].id_farm+'"><i class="material-icons">delete</i></a>'+
                            '</div>'+
                            '</td>'+
                            '</tr>';
                }
                $('#show_data').html(html);
            }

        });
    }

    //GET UPDATE
    $('#show_data').on('click','.item_edit',function(){
        var id=$(this).attr('data');
        
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('identifikasi/farm/get_data')?>",
            dataType : "JSON",
            data : {id:id},
            success: function(data){
                $.each(data,function(id_farm, kode_farm, nama_farm, id_jenis_ternak){
                    $('#editModal').modal('show');
                    $('[name="id_farm_edit"]').val(data.id_farm);
                    $('[name="kode_farm_edit"]').val(data.kode_farm);
                    $('[name="nama_farm_edit"]').val(data.nama_farm);
                    $('[name=jenis_ternak_edit]' ).val(data.id_jenis_ternak);
                    $('#jenis_ternak_edit').selectpicker('refresh')
                });
            }
        });
        return false;
    });


    //GET HAPUS
    $('#show_data').on('click','.item_hapus',function(){
        var id=$(this).attr('data');
        $('#hapusModal').modal('show');
        $('[name="id_hapus"]').val(id);
    });

    //Simpan farm
    $('#btnsimpan').on('click',function(){
        var kode_farm=$('#kode_farm').val();
        var nama_farm=$('#nama_farm').val();
        var jenis_ternak=$('#jenis_ternak').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('identifikasi/farm/simpan_data')?>",
            dataType : "JSON",
            data : {kode_farm:kode_farm , nama_farm:nama_farm, jenis_ternak:jenis_ternak},
            success: function(data){ 
                $('[name="kode_farm"]').val("");
                $('[name="nama_farm"]').val("");
                $('[name="jenis_ternak"]').val("");
                $('#addModal').modal('hide');
                tampil_data();
            }
        });
        return false;
    });

    //Update farm
    $('#btnupdate').on('click',function(){
        var id_farm=$('#id_farm_edit').val();
        var kode_farm=$('#kode_farm_edit').val();
        var nama_farm=$('#nama_farm_edit').val();
        var jenis_ternak=$('#jenis_ternak_edit').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('identifikasi/farm/update_data')?>",
            dataType : "JSON",
            data : {id_farm:id_farm ,kode_farm:kode_farm , nama_farm:nama_farm, jenis_ternak:jenis_ternak},
            success: function(data){
                 
                $('[name="id_farm_edit"]').val("");
                $('[name="kode_farm_edit"]').val("");
                $('[name="nama_farm_edit"]').val("");
                $('[name="jenis_ternak_edit"]').val("");
                $('#editModal').modal('hide');
                tampil_data();
            }
        });
        return false;
    });

    //Hapus farm
    $('#btn_hapus').on('click',function(){
        var id=$('#id_hapus').val();
         
        $.ajax({
        type : "POST",
        url  : "<?php echo base_url('identifikasi/farm/hapus_data')?>",
        dataType : "JSON",
                data : {id: id},
                success: function(data){ 
                        $('#hapusModal').modal('hide');
                        tampil_data();
                }
            });
            return false;
        });

});

 
</script>

</body>

</html>