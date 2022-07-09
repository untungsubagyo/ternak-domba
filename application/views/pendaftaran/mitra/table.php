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
                            <button type="button" class="btn  bg-blue waves-effect" id="btnTambah">TAMBAH</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable dataku ">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width: 50px !important;">Nomor Induk</th>
                                        <th style="text-align:center;width: 200px !important;">Nama</th>
                                        <th style="text-align:center;">Tempat / Tanggal Lahir</th>
                                        <th style="text-align:center;width: 50px !important;">Jenis Kelamin</th>
                                        <th style="text-align:center;width: 50px !important;">No. HP</th>
                                        <th style="text-align:center;">Alamat</th>
                                        <th>&nbsp;</th>
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

