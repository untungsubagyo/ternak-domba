<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">TAMBAH FARM/PETERNAKAN</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group form-float">
                        <div class="form-line">

                            <input type="text" id="kode_farm" class="form-control">
                            <label class="form-label">Kode Farm</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" id="nama_farm" class="form-control">
                            <label class="form-label">Nama Farm</label>
                        </div>
                    </div>
                    <input type="hidden" id="jenis_ternak" value='1'>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" id="btnsimpan">SIMPAN</button>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">EDIT FARM/PETERNAKAN</h4>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="id_farm_edit" name="id_farm_edit" value="" class="form-control">
                    <div class="form-group">
                        <label class="form-label">Kode Farm</label>
                        <div class="form-line">
                            <input type="text" id="kode_farm_edit" name="kode_farm_edit" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Nama Farm</label>
                        <div class="form-line">
                            <input type="text" id="nama_farm_edit" name="nama_farm_edit" class="form-control">
                        </div>
                    </div>
                    <input type="hidden" id="jenis_ternak_edit" name="jenis_ternak_edit" value='1'>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" id="btnupdate">SIMPAN</button>
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
                <h4 class="modal-title" id="myModalLabel">Hapus Farm</h4>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">

                    <input type="hidden" name="id_hapus" id="id_hapus" value="">
                    <div class="alert alert-warning">
                        <p>Apakah Anda yakin mau memhapus Farm ini?</p>
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