

var Dashboard2 = function() {

    return {


        responsiveTable: function(){

            var table = $('#foto_terkirim'); //.DataTable({})

            if($.fn.dataTable.isDataTable( '#foto_terkirim' )) return false;
			
            // console.log("/progress_profile_foto_terkirim_json/" + sekolah_id );
 
            var oTable = table.dataTable({
                // Internationalisation. For more info refer to http://datatables.net/manual/i18n
                "language": {
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                    "emptyTable": "No data available in table",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "infoEmpty": "No entries found",
                    "infoFiltered": "(filtered1 from _MAX_ total entries)",
                    "lengthMenu": "_MENU_ baris",
                    "search": "Cari: ",
                    "zeroRecords": "No matching records found" 
                },

                // Or you can use remote translation file
                //"language": {
                //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
                //},

                // setup buttons extentension: http://datatables.net/extensions/buttons/
                
                buttons: [
                    // { extend: 'print', className: 'btn dark btn-outline' },
                    // { extend: 'pdf', className: 'btn green btn-outline' },
                    // { extend: 'csv', className: 'btn purple btn-outline ' }
                ],
                
                // setup responsive extension: http://datatables.net/extensions/responsive/
                responsive: {
                    details: {

                    }
                },

                "order": [
                    [0, 'asc']
                ],


                "processing": true,
                //"serverSide": true,
                //"ajax": "<?php echo base_url();?>progress_profile_foto_terkirim_json/" + sekolah_id ,
                "columns": [
                    { "data": "row_number" }, 
                    { "data": "nama_obyek" },
                    { "data": "is_exists" },
                    { "data": "foto_id" }
                ],
                "columnDefs": [
                    {
                        "targets": 0,
                        "orderable": false
                    },{
                        "targets": 2,
                        "orderable": false
                    },{
                        "targets": 3,
                        "orderable": false
                    }
                ],




                "lengthMenu": [
                    [5, 10, 15, 20, -1],
                    [5, 10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "pageLength": 10,

                "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

                // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
                // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js).
                // So when dropdowns used the scrollable div should be removed.
                //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
            });


        },

        initFancyBox: function () {
            
            $('body').delegate( '.icon_gambar', 'click', function (){

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

        },

        init: function() {
            this.responsiveTable();
            this.initFancyBox();
        }
    }

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function() {
        Dashboard2.init(); // init metronic core componets
    });
}