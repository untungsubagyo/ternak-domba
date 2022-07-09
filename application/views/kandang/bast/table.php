<section class="content">
    <div class="container-fluid">

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <?php echo $judul; ?>
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="tool" style='padding-bottom:10px;'>
                            <!-- <button type="button" class="btn  bg-blue waves-effect" id="btnTambah">TAMBAH</button> -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable dataku ">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width:100px !important">Tanggal BAST</th>
                                        <th style="text-align:center;">Nama Mitra</th>
                                        <th style="text-align:center;">Alamat Mitra</th>
                                        <th style="text-align:center;width:100px !important">Luas Lahan</th>
                                        <th style="text-align:center;width:100px !important">Jumlah Kandang</th>
                                        <th style="text-align:center;width:100px !important">Biaya</th>
                                        <!-- <th style="text-align:center;width:100px !important">Status</th> -->
                                        <th style="width:100px !important">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody id="show_data">

                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->


    </div>
</section>

