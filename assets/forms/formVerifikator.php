		
        <div class="row">
        <div class="col-xs-12 ">
		<?php
			 
			$sql="SELECT * FROM user WHERE id='$id'";
			$rs=$this->db->query($sql);
			if($rs->num_rows()>0){
				$username=$row->username;
				$password=$row->password;
				$nama=$row->nama;
				$no_hp=$row->no_hp;
				$foto=$row->foto;
				$nip=$row->nip;
			}else{
				$username="";
				$password="";
				$nama="";
				$no_hp="";
				$foto="";
				$nip="";
			}
		?>
        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>--><form action="javascript:void(0)" id="form_" class="form form-horizontal" z-index="7500"><div class="form-group" style="margin-bottom:5px">
								<label class="col-xs-3 control-label no-padding"  for="username">  Username</label>
								<div class="col-xs-9"><input autocomplete="off"  type="text" id="username" name="username" value="<?php echo $username;?>"   tabindex="1000"  style="background-color:#D7E3EA" class="input-sm col-xs-12  required"  ></div>

							</div>
							<div class="form-group" style="margin-bottom:5px">
								<label class="col-xs-3 control-label no-padding"  for="nama">NAMA</label>
								<div class="col-xs-9"><input autocomplete="off"  type="text" id="nama" name="nama" value="<?php echo $username;?>"   tabindex="1001"  style="background-color:#D7E3EA" class="input-sm col-xs-12  required"  ></div>

							</div>
							<div class="form-group" style="margin-bottom:5px">
								<label class="col-xs-3 control-label no-padding"  for="no_hp">  No. HP</label>
								<div class="col-xs-9"><input autocomplete="off"  type="text" id="no_hp" name="no_hp" value="<?php echo $no_hp;?>"   tabindex="1003"  style="" class="input-sm col-xs-12 "  ></div>

							</div>
							<div class="form-group" style="margin-bottom:5px">
								<label class="col-xs-3 control-label no-padding"  for="nip">  NIP</label>
								<div class="col-xs-9"><input autocomplete="off"  type="text" id="nip" name="nip" value="<?php echo $nip;?>"   tabindex="1004"  style="" class="input-sm col-xs-12 "  ></div>

							</div>
							<div class="form-group" style="margin-bottom:5px">
								<label class="col-xs-3 control-label no-padding"  for="password">  Password</label>
								<div class="col-xs-9"><input autocomplete="off"  type="password" id="password" name="password" value=""   tabindex="1005"  style="" class="input-sm col-xs-12 "  ></div>

							</div>
							  
							<div class="form-group">
					
					<div class="form-group"><div class="col-sm-6">
            <button class="btn btn-app btn-xs btn-danger" data-dismiss="modal" id="remove_">
								<i class="ace-icon fa fa-times-circle-o"></i>
								Batal
							</button>
					<button class="btn btn-app btn-xs btn-primary" name="tombol_" id="tombol_" type="submit" ><i class="ace-icon fa fa-save"></i>
								Simpan
							</button>
							</div></div></div></div></div></form>

<script type="text/javascript">
		$("form input:text").keypress(function (e) {
//			if (e.which == 13) $(this).parents("form:first").submit();
		});

		function numbersonly(myfield, e, dec) {
			  var key;
			  var keychar;

			  if (window.event)
				key = window.event.keyCode;
			  else if (e)
				key = e.which;
			  else
				return true;
			  keychar = String.fromCharCode(key);


			  // control keys
			  if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) )
				return true;

			  // numbers
			  else if ((("0123456789.").indexOf(keychar) > -1))
				return true;

			  // decimal point jump
			  else if (dec && (keychar == ".")) {
				myfield.form.elements[dec].focus();
				return false;
			  } else
				return false;
			}

					</script>
<script type="text/javascript">
    $(document).ready(function (e)
    {
        /*$('#school_kabupaten').select2({
            placeholder: '--Pilih Nama Kabupaten--',
            dataType: 'json',
            // width: '100%',
            allowClear: false,
            ajax: {
                url: '../data/data1_3.php',
                dataType: 'json',
                data: function (term, page) {
                    return {
                        tipe: '14',
                        prop: $('#school_provinsi').val(),
                        page_limit: 10, // page size
                        page: page, // page number
                        q: term
                    }
                },
                results: function (data, page) {
                    var more = (page * 10) < data.total_count;
                    return {results: data.items, more: more}
                }
            },
            formatResult: function (item) {
                return item.text;
            },
            formatSelection: function (item) {
                return item.text;
            },
            sortResults: function (data, container, query) {
                if (query.term) {
                    // use the built in javascript sort function
                    return data.sort(function (a, b) {
                        if (a.text.length > b.text.length) {
                            return 1;
                        } else if (a.text.length < b.text.length) {
                            return -1;
                        } else {
                            return 0;
                        }
                    });
                }
                return data;
            },
            formatSearching: function () {
                $('.brs_data').remove().empty();
                return 'Tunggu...'
            },
            formatNoMatches: function () {
                return 'Tidak Ada Data';
            },
            dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
            escapeMarkup: function (m) {
                return m;
            },
            dropdownAutoWidth: true,
            initSelection: function (element, callback) {
                var data = {id: element.val(), text: ''};
                callback(data);
            }
        });
        $('#school_kecamatan').select2({
            placeholder: '--Pilih Nama Kecamatan--',
            dataType: 'json',
            width: '100%',
            allowClear: false,
            ajax: {
                url: '../data/data1_3.php',
                dataType: 'json',
                data: function (term, page) {
                    return {
                        tipe: '15',
                        kab: $('#school_kabupaten').val(),
                        page_limit: 10, // page size
                        page: page, // page number
                        q: term
                    }
                },
                results: function (data, page) {
                    var more = (page * 10) < data.total_count;
                    return {results: data.items, more: more}
                }
            },
            formatResult: function (item) {
                return item.text;
            },
            formatSelection: function (item) {
                return item.text;
            },
            sortResults: function (data, container, query) {
                if (query.term) {
                    // use the built in javascript sort function
                    return data.sort(function (a, b) {
                        if (a.text.length > b.text.length) {
                            return 1;
                        } else if (a.text.length < b.text.length) {
                            return -1;
                        } else {
                            return 0;
                        }
                    });
                }
                return data;
            },
            formatSearching: function () {
                $('.brs_data').remove().empty();
                return 'Tunggu...'
            },
            formatNoMatches: function () {
                return 'Tidak Ada Data';
            },
            dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
            escapeMarkup: function (m) {
                return m;
            },
            dropdownAutoWidth: true,
            initSelection: function (element, callback) {
                var data = {id: element.val(), text: ''};
                callback(data);
            }
        });*/

        $('#btnBaru').prop('disabled', false);
        $('.tanggalan').datepicker({
            autoclose: 'true'
        })
        $('#form_').on('keypress', function (e)
        {
            if (e.which == 13) return false;
        })
        $('.setSelect').select2({
            width: '100%'
        });
        $('#form_').validate({
            rules: function ()
            {
                $('.required').each(function ()
                {
                    var mantep = $(this).attr('id');
                    mantep.required = true;
                });
                return mantep;
            },
            submitHandler: function (theForm)
            {

                saveThis('');
                $("#example").DataTable().draw();
                bootbox.hideAll();
                window.location.reload();                // $('#menuForm').submit();
            }
        });
        function saveThis(aidi)
        {

            var form = $('#form_');
            var action = '55a270efbba682a200651fc11f55bd0ff8162b39';
            $.ajax({
                url: 'incs/gateway.php',
                data: form.serialize() + '&tipe=2&action=' + action + '&target=702b6729e7ea65331e9018310b9c8e4c42aa0533',
                type: 'post',
                dataType: 'json'
            }).done(function ()
            {
                bootbox.hideAll();
                // $('#menuForm').submit();


            });
        }

        function loadDetail()
        {
            $('.brsData').empty().remove();
            var idGroup = $('#idGroup').val();
            var d = '';
            $.ajax({
                url: 'data/data1_4.php',
                data: {tipe: 4, idGroup: idGroup},
                dataType: 'json'
            }).done(function (xHasil)
            {
                if (xHasil.items) {
                    var a = xHasil.items;
                    var no = 1;
                    $.each(a, function (b, c)
                    {
                        var hapus = '<button class="hpsTahapan btn btn-xs btn-danger" data-aidi="' + c.id + '"><i class="fa fa-times"></i> Hapus</button>';
                        var subTahap = '<button class="subTahapan btn btn-xs btn-info" data-aidi="' + c.id + '"><i class="fa fa-book"></i> Buka</button>';
                        if (c.jumSub > 0) hapus = '';

                        d += '<tr class="brsData"><td class="tdTahapan isPointing" data-aidi="' + c.id + '">' + no + '</td><td>' + c.nama + '</td><td class="text-right">' + c.tahun + '<td class="text-center">' + subTahap + '</td><td class="text-center">' + hapus + '</td></tr>';
                        no++;
                    })
                } else {
                    d = '<tr class="brsData brsKosong"><th colspan="5" class="text-center">--Tidak Ada Data--</th> </tr>'
                }
            }).always(function ()
            {
                $('#example tbody').append(d);
            });
        }

    });
</script>
