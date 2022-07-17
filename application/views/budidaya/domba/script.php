<script>
	$(function() {
		tampil_data(); //pemanggilan fungsi tampil farm.

		$('.dataku').dataTable({
			columnDefs: [{
				orderable: false,
				targets: 6
			}],
			order: [
				[0, 'asc']
			]
		});

		//fungsi tampil farm
		function tampil_data() {
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>budidaya/domba/get_all',
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<tr>' +
							'<td style="text-align:center;">' + data[i].domba_id + '</td>' +
							'<td style="text-align:center;">' + data[i].tanggal_masuk + '</td>' +
							'<td style="text-align:right;">' + data[i].berat_saat_masuk.replace(".",",") + '</td>' +
							'<td style="text-align:right;">' + formatRupiah(data[i].harga_saat_masuk,'Rp. ') + '</td>' +
							'<td style="text-align:center;">' + data[i].tanggal_panen + '</td>' +
							'<td style="text-align:right;">' + data[i].berat_saat_panen.replace(".",",") + '</td>' +
							'<td style="text-align:right;">' + formatRupiah(data[i].harga_saat_panen,'Rp. ') + '</td>' +

							'<td style="text-align:center;">' +
							'<div>' +
							'<a href="javascript:;" class="btn btn-warning waves-effect item_edit" data="' + data[i].domba_id + '"><i class="material-icons">edit</i></a>' + ' ' +
							'<a href="javascript:;" class="btn btn-danger waves-effect item_hapus" data="' + data[i].domba_id + '"><i class="material-icons">delete</i></a>' +
							'</div>' +
							'</td>' +
							'</tr>';
					}
					$('#show_data').html(html);
				}

			});
		}
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
		//GET UPDATE
		$('#show_data').on('click', '.item_edit', function() {
			var id = $(this).attr('data');

			$.ajax({
				type: "GET",
				url: "<?php echo base_url('budidaya/domba/get_data') ?>",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					$('#domba_id').val(data.domba_id);
					$('#domba_id_edit').val(data.domba_id);
					$('#nama').val(data.nama);
					$('#tempat_lahir').val(data.tempat_lahir);
					$('#tgl_lahir').val(data.tgl_lahir);
					$('#alamat').val(data.alamat);
					$('#jkel').val(data.jkel).change();
					$('#no_hp').val(data.no_hp);
					$('#username').val(data.username);
					$('#password').val("");
					$('#foto_ktp').val(data.foto_ktp);
					$('#foto_sertifikat').val(data.foto_sertifikat);
					$('#status').val(data.status).change();
					$('#img_ktp').prop("src", "/assets/upload/mitra/ktp/" + data.foto_ktp);
					$('#img_sertifikat').prop("src", "/assets/upload/mitra/sertifikat/" + data.foto_sertifikat);



					$('#addModal').modal('show');
					$('#domba_id').focus();
				}
			});
			return false;
		});

		$('#ktp').on('change',fileUploadKTP);
		$('#sertifikat').on('change',fileUploadSertifikat);

		function fileUploadKTP(event) {
			//mendapatkan file yang dipilih
			files = event.target.files;

			//memeriksa data form 
			var data = new FormData();

			//file data is presented as an array
			for (var i = 0; i < files.length; i++) {
				var file = files[i];
				if (!file.type.match('image.*')) {
					//memeriksa format file
					$("#info_ktp").html("Silakan pilih file gambar.");
				} else if (file.size > 1048576) {
					//memeriksa ukuran file (dalam bytes)
					$("#info_ktp").html("Maaf, file Anda terlalu besar (melebihi 1 MB)");
				} else {
					//menambahkan file yang dapat diunggah ke objek FormData
					data.append('file', file, file.name);

					//membuat XMLHttpRequest baru
					var xhr = new XMLHttpRequest();

					//data file post yang untuk diupload
					xhr.open('POST', '/budidaya/domba/upload_ktp', true);
					xhr.send(data);
					xhr.onload = function() {
						//mendapatkan respon dan menunjukkan status upload
						var response = JSON.parse(xhr.responseText);
						
						if (xhr.status === 200 && response.status == 'ok') { 
							$('#foto_ktp').val(response.name);
							$('#img_ktp').prop('src','/assets/upload/mitra/ktp/'+response.name);
						} else if (response.status == 'type_err') {
							 
						} else {
							 
						}
					};
				}
			}
		}

		 
		function fileUploadSertifikat(event) {
			//mendapatkan file yang dipilih
			files = event.target.files;

			//memeriksa data form 
			var data = new FormData();

			//file data is presented as an array
			for (var i = 0; i < files.length; i++) {
				var file = files[i];
				if (!file.type.match('image.*')) {
					//memeriksa format file
					$("#info_ktp").html("Silakan pilih file gambar.");
				} else if (file.size > 1048576) {
					//memeriksa ukuran file (dalam bytes)
					$("#info_ktp").html("Maaf, file Anda terlalu besar (melebihi 1 MB)");
				} else {
					//menambahkan file yang dapat diunggah ke objek FormData
					data.append('file', file, file.name);

					//membuat XMLHttpRequest baru
					var xhr = new XMLHttpRequest();

					//data file post yang untuk diupload
					xhr.open('POST', '/budidaya/domba/upload_sertifikat', true);
					xhr.send(data);
					xhr.onload = function() {
						//mendapatkan respon dan menunjukkan status upload
						var response = JSON.parse(xhr.responseText);
						
						if (xhr.status === 200 && response.status == 'ok') { 
							$('#foto_sertifikat').val(response.name);
							$('#img_sertifikat').prop('src','/assets/upload/mitra/sertifikat/'+response.name);
						} else if (response.status == 'type_err') {
							 
						} else {
							 
						}
					};
				}
			}
		}

		$('#btnTambah').on('click', function() {
			$('#domba_id_edit').val("");
			$('#domba_id').val("");
			$('#nama').val("");
			$('[name="tempat_lahir"]').val("");
			$('[name="tgl_lahir"]').val("");
			$('#alamat').val("");
			$('#jkel').val("").change();
			$('#status').val("0").change();
			$('#no_hp').val("");
			$('#username').val("");
			$('#password').val("");
			$('#addModal').modal('show');
		});

		//GET HAPUS
		$('#show_data').on('click', '.item_hapus', function() {
			var id = $(this).attr('data');
			$('#hapusModal').modal('show');
			$('[name="id_hapus"]').val(id);
		});

		//Simpan farm
		$('#btnsimpan').on('click', function() {
			var domba_id_edit = $('#domba_id_edit').val();
			var domba_id = $('#domba_id').val();
			var nama = $('#nama').val();
			var tempat_lahir = $('#tempat_lahir').val();
			var tgl_lahir = $('#tgl_lahir').val();
			var alamat = $('#alamat').val();
			var jkel = $('#jkel').val();
			var no_hp = $('#no_hp').val();
			var username = $('#username').val();
			var password = $('#password').val();
			var status = $('#status').val();
			var foto_ktp = $('#foto_ktp').val();
			var foto_sertifikat = $('#foto_sertifikat').val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('budidaya/domba/save') ?>",
				dataType: "JSON",
				data: {
					domba_id_edit: domba_id_edit,
					domba_id: domba_id,
					nama: nama,
					tempat_lahir: tempat_lahir,
					tgl_lahir: tgl_lahir,
					alamat: alamat,
					jkel: jkel,
					no_hp: no_hp,
					username: username,
					password: password,
					status: status,
					foto_ktp: foto_ktp,
					foto_sertifikat: foto_sertifikat,
				},
				success: function(data) {

					tampil_data();
				}
			});
			$('#addModal').modal('toggle');
			tampil_data();
		});



		//Hapus farm
		$('#btn_hapus').on('click', function() {
			var id = $('#id_hapus').val();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url('budidaya/domba/delete') ?>",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
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
