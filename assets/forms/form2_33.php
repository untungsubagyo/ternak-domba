		
		

<link href="<?php echo base_url();?>assets/template/admin/plugins/datepicker/datepicker3.css" rel="stylesheet">

        <div class="row">
        <div class="col-xs-12 ">
        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>--><form action="javascript:void(0)" id="form_" class="form form-horizontal" z-index="7500"><input type="hidden" id="npsn" name="npsn" value="20330283"   tabindex="1001"  class=" col-xs-12  required" ><div class="form-group" style="margin-bottom:5px">
								<label class="col-xs-3 control-label no-padding"  for="nama_kepsek">NAMA KEPSEK</label>
								<div class="col-xs-9"><input autocomplete="off"  type="text" id="nama_kepsek" name="nama_kepsek" value=""   tabindex="1024"  style="" class="input-sm col-xs-12 "  ></div>

							</div>
							<div class="form-group" style="margin-bottom:5px">
								<label class="col-xs-3 control-label no-padding"  for="nip_kepsek">NIP KEPSEK</label>
								<div class="col-xs-9"><input autocomplete="off"  type="text" id="nip_kepsek" name="nip_kepsek" value=""   tabindex="1025"  style="" class="input-sm col-xs-12 "  ></div>

							</div>
							<div class="form-group" style="margin-bottom:5px">
								<label class="col-xs-3 control-label no-padding"  for="no_hp_kepsek">NO HP KEPSEK</label>
								<div class="col-xs-9"><input autocomplete="off"  type="text" id="no_hp_kepsek" name="no_hp_kepsek" value=""   tabindex="1026"  style="" class="input-sm col-xs-12 "  ></div>

							</div>
							<div class="form-group" style="margin-bottom:5px">
								<label class="col-xs-3 control-label no-padding"  for="email_kepsek">EMAIL KEPSEK</label>
								<div class="col-xs-9"><input autocomplete="off"  type="text" id="email_kepsek" name="email_kepsek" value=""   tabindex="1027"  style="" class="input-sm col-xs-12 "  ></div>

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
	
		//$("form input:text").keypress(function (e) {
//			if (e.which == 13) $(this).parents("form:first").submit();
		//});

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
				<script type="text/javascript" src="<?php echo base_url();?>assets/template/admin/plugins/datepicker/bootstrap-datepicker.js"></script>

<script type="text/javascript">

	$(document).ready(function (e)
    {
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
            }
        });
		
        function saveThis(aidi)
        {

            var form = $('#form_');
            var action = '55a270efbba682a200651fc11f55bd0ff8162b39';
            $.ajax({
                url: 'incs/gateway.php',
                data: form.serialize() + '&tipe=2&action=' + action + '&target=d9ff31613f9b5256569e699e886011774620de02',
                type: 'post',
                dataType: 'json'
            }).done(function ()
            {
                bootbox.hideAll();
                $('#menuForm').submit();

            })
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
            })
        }


    });
	
</script>

