<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">TAMBAH MITRA</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group form-float">
								<div class="form-line">

									<input type="hidden" id="mitra_id_edit">
									<input type="text" id="mitra_id" class="form-control">
									<label class="form-label">Nomor Induk Mitra</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-float">
								<div class="form-line">

								<input type="text" id="nama" class="form-control">
                            <label class="form-label">Nama</label>
								</div>
							</div>
						</div>
					</div>
                    

					<div class="row">
						<div class="col-md-6">
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control">
									<label class="form-label">Tempat Lahir</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-float">
								<div class="form-line">
									<input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control">
									<label class="form-label">Tanggal Lahir</label>
								</div>
							</div>
						</div>
					</div>
                    
                    
                     
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="alamat" class="form-control">
                            <label class="form-label">Alamat</label>
                        </div>
                    </div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group form-float">
								<select name="jkel" id="jkel" class="form-control">
									<option value="">:: Pilih Jenis Kelamin ::</option>
									<option value="L">Pria</option>
									<option value="P">Wanita</option>
								</select> 
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" id="no_hp" class="form-control">
									<label class="form-label">No. HP</label>
								</div>
							</div>
						</div>
					</div>
                    
                    <div class="row">
						<div class="col-md-6">
							<div class="form-group form-float">
								<div class="form-line">
									<input type="text" id="username" class="form-control">
									<label class="form-label">Username</label>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group form-float">
								<div class="form-line">
									<input type="password" id="password" class="form-control">
									<label class="form-label">Password</label>
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
                <h4 class="modal-title" id="myModalLabel">Hapus <?php echo $judul;?></h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="id_hapus" id="id_hapus" value="">
                    <div class="alert alert-warning">
                        <p>Apakah Anda yakin mau memhapus <?php echo $judul;?> ini?</p>
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