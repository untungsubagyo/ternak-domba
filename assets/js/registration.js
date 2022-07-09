var FormValidation = function () {

    var allKabkota = $('#kode_wilayah_kabkota option')

    // basic validation

    var handlePencarian = function() {

        $("#form_pencarian").submit(function(e) {

            var url = "/cari"; // the script where you handle the form input.
            console.log($("#form_pencarian").serialize());

            $.ajax({
               type: "POST",
               url: url,
               dataType: "json",
               data: $("#form_pencarian").serialize(), // serializes the form's elements.
               success: function(json)
               {
                    alert(json.message); // show response from the php script.

                    // Add choices to the sekolah dropdown
                    // console.log(json);

                    var sel = $("#ptk_id");
                    sel.empty();
                    for (var i=0; i< json.sekolahs.length; i++) {
                      sel.append('<option value="' + json.sekolahs[i].ptk_id + '">' + json.sekolahs[i].nama_smk + '</option>');
                    }

                    $('#ptk_id').change(function () {                        
                        var npsnIdx = $("#ptk_id option:selected").index();
                        console.log(npsnIdx + ' terpilih');

                        $('#npsn').val(json.sekolahs[npsnIdx].npsn);
                        console.log(json.sekolahs[npsnIdx].npsn + ' diset');

                    });

                    // Normalize combo first
                    var opts = allKabkota;
                    $.each(opts, function (i, j) {
                        $(j).appendTo('#kode_wilayah_kabkota');
                    });

                    // Then set it
                    $.each(json.data, function(name, val){
                        var $el = $('[name="'+name+'"]'), 
                            type = $el.attr('type');

                        switch(type){
                            case 'checkbox':
                                $el.attr('checked', 'checked');
                                break;
                            case 'radio':
                                $el.filter('[value="'+val+'"]').attr('checked', 'checked');
                                break;
                            default:
                                $el.val(val);
                        }
                    });
               }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    }

    var handleValidationRegistrasi = function() {
        
        // for more info visit the official plugin documentation: 
        // http://docs.jquery.com/Plugins/Validation
        var form_registrasi = $('#form_registrasi');
        var error1 = $('.alert-danger', form_registrasi);
        var success1 = $('.alert-success', form_registrasi);

        form_registrasi.submit(function(e) {
            e.preventDefault();
        }).validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block help-block-error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",  // validate all fields including form hidden input
            messages: {
            },
            rules: {
                nama: {
                    minlength: 2,
                    required: true
                },
                email: {
                    minlength: 2,
                    email: true,
                    required: true
                },
                nuptk: {
                    minlength: 16,
                    number: true
                },
                nip: {
                    minlength: 18,
                    number: true
                },
                id_pegawai: {
                    minlength: 7
                },
                npwp: {
                    minlength: 15,
                    number: true
                },
                no_hp: {
                    minlength: 9,
                    number: true,
                    required: true
                },
                alamat_jalan: {
                    minlength: 10,
                    required: true
                },
                nama_smk: {
                    minlength: 6,
                    required: true
                },
                npsn: {
                    minlength: 8,
                    number: true,
                    required: true
                },
                nama_propinsi: {
                    required: true
                },
                nama_kabkota: {
                    required: true
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit              
                success1.hide();
                error1.show();
                App.scrollTo(error1, -200);
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                    .closest('.form-group').addClass('has-error'); // set error class to the control group
            },

            unhighlight: function (element) { // revert the change done by hightlight
                $(element)
                    .closest('.form-group').removeClass('has-error'); // set error class to the control group
            },

            success: function (label) {
                label
                    .closest('.form-group').removeClass('has-error'); // set success class to the control group
            },

            submitHandler: function (form) {
                
                // alert('Clicked!');
                // success1.show();
                error1.hide();

                var url = "/simpan"; // the script where you handle the form input.
                console.log($("#form_registrasi").serialize());

                $.ajax({
                   type: "POST",
                   url: url,
                   dataType: "json",
                   data: $("#form_registrasi").serialize(), // serializes the form's elements.
                   success: function(json)
                   {
                        alert(json.message); // show response from the php script.
                   }
                });

                // e.preventDefault(); // avoid to execute the actual submit of the form. 
                return false;              
            }
        });

        //initialize datepicker
        $('.date-picker').datepicker({
            rtl: App.isRTL(),
            autoclose: true
        });
        
        // $('.date-picker .form-control').change(function() {
        //     form3.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
        // })        
        $('#kode_wilayah_propinsi').change(function () {
            $('#kode_wilayah_kabkota option').remove()
            var classN = $('#kode_wilayah_propinsi option:selected').prop('class');
            var opts = allKabkota.filter('.' + classN);
            $.each(opts, function (i, j) {
                $(j).appendTo('#kode_wilayah_kabkota');
            });
        });
    }


    return {
        //main function to initiate the module
        init: function () {
            handlePencarian();
            handleValidationRegistrasi();
        }

    };

}();

jQuery(document).ready(function() {
    FormValidation.init();
});