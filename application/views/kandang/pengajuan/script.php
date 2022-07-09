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
				url: '<?php echo base_url() ?>kandang/pengajuan/get_all',
				async: false,
				dataType: 'json',
				success: function(data) {
					var html = '';
					var i;
					for (i = 0; i < data.length; i++) {
						html += '<tr>' +
							'<td style="text-align:center;">' + data[i].tanggal_pengajuan + '</td>' +
							'<td>' + data[i].nama + '</td>' +
							'<td>' + data[i].alamat + '</td>' +
							'<td>' + data[i].luas_lahan + '</td>' +
							'<td>' + data[i].jumlah_pengajuan + '</td>' +
							'<td>' + data[i].jumlah_rekomendasi + '</td>' +
							'<td>' + data[i].status + '</td>' +

							'<td style="text-align:center;">' +
							'<div>' +
							'<a href="javascript:;" class="btn btn-warning waves-effect item_edit" data="' + data[i].pengajuan_id + '"><i class="material-icons">edit</i></a>' + ' ' +
							'<a href="javascript:;" class="btn btn-danger waves-effect item_hapus" data="' + data[i].pengajuan_id + '"><i class="material-icons">delete</i></a>' +
							'</div>' +
							'</td>' +
							'</tr>';
					}
					$('#show_data').html(html);
				}

			});
		}

		//GET UPDATE
		$('#show_data').on('click', '.item_edit', function() {
			var id = $(this).attr('data');

			$.ajax({
				type: "GET",
				url: "<?php echo base_url('kandang/pengajuan/get_data') ?>",
				dataType: "JSON",
				data: {
					id: id
				},
				success: function(data) {
					$('#pengajuan_id').val(data.pengajuan_id); 
					$('#nama_mitra').val(data.nama);
					$('#mitra_id').val(data.mitra_id);
					$('#luas_lahan').val(data.luas_lahan);
					$('#jumlah_pengajuan').val(data.jumlah_pengajuan);
					$('#jumlah_rekomendasi').val(data.jumlah_rekomendasi);

					$('#status').val(data.status).change();
					$('#bukti_ver_lahan').prop("src", "/assets/upload/pengajuan/ver_mitra/" + data.bukti_ver_lahan);
					$('#bukti_ver_mitra').prop("src", "/assets/upload/pengajuan/ver_lahan/" + data.bukti_ver_mitra);

					$('#addModal').modal('show');
					$('#pengajuan_id').focus();
				}
			});
			return false;
		});

		$('#bukti_ver_mitra').on('change', fileUploadVerMitra);
		$('#bukti_ver_lahan').on('change', fileUploadVerLahan);

		function fileUploadVerMitra(event) {
			//mendapatkan file yang dipilih
			files = event.target.files;

			//memeriksa data form 
			var data = new FormData();

			//file data is presented as an array
			for (var i = 0; i < files.length; i++) {
				var file = files[i];
				if (!file.type.match('image.*')) {
					//memeriksa format file
					$("#info_ver_mitra").html("Silakan pilih file gambar.");
				} else if (file.size > 1048576) {
					//memeriksa ukuran file (dalam bytes)
					$("#info_ver_mitra").html("Maaf, file Anda terlalu besar (melebihi 1 MB)");
				} else {
					//menambahkan file yang dapat diunggah ke objek FormData
					data.append('file', file, file.name);

					//membuat XMLHttpRequest baru
					var xhr = new XMLHttpRequest();

					//data file post yang untuk diupload
					xhr.open('POST', '/kandang/pengajuan/upload_ver_mitra', true);
					xhr.send(data);
					xhr.onload = function() {
						//mendapatkan respon dan menunjukkan status upload
						var response = JSON.parse(xhr.responseText);

						if (xhr.status === 200 && response.status == 'ok') {
							$('#foto_ver_mitra').val(response.name);
							$('#img_ver_mitra').prop('src', '/assets/upload/pengajuan/ver_mitra/' + response.name);
						} else if (response.status == 'type_err') {

						} else {

						}
					};
				}
			}
		}


		function fileUploadVerLahan(event) {
			//mendapatkan file yang dipilih
			files = event.target.files;

			//memeriksa data form 
			var data = new FormData();

			//file data is presented as an array
			for (var i = 0; i < files.length; i++) {
				var file = files[i];
				if (!file.type.match('image.*')) {
					//memeriksa format file
					$("#info_ver_mitra").html("Silakan pilih file gambar.");
				} else if (file.size > 1048576) {
					//memeriksa ukuran file (dalam bytes)
					$("#info_ver_mitra").html("Maaf, file Anda terlalu besar (melebihi 1 MB)");
				} else {
					//menambahkan file yang dapat diunggah ke objek FormData
					data.append('file', file, file.name);

					//membuat XMLHttpRequest baru
					var xhr = new XMLHttpRequest();

					//data file post yang untuk diupload
					xhr.open('POST', '/kandang/pengajuan/upload_ver_lahan', true);
					xhr.send(data);
					xhr.onload = function() {
						//mendapatkan respon dan menunjukkan status upload
						var response = JSON.parse(xhr.responseText);

						if (xhr.status === 200 && response.status == 'ok') {
							$('#foto_ver_lahan').val(response.name);
							$('#img_ver_lahan').prop('src', '/assets/upload/pengajuan/ver_lahan/' + response.name);
						} else if (response.status == 'type_err') {

						} else {

						}
					};
				}
			}
		}

		$('#btnTambah').on('click', function() { 
			$('#pengajuan_id').val("");
			$('#nama').val("");
			$('#mitra_id').val("");
			$('#luas_lahan').val("");
			$('#jumlah_pengajuan').val("");
			$('#jumlah_rekomendasi').val("");
			$('#status').val("0").change();
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
			var pengajuan_id = $('#pengajuan_id').val();
			var mitra_id = $('#mitra_id').val();
			var tanggal_pengajuan = $('#tanggal_pengajuan').val();
			var alamat = $('#alamat').val();
			var luas_lahan = $('#luas_lahan').val();
			var jumlah_pengajuan = $('#jumlah_pengajuan').val();
			var jumlah_rekomendasi = $('#jumlah_rekomendasi').val();

			var status = $('#status').val();
			var foto_ver_mitra = $('#foto_ver_mitra').val();
			var foto_ver_lahan = $('#foto_ver_lahan').val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('kandang/pengajuan/save') ?>",
				dataType: "JSON",
				data: { 
					pengajuan_id: pengajuan_id,
					mitra_id: mitra_id,
					tanggal_pengajuan: tanggal_pengajuan,
					alamat: alamat,
					luas_lahan: luas_lahan,
					jumlah_pengajuan: jumlah_pengajuan,
					jumlah_rekomendasi: jumlah_rekomendasi,
					status: status,
					foto_ver_mitra: foto_ver_mitra,
					foto_ver_lahan: foto_ver_lahan,
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
				url: "<?php echo base_url('kandang/pengajuan/delete') ?>",
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

		$("#nama_mitra").coolautosuggest({
			url: "<?php echo base_url(); ?>pendaftaran/mitra/get_nama/",
			width:400,
			showDescription: true,
			onSelected: function(result) {
				// Check if the result is not null
				if (result != null) {
					$('#mitra_id').val(result.mitra_id);
				}
			}
		});
	});
</script>

</body>

</html>
