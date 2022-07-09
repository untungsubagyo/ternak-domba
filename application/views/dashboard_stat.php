<div class="row">
                       <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-green-sharp">
												<?php
													$sql="SELECT count(*) n FROM sapi WHERE status='1'";
													$row=$this->db->query($sql)->row();
													$nSapi=$row->n;
													
													$sql="SELECT count(*) n FROM sapi WHERE id_sex='1' and status='1'";
													$row=$this->db->query($sql)->row();
													$nJantan=$row->n;
													
													$sql="SELECT count(*) n FROM sapi WHERE id_sex='2' and status='1'";
													$row=$this->db->query($sql)->row();
													$nBetina=$row->n;
																										
													$sql="SELECT count(*) n FROM ayam";
													$row=$this->db->query($sql)->row();
													$nAyam=$row->n;
													
													 
												?>
                                                    <span data-counter="counterup" data-value="<?php echo $nSapi;?>"><?php echo number_format($nSapi,0,",",".");?></span>                                                     <!--small class="font-green-sharp">sekolah</small-->
                                                </h3>
                                                <small>SAPI POTONG</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-pie-chart"></i>
                                            </div>
                                        </div>
                                        <div class="progress-info">
                                            <div class="progress">
                                                <!--span style="width: < ?php echo $progress;?>%;" class="progress-bar progress-bar-success green-sharp">
                                                    <span class="sr-only">< ?php echo $progress;?>% progress</span>
                                                </span-->
                                            </div>
                                            <div class="status">
                                                <!--div class="status-title"> progress </div>
                                                <div class="status-number"> < ?php echo $progress;?>% </div-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-red-haze">
                                                    <span data-counter="counterup" data-value="<?php echo $nJantan;?>"><?php echo $nJantan;?></span>
                                                </h3>
                                                <small>Sapi Jantan</small>
                                            </div>
                                            <div class="icon">                                                
                                                <i class="icon-pie-chart"></i>
                                            </div>
                                        </div>
                                        <div class="progress-info">
                                            <div class="progress">
                                                <!--span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                                                    <span class="sr-only">185,93% dari jumlah target sasaran</span>
                                                </span-->
                                            </div>
                                            <div class="status">
                                                <!--div class="status-title"> dari jumlah target sasaran </div>
                                                <div class="status-number"> 185,93% </div-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-blue-sharp">
                                                    <span data-counter="counterup" data-value="<?php echo $nBetina;?>"><?php echo $nBetina;?></span>
                                                    <!--small class="font-green-sharp">ekor</small-->
                                                </h3>
                                                <small>SAPI BETINA</small>
											</div>
                                            <div class="icon">    
                                                <i class="icon-pie-chart"></i>
                                            </div>
                                        </div>
                                        <div class="progress-info">
                                            <div class="progress">
                                                <!--span style="width: 144%;" class="progress-bar progress-bar-success blue-sharp">
                                                    <span class="sr-only">144,25% dari target anggaran</span>
                                                </span-->
                                            </div>
                                            <div class="status">
                                                <!--div class="status-title"> dari target anggaran</div>
                                                <div class="status-number"> 144,25% </div-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-purple-soft">
                                                    <span data-counter="counterup" data-value="<?php echo "0";?>"><?php echo $nAyam;?></span>
                                                </h3>
                                                <small>AYAM</small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-pie-chart"></i>
                                            </div>
                                        </div>
                                        <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                                    <span class="sr-only"></span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title"></div>
                                                <div class="status-number"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  

								<?php 
									$sql="SELECT id_bangsa, nama,COUNT(*) n FROM sapi JOIN ref_bangsa b ON sapi.id_bangsa=b.id WHERE status='1' GROUP BY id_bangsa";
									$rs=$this->db->query($sql);
									
									foreach($rs->result() as $row){
								?>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat2 ">
                                        <div class="display">
                                            <div class="number">
                                                <h3 class="font-purple-soft">
                                                    <span data-counter="counterup" data-value="<?php echo "0";?>"><?php echo $row->n;?></span>
                                                </h3>
                                                <small><?php echo $row->nama;?></small>
                                            </div>
                                            <div class="icon">
                                                <i class="icon-pie-chart"></i>
                                            </div>
                                        </div>
                                        <div class="progress-info">
                                            <div class="progress">
                                                <span style="width: 57%;" class="progress-bar progress-bar-success purple-soft">
                                                    <span class="sr-only"></span>
                                                </span>
                                            </div>
                                            <div class="status">
                                                <div class="status-title"></div>
                                                <div class="status-number"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
									<?php } ?>
								
</div>