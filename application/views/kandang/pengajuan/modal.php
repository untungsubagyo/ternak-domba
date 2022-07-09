<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="smallModalLabel">TAMBAH MITRA</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="row">
						<div class="col-md-12">


							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Mitra</label>
											<input type="hidden" id="pengajuan_id" name="pengajuan_id">
											<input type="hidden" id="mitra_id" name="mitra_id">
											<input type="text" id="nama_mitra" name="nama_mitra" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Tanggal Pengajuan</label>
											<input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" class="form-control" value='<?php echo date('Y-m-d');?>'>
										</div>
									</div>
								</div>
							</div>



							<div class="form-group form-float">
								<div class="form-line">
									<label class="">Alamat</label>
									<input type="text" id="alamat" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Luas Lahan</label>
											<input type="text" id="luas_lahan" name="luas_lahan" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Jumlah Pengajuan</label>
											<input type="text" id="jumlah_pengajuan" name="jumlah_pengajuan" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Jumlah Rekomendasi</label>
											<input type="text" id="jumlah_rekomendasi" name="jumlah_rekomendasi" class="form-control">
										</div>
									</div>
								</div>

							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Status</label>
											<select name="status" id="status" class="form-control">
												<option value="0">Belum Verifikasi</option>
												<option value="1">Sudah Verifikasi</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">BUKTI VERIFIKASI MITRA</label>
											<input type="file" id="bukti_verifikasi_mitra" class="form-control">
										</div>
									</div>
									<input type="hidden" name="foto_bukti_verifikasi_mitra" id="foto_bukti_verifikasi_mitra">
									<img src="/assets/images/no_image.jpg" onerror="this.src='/assets/images/no_image.jpg'" id="img_bukti_verifikasi_mitra" alt="" style="width:200px;">
								</div>
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Bukti Verifikasi Lahan</label>
											<input type="file" id="bukti_verifikasi_lahan" class="form-control">
										</div>
									</div>
									<input type="hidden" name="foto_bukti_verifikasi_lahan" id="foto_bukti_verifikasi_lahan">
									<img src="/assets/images/no_image.jpg" onerror="this.src='/assets/images/no_image.jpg'" id="img_bukti_verifikasi_lahan" alt="" style="width:200px;">
								</div>
							</div>
						</div>

					</div>


				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-link waves-effect" id="btnsimpan">SIMPAN</button>
				<button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
				<h4 class="modal-title" id="myModalLabel">Hapus <?php echo $judul; ?></h4>
			</div>
			<form class="form-horizontal">
				<div class="modal-body">

					<input type="hidden" name="id_hapus" id="id_hapus" value="">
					<div class="alert alert-warning">
						<p>Apakah Anda yakin mau memhapus <?php echo $judul; ?> ini?</p>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					<button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
