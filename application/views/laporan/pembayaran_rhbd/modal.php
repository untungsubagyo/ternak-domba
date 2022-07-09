<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="smallModalLabel">TAMBAH MITRA</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">

											<input type="hidden" id="mitra_id_edit">
											<label class="">Nomor Induk Mitra</label>
											<input type="text" id="mitra_id" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Nama</label>
											<input type="text" id="nama" class="form-control">
										</div>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Tempat Lahir</label>
											<input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Tanggal Lahir</label>
											<input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control">
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
								<div class="col-md-6">
									<div class="form-group form-float">
										<label class="">Jenis Kelamin</label>
										<select name="jkel" id="jkel" class="form-control">
											<option value="">:: Pilih Jenis Kelamin ::</option>
											<option value="L">Pria</option>
											<option value="P">Wanita</option>
										</select>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Email</label>
											<input type="text" id="email" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">No. HP</label>
											<input type="text" id="no_hp" class="form-control">
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Username</label>
											<input type="text" id="username" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Password</label>
											<input type="password" id="password" class="form-control">
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
						</div>
						<div class="col-md-4">
							<div class="col-md-12">
								<div class="form-group form-float">
									<div class="form-line">
										<label class="">KTP</label>
										<input type="file" id="ktp" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<input type="hidden" name="foto_ktp" id="foto_ktp">
								<img src="/assets/images/no_image.jpg" onerror="this.src='/assets/images/no_image.jpg'" id="img_ktp" alt="" style="width:200px;">
							</div>
							<div class="col-md-12">
								<div class="form-group form-float">
									<div class="form-line">
										<label class="">Sertifikat Tanah</label>
										<input type="file" id="sertifikat" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-12">
							<input type="hidden" name="foto_sertifikat" id="foto_sertifikat">
								<img src="/assets/images/no_image.jpg" onerror="this.src='/assets/images/no_image.jpg'" id="img_sertifikat" alt="" style="width:200px;">
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
