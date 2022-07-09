
var Dashboard = function() {

    return {

        initMap: function() {

            //var url = "http://geoservice.bnpb.go.id:8399/arcgis/rest/services/Peta_Risiko_Bencana/Risiko_Bencana_Banjir/MapServer";
            ////10331840.239251, 622995.199142,   15953358.604596, -1072716.020923
            //
            //var map = new ol.Map({
            //    target: 'map',
            //    layers: [
            //        new ol.layer.Tile({
            //            source: new ol.source.OSM()
            //        }),
            //        new ol.layer.Image({
            //            source: new ol.source.ImageArcGISRest({
            //                ratio: 1,
            //                params: {},
            //                url: url
            //            })
            //        })
            //    ],
            //    view: new ol.View({
            //        //center: ol.proj.fromLonLat([37.41, 8.82]),
            //        //center: ol.proj.fromLonLat([-2.58, 119.02]),
            //        center: [12993119.481375, -544912.283908],
            //        zoom: 5
            //    })
            //});
        },

        initTable: function () {

             var table = $('#ruangan_kerusakan').DataTable({
                "order": [
                    [2, 'asc']
                ],
                "columnDefs": [
                    {
                        "targets": 0,
                        "orderable": false
                    },{
                        "targets": 1,
                        "orderable": false
                    },{
                        "targets": 4,
                        "orderable": false
                    }
                ],                

             }); 

             // Add event listener for opening and closing details
             $('#ruangan_kerusakan').delegate( 'td.details-control', 'click',function () {

                console.log('detail control click');

                 var tr = $(this).closest('tr');
                 var row = table.row(tr);
                 var val = $(this).attr('data-link');
                 var petugas_id = $(this).attr('petugas_id');
                 var pengguna_id = $(this).attr('pengguna_id');
                 var tambahFoto = ""
                 // console.log(pengguna_id);
                 
                 if (row.child.isShown()) {
					  
                     // This row is already open - close it
                     row.child.hide();
                     tr.removeClass('shown');
                 } else {
					 
                     // Open this row
                     format(row.child, val, petugas_id, pengguna_id);
					 
                     tr.addClass('shown');
					 
                 }

             });

            function format(callback, val, petugas_id, pengguna_id) {
				
                $.ajax({
                    url: '/progress_kerusakan/' + 'BE286B1E-D0FD-43FA-BA60-6CF596282FEF.txt',
                    dataType: "json",
                    complete: function (response) {
						var data = JSON.parse(response.responseText);
                         console.log(data);
                        var thead = '', tbody = '';
                            // for (var key in data[0]) {
                            //    thead += '<th>' + key + '</th>';
                            //}
                        thead = '' +
                        '<th style="width: 25%">Kerusakan Komponen</th>' +
                        '<th style="min-width: 9%">Total</th>' +
                        '<th style="min-width: 9%">Rusak</th>' +
                        '<th>%</th>' +
                        '<th>Bobot</th>' +
                        '<th>Poin</th>' +
                        '<th style="min-width: 10%">Catatan<br>Verifikator</th>' +
                        // '<th style="min-width: 9%">Penilaian<br>Validator</th>' +
                        // '<th style="min-width: 10%">Catatan<br>Penilai</th>' +
                        // '<th style="min-width: 9%">Tgl Foto</th>' +
                        '<th style="min-width: 9%">&nbsp;</th>'
                        ;

                        count = 1;
                        var jumlahBobot = 0;
                        var jumlahPoin = 0;
                        var jumlahPoinValidator = 0;

                        $.each(data, function (i, d) {
                            var date = new Date(d.tgl_pengamatan);
                            var infoKerusakan = "";

                            if( petugas_id == pengguna_id ){
                                tambahFoto = '<img src= "/img/camera_go.png" style ="height:20px" class="openform-kerusakan" obyek_id = "'+ val +'" rwy_kondisi_id = "'+ d.rwy_kondisi_id +'" nama_ruangans = "'+ d.nama_jenis_sub_komponen +' ('+d.catatan+')" foto_id ="'+ d.foto_id +'">';
                            }else{
                                tambahFoto = "";
                            }

                            if (d.catatan != '') {
                                infoKerusakan = d.nama_jenis_sub_komponen + ' (' + d.catatan + ')';
                            } else {
                                infoKerusakan = d.nama_jenis_sub_komponen
                            }

                            jumlahBobot += parseFloat(d.persen_thd_bangunan);

                            var labelOrInputStr = "";

                            if (d.is_active_validator) {
                                labelOrInputStr = '<td valign="top"><input type="hidden" name="validasi_data_verifikasi_id#'+ d.jenis_sub_komponen_id +'" value="'+ d.validasi_data_verifikasi_id + '"/><input type="text" name="persen_kerusakan_validator#'+ d.jenis_sub_komponen_id +'" style="width: 35px;" value="' + d.persen_kerusakan_validator + '"/>%</td>' +
                                    '<td valign="top"><input type="text" name="catatan_validator#'+ d.jenis_sub_komponen_id +'" style="width: 100px;" value="' + d.catatan_validator + '"/><br></td>';
                            } else {
                                labelOrInputStr = '<td valign="top"><b>' + d.persen_kerusakan_validator + '%</b></td>' +
                                    '<td valign="top">' + d.catatan_validator + '<br></td>';
                            }


                            var persen = 0;
                            var poin = 0;
                            var poinStr = 0;

                            var poinValidator = 0;
                            var poinValidatorStr = 0;

                            if (d.volume_total > 0) {
                                persen = ( 100 * d.volume_rusak / d.volume_total ).toFixed(2);
                                poin = (( d.volume_rusak / d.volume_total ) * d.persen_thd_bangunan )
                                poinStr = poin.toFixed(2);
                            } else {
                                persen = 0;
                                poin = 0;
                            }

                            jumlahPoin += poin;
                            console.log('Jumlah Poin: ' + jumlahPoin);

                            poinValidator = (d.persen_kerusakan_validator/100) * d.persen_thd_bangunan;
                            jumlahPoinValidator += poinValidator;
                            console.log('Jumlah Poin Validator: ' + jumlahPoinValidator);

                            var hapusStr = '';
                            if (d.is_active_verifikator) {
                                hapusStr = '&nbsp;&nbsp;&nbsp;<a href="/hapusKerusakan?id={{ r.obyek_id }}"><img src="/img/cross20.png" /></a>';
                            }

                            tbody += '<tr>' +
                            '<td valign="top">' + count++ + '. ' + d.nama_jenis_sub_komponen + hapusStr + '</td>' +
                            '<td valign="top">' + d.volume_total + ' ' + d.satuan_volume + '</td>' +
                            '<td valign="top">' + d.volume_rusak + ' ' + d.satuan_volume + '</td>' +
                            '<td valign="top"><b>' + persen + '%</b></td>' +
                            '<td valign="top">' + d.persen_thd_bangunan + '%</td>' +
                            '<td valign="top">' + poinStr + '%</td>' +
                            '<td valign="top">' + d.catatan + '</td>' +
                            labelOrInputStr +
                            // '<td valign="top">' + date.getDay() + '/' + date.getMonth() + '/' + date.getFullYear() + ' ' + date.getHours() + ':' + date.getMinutes()  + '</td>' +
                            '<td valign="top"><img height="25" width="25" src="/imageViewer?image_path=' + d.foto_thumb + '" class="icon_gambar" image_path="' + d.foto_path + '" image_title="' + infoKerusakan + '"/> &nbsp; '+ tambahFoto +'</td>' +
                            '</tr>';
                        });

                        tbody += '<tr>' +
                            '<td colspan="4"><b>Total</b></td>' +
                            '<td><b>' + jumlahBobot + '%</b></td>' +
                            // '<td><b>' + jumlahPoin.toFixed(2) + '%</b></td>' +
                            '<td><b>' + jumlahPoin.toFixed(2) + '%</b></td>' +
                            '<td style="min-width: 10%">&nbsp;</td>' +
                            '<td style="min-width: 10%"><b>' + jumlahPoinValidator.toFixed(2) + '%</b></td>' +
                            '<td style="min-width: 10%">&nbsp;</td>' +
                            // '<td style="min-width: 9%">&nbsp;</td>' +
                            '<td style="min-width: 9%"><input type="submit" id="kirim" value="Simpan"/></td>' +
                            '</tr>';

                        console.log('<table>' + thead + tbody + '</table>');
                        callback($('<form id="form_validasi"><table>' + thead + tbody + '</table></form>')).show();
                    },
                    error: function () {
                        $('#output').html('Bummer: there was an error!');
                    }
                });
            }

        },

        initFancyBox: function () {
            
            $('body').on('click', '.icon_gambar', function (){

            // $(".icon_gambar").on("click", function(){

                var image_path = $(this).attr('image_path');
                var image_title = $(this).attr('image_title');

                var fotos = [{
                    href : '/getImage/'+ image_path +'.jpg',
                    title : image_title
                }];

                $.fancybox.open(
                        fotos,
                        {
                            prevEffect : 'none',
                            nextEffect : 'none',
                            helpers : {
                                thumbs : {
                                    width: 75,
                                    height: 50
                                }
                            }
                        }
                );
            });

            $('body').on('click', '.openform', function (){
            // $(".openform").click(function () {
                    var obyek_id = $(this).attr('obyek_id');
                    var nama_ruangan = $(this).attr('nama_ruangans');

                    id_foto(obyek_id);
                    // foto_terkirim(obyek_id);
                    $('.title_form').text('DAFTAR FOTO '+nama_ruangan);
                    $("#obyek_form").attr("value", obyek_id)

                    $.fancybox.open(
                        $('.list_foto').html()
                        // keterangan(obyek_id, nama_ruangan)
                    );
                    
                    
            });
            
            function id_foto(obyek_id){
                $.ajax({
                    url: '/list_sudut_foto/' + obyek_id,
                    dataType: "json",
                    complete: function (response) {

                        var data = JSON.parse(response.responseText);
                        console.log(data);
                        var thead = '', tbody = '';
                        
                        $.each(data, function (i, d) {
                            
                            $('.td'+i).text(d.foto_id+'.jpg');
                            $('.namaRuangan'+i).text(d.nama_sudut_pengambilan_foto);
                            
                            if(d.foto_id_terkirim != null){
                                $('.status'+i).html("<img class='fotoTerkirim{{i}}' id='#' src= '/img/doublecheckblue20.png'>&nbsp; Ada")
                            }else{
                                $('.status'+i).html("<img class='fotoTerkirim{{i}}' id='#' src= '/img/cross20.png' '>&nbsp;<i class='fa fa-folder-open openform-sudut' aria-hidden='true' obyek_id='"+d.obyek_id+"' foto_id='"+d.foto_id+"' nama_sudut='"+d.nama_sudut_pengambilan_foto+"' nama_ruangan='"+d.nama_obyek+"'></i>")
                            }
                            
                        });
                        
                    },
                    error: function () {
                        $('#output').html('Bummer: there was an error!');
                    }
                    });
            }

            $('body').on('click', '.openform-sudut', function (){
            // $(".openform-kerusakan").click(function () {
                var obyek_id = $(this).attr('obyek_id');
                var nama_ruangan = $(this).attr('nama_ruangan');
                var nama_sudut = $(this).attr('nama_sudut');
                // var rwy_kondisi_id = $(this).attr('rwy_kondisi_id');
                var foto_id = $(this).attr('foto_id');
                
                $('.title_form').text(nama_ruangan);
                $('.foto_ids').text(foto_id+'.jpg');
                $('.nama_sudut').text(nama_sudut);
                $("#form_kerusakan").attr("value", obyek_id);
                // $("#form_rwy_kondisi_id").attr("value", rwy_kondisi_id);

                $.fancybox.open(
                    $('.form-sudut').html()
                );
                
            });

            $('body').on('click', '.openform-kerusakan', function (){
            // $(".openform-kerusakan").click(function () {
                var obyek_id = $(this).attr('obyek_id');
                var nama_ruangan = $(this).attr('nama_ruangans');
                var rwy_kondisi_id = $(this).attr('rwy_kondisi_id');
                var foto_id = $(this).attr('foto_id');
                
                $('.title_form').text(nama_ruangan);
                $('.foto_ids').text(foto_id+'.jpg');
                $("#form_kerusakan").attr("value", obyek_id);
                $("#form_rwy_kondisi_id").attr("value", rwy_kondisi_id);

                $.fancybox.open(
                    $('.form-kerusakan').html()
                );
                
            });

            $('body').on('click', '.openform-konfirmasi', function (){
            // $(".openform-kerusakan").click(function () {
                var obyek_id = $(this).attr('obyek_id');
                var nama_ruangan = $(this).attr('nama_ruangan');
                
                $('.title_form').text(nama_ruangan);

                $.fancybox.open(
                    $('.form-konfirmasi').html()
                );
                
            });

        },

        handlerForm: function () {

            $("#form_upload").submit(function(e){

                var formData = new FormData($(this)[0]);

                $.ajax({
                    url: '/upload/foto_sudut',
                    type: 'GET',
                    data: $("#form_upload").serialize(),
                    async: false,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if (data.success == true) {
                            setTimeout(function(){
                                window.history.back();
                            },2000);

                        } else {
                            error1.html();
                            return false;
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });

                return false;
            });

            /// $('#kirim').click(function (e) {
            $(document).on('submit', '#form_validasi', function(evt){

                evt.preventDefault();

                $.ajax({
                    type: 'post',
                    url: '/updateValidasiKerusakan',
                    data: $('#form_validasi').serialize(),
                    datatype: 'json',
                    success: function (data) {
                        var obj = jQuery.parseJSON(data);
                        alert(obj.message);
                    }
                });

            });
        },
        
        chkFotoTerkirimStatus: function(){
            $('#foto_terkirim .icon_gambar').each(function(){
                var that = $(this);
                $.ajax({
                    url: $(this).attr('src'),
                    error: function(xhr, txtStatus){
                        // console.log('status='+xhr.status);
                        if(xhr.status==404){
                            $(that).parents('tr').find('.status_terkirim').html('Belum');
                        }
                    }
                })

            })
        },

        handleButtons: function() {
            // $(document).on('click', '#btn_validasi_kerusakan', function(evt){
            $('#btn_validasi_kerusakan').click(function () {

                console.log($(this).attr('data-link'));
                App.blockUI({
                    boxed: true
                });

                $.ajax({
                    type: 'get',
                    url: '/fillValidasiKerusakan?sekolah_id=' + $(this).attr('data-link'),
                    datatype: 'json',
                    success: function (data) {
                        var obj = jQuery.parseJSON(data);
                        alert(obj.message);
                        App.unblockUI();
                        $('#btn_validasi_kerusakan').hide();
                    },
                    error: function (xhr, txtStatus) {
                        console.log('status=' + xhr.status);
                        alert("Galat ketika menghubungi server. Koneksi internet bermasalah?");
                        // if(xhr.status==404){
                        //     alert("Galat ketika menghubungi server. Koneksi internet bermasalah?");
                        // }
                        App.unblockUI();
                    }
                });
            });

            $('#btn_ambil_alih_validasi').click(function () {

                console.log($(this).attr('data-link'));
                App.blockUI({
                    boxed: true
                });

                $.ajax({
                    type: 'get',
                    url: '/ambilAlihValidasi?sekolah_id=' + $(this).attr('data-link'),
                    datatype: 'json',
                    success: function (data) {
                        var obj = jQuery.parseJSON(data);
                        alert(obj.message);
                        App.unblockUI();
                        $('#btn_ambil_alih_validasi').hide();
                        $("#btn_validasi_oleh").html('<i class="fa fa-check-square-o"></i> Validasi oleh Anda');
                    },
                    error: function (xhr, txtStatus) {
                        console.log('status=' + xhr.status);
                        alert("Galat ketika menghubungi server. Koneksi internet bermasalah?");
                        // if(xhr.status==404){
                        //     alert("Galat ketika menghubungi server. Koneksi internet bermasalah?");
                        // }
                        App.unblockUI();
                    }
                });
            });

            $('#btn_unduh_excel').click(function(){
                window.location.assign('/progressUnduhAnalisisKerusakan/' + $(this).attr('data-link'));
            });

            $('#btn_komplain_validasi').click(function(){
                // Show form modal
                var $modal = $('#ajax-modal');
                $modal.modal();
           });


            $("#form_pertanyaan_submit").click(function(e){

                var formPertanyaan = $('#form_pertanyaan');
                App.blockUI({
                    target: '#form_pertanyaan',
                    boxed: true
                });

                $.ajax({
                    type: 'post',
                    url: '/komplainValidasi',
                    data: formPertanyaan.serialize(),
                    datatype: 'json',
                    success: function (data) {
                        var obj = jQuery.parseJSON(data);
                        App.unblockUI('#form_pertanyaan');
                        $('#ajax-modal').modal('hide');
                        alert(obj.message);

                    },
                    error: function() {
                        App.unblockUI('#form_pertanyaan');
                    }
                });
                //e.preventDefault();

                return false;
            });

            // $('#link-list-perkiraan-biaya').click(function() {
            $('body').on('click', '#link-list-perkiraan-biaya', function (){
                var $modal = $('#list-perkiraan-biaya-modal');
                $modal.modal();
            });
        },

        handleAutomaticAjaxes: function(){

            var sekolahId = $("#sekolahId").html();

            $.ajax({
                type: 'get',
                url: '/progressAjaxAnalisisKerusakan/' + sekolahId,
                datatype: 'json',
                success: function (data) {

                    console.log(data);
                    // var obj = jQuery.parseJSON(data);
                    // alert('Ditemukan ' + obj.results + ' baris data');
                    // console.log(obj.rows);
                    //
                    // var $modal = $('#ajax-modal');
                    // $modal.modal();

                    // App.unblockUI('#form_pertanyaan');
                    // $('#ajax-modal').modal('hide');
                    $("#list-perkiraan-biaya-modal .modal-body").html(data);


                    var sum_jumlah_biaya_rehab_validator = $("#sum_jumlah_biaya_rehab_validator").html();
                    var outputSum = "<a id='link-list-perkiraan-biaya'>" + sum_jumlah_biaya_rehab_validator + "</a>";
                    $("#perkiraanBiayaBeratTotal").html(outputSum);

                    var outputInfo = "( Berat n Total, Valid. <a id='link-list-perkiraan-biaya'>Buka Rincian</a> )";
                    $("#rinciPerkiraanBiayaBeratTotal").html(outputInfo);

                },
                error: function() {
                    App.unblockUI('#form_pertanyaan');
                }
            });
        },


        handleDelete: function(){
            
            $('body').on('click', '.cek-hapus-obyek', function (){

                var obyekId = $(this).data('hapusobyekid');

                console.log($(this));
                console.log($(obyekId));

                $.ajax({
                    type: 'get',
                    url: "/hapusData/ajaxcheck/obyek/" + obyekId,
                    dataType: 'json',
                    success: function (data) {

                        console.log(data);

                        var outputHtml = "Untuk menghapus obyek ini, akan juga dihapus data sejumlah:" +
                            "<ul>" +
                            "<li>" + data.pengamatans + " pengambilan foto " + "</li>" +
                            "<li>" + data.rwyKondisis + " kerusakan " + "</li>" +
                            "<li>" + data.rwyPembangunans + " tahapan progres" + "</li>" +
                            "<li>" + data.validasis + " validasi pusat " + "</li>" +
                            "<li>" + data.pengamatanKerusakans + " foto kerusakan " + "</li>" +
                            "</ul> Yakin akan menghapus ?";

                        // Set modal's value
                        $("#cek-hapus-modal .modal-body").html(outputHtml);

                        // Set button's value
                        $("#form_hapus_submit").data('hapusobyekid', obyekId);

                        var $modal = $('#cek-hapus-modal');
                        $modal.modal();

                        var sum_jumlah_biaya_rehab_validator = $("#sum_jumlah_biaya_rehab_validator").html();
                        var outputSum = "<a id='link-list-perkiraan-biaya'>" + sum_jumlah_biaya_rehab_validator + "</a>";
                        $("#perkiraanBiayaBeratTotal").html(outputSum);

                        var outputInfo = "( Berat n Total, Valid. <a id='link-list-perkiraan-biaya'>Buka Rincian</a> )";
                        $("#rinciPerkiraanBiayaBeratTotal").html(outputInfo);

                    },
                    error: function() {
                        App.unblockUI('#form_pertanyaan');
                    }
                });

            });

            $('body').on('click', '#form_hapus_submit', function (){
                var obyekId = $(this).data('hapusobyekid');
                alert('Anda memutuskan menghapus ' + obyekId);
	            var $modal = $('#list-perkiraan-biaya-modal');
                $modal.modal();
            });
        },

        init: function() {
			
            this.initTable();
            this.initMap();
            this.initFancyBox();
            this.handlerForm();
            this.handleButtons();
            this.handleAutomaticAjaxes();
            this.handleDelete();
        }

        // this.chkFotoTerkirimStatus();

    }

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        Dashboard.init(); // init metronic core componets
    });
}

/*table=$('#foto_umum').DataTable({
	"lengthMenu": [
                    [10, 10, 15, -1],
                    [5, 10, 15, "All"] // change per page values here
                ],
});*/