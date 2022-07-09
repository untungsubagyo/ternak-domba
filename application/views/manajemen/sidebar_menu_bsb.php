<!-- Menu -->
            <div class="menu">
<ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li <?php echo ($menu=="home"?"class='active'":"");?>>
                        <a href="<?php echo base_url();?>operator/manajemen">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                     
                    
                     
                    <li <?php echo ($menu=="pendaftaran"?"class='active'":"");?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Pendaftaran</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php echo ($submenu=="pendaftaran_mitra"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>pendaftaran/mitra">Pendaftaran Mitra</a>
                            </li>
                            <li <?php echo ($submenu=="mou_mitra"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>pendaftaran/mou_mitra">MOU Mitra</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php echo ($menu=="kandang"?"class='active'":"");?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Kandang</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php echo ($submenu=="pengajuan_kandang"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>kandang/pengajuan">Pengajuan Kandang</a>
                            </li>
                            <li <?php echo ($submenu=="pembangunan_kandang"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>kandang/pembangunan">Pembangunan Kandang</a>
                            </li>
                            <li <?php echo ($submenu=="bast_kandang"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>kandang/bast">BAST Kandang</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php echo ($menu=="budidaya"?"class='active'":"");?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Budidaya</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php echo ($submenu=="domba"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>budidaya/domba">Domba</a>
                            </li>
                            <li <?php echo ($submenu=="pakan"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>budidaya/pakan">Pakan</a>
                            </li>
                            <li <?php echo ($submenu=="obat"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>budidaya/obat">Obat</a>
                            </li>
                            <li <?php echo ($submenu=="limbah"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>budidaya/limbah">Limbah</a>
                            </li>
                            <li <?php echo ($submenu=="rhbd"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>budidaya/rhbd">RHBD</a>
                            </li>
                        </ul>
                    </li>
                    <li <?php echo ($menu=="transaksi"?"class='active'":"");?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Transaksi</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php echo ($submenu=="pembayaran_rhbd"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>transaksi/pembayaran_rhbd">Pembayaran RHBD</a>
                            </li>
                            <li <?php echo ($submenu=="pembangunan_kandang"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>transaksi/pembayaran_angsuran_kandang">Pembayaran Angsuran Kandang</a>
                            </li>
                            <li <?php echo ($submenu=="rugi_laba"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>transaksi/rugi_laba">Rugi Laba</a>
                            </li>
                            <li <?php echo ($submenu=="cash_flow"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>transaksi/cash_flow">Cash Flow</a>
                            </li> 
                        </ul>
                    </li>
                     
                    <li <?php echo ($menu=="laporan"?"class='active'":"");?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Laporan Populasi</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php echo ($submenu=="laporan_data_mitra"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>laporan/mitra">Laporan Data Mitra</a>
                            </li>
							<li <?php echo ($submenu=="laporan_data_kandang"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>laporan/kandang">Laporan Data Kandang</a>
                            </li>
							<li <?php echo ($submenu=="laporan_data_domba"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>laporan/domba">Laporan Data Domba</a>
                            </li>
							<li <?php echo ($submenu=="laporan_data_pakan"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>laporan/pakan">Laporan Data Pakan</a>
                            </li>
							<li <?php echo ($submenu=="laporan_data_obat"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>laporan/obat">Laporan Data Obat</a>
                            </li>
							<li <?php echo ($submenu=="laporan_data_limbah"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>laporan/limbah">Laporan Data Limbah</a>
                            </li>
							<li <?php echo ($submenu=="laporan_data_rhbd"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>laporan/rhbd">Laporan Data RHBD</a>
                            </li>
							<li <?php echo ($submenu=="laporan_pembayaran_rhbd"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>laporan/pembayaran_rhbd">Laporan Pembayaran RHBD</a>
                            </li>
							<li <?php echo ($submenu=="laporan_pembayaran_angsuran_kandang"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>laporan/pembayaran_angsuran_kandang">Laporan Pembayaran Angsuran Kandang</a>
                            </li>
                            <li <?php echo ($submenu=="laporan_rugi_laba"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>laporan/rugi_laba">Laporan Rugi Laba</a>
                            </li>
                            <li <?php echo ($submenu=="laporan_cash_flow"?"class='active'":"");?>>
                                <a href="<?php echo base_url();?>laporan/cash_flow">Laporan Cash Flow</a>
                            </li>
                        </ul>
                    </li>
					 
                    
                    
                      
                </ul>
			</div>
			<!-- Menu -->