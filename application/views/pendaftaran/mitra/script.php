<script>
$(function () { 
    tampil_data();	//pemanggilan fungsi tampil farm.
    
    $('.dataku').dataTable({
        columnDefs: [
			{ orderable: false, targets: 6 }
		],
		order: [[0, 'asc']]
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
                              	'<td style="text-align:center;">'+data[i].mitra_id+'</td>'+
								'<td>'+data[i].nama+'</td>'+
								'<td>'+data[i].tempat_lahir+"/"+data[i].tgl_lahir+'</td>'+
								'<td>'+data[i].jkel+'</td>'+
								'<td>'+data[i].no_hp+'</td>'+
								'<td>'+data[i].alamat+'</td>'+
                             
                            '<td style="text-align:center;">'+
                            '<div>'+
                                '<a href="javascript:;" class="btn btn-warning waves-effect item_edit" data="'+data[i].mitra_id+'"><i class="material-icons">edit</i></a>'+' '+
                                '<a href="javascript:;" class="btn btn-danger waves-effect item_hapus" data="'+data[i].mitra_id+'"><i class="material-icons">delete</i></a>'+
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
            url  : "<?php echo base_url('pendaftaran/mitra/get_data')?>",
            dataType : "JSON",
            data : {id:id},
            success: function(data){
				$('#mitra_id').val(data.mitra_id);
				$('#mitra_id_edit').val(data.mitra_id);
				$('#nama').val(data.nama);
				$('#tempat_lahir').val(data.tempat_lahir);
				$('#tgl_lahir').val(data.tgl_lahir);
				$('#alamat').val(data.alamat);
				$('#jkel').val(data.jkel).change(); 
				$('#no_hp').val(data.no_hp);
				$('#username').val(data.username);
				$('#password').val("");
                
				$('#addModal').modal('show');
               
            }
        });
        return false;
    });

	$('#btnTambah').on('click',function(){
		$('#mitra_id_edit').val("");
		$('#mitra_id').val("");
		$('#nama').val("");
		$('[name="tempat_lahir"]').val("");
		$('[name="tgl_lahir"]').val("");
		$('#alamat').val("");
		$('#jkel').val("").change();
		$('#no_hp').val("");
		$('#username').val("");
		$('#password').val("");
		$('#addModal').modal('show');
	});

    //GET HAPUS
    $('#show_data').on('click','.item_hapus',function(){
        var id=$(this).attr('data');
        $('#hapusModal').modal('show');
        $('[name="id_hapus"]').val(id);
    });
	
    //Simpan farm
    $('#btnsimpan').on('click',function(){
        var mitra_id_edit=$('#mitra_id_edit').val();
        var mitra_id=$('#mitra_id').val();
        var nama=$('#nama').val();
        var tempat_lahir=$('#tempat_lahir').val();
        var tgl_lahir=$('#tgl_lahir').val();
        var alamat=$('#alamat').val();
        var jkel=$('#jkel').val();
        var no_hp=$('#no_hp').val();
        var username=$('#username').val();
        var password=$('#password').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('pendaftaran/mitra/save')?>",
            dataType : "JSON",
            data : {
				mitra_id_edit:mitra_id_edit , 
				mitra_id:mitra_id , 
				nama:nama, 
				tempat_lahir:tempat_lahir,
				tgl_lahir:tgl_lahir,
				alamat:alamat,
				jkel:jkel,
				no_hp:no_hp,
				username:username,
				password:password,
			},
            success: function(data){ 
               
                tampil_data();
            }
        });
		$('#addModal').modal('toggle');
		tampil_data();
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
        url  : "<?php echo base_url('pendaftaran/mitra/delete')?>",
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
