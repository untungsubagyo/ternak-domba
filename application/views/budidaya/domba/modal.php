<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-small" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="smallModalLabel">TAMBAH DOMBA</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group form-float">
								<div class="form-line">
									<input type="hidden" id="domba_id">
									<label class="">Tanggal Sheep In</label>
									<input type="date" id="tanggal_masuk" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Berat saat Sheep In</label>
											<input type="text" id="berat_saat_masuk" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Harga saat Sheep In</label>
											<input type="text" id="harga_saat_masuk" class="form-control">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group form-float">
								<div class="form-line"> 
									<label class="">Tanggal Panen</label>
									<input type="date" id="tanggal_panen" class="form-control">
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Berat saat Panen</label>
											<input type="text" id="berat_saat_panen" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group form-float">
										<div class="form-line">
											<label class="">Harga saat Panen</label>
											<input type="text" id="harga_saat_panen" class="form-control">
										</div>
									</div>
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
