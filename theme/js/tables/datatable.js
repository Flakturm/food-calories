/* ========================================================================
 * datatable.js
 * Page/renders: table-datatable.html
 * Plugins used: datatable
 * ======================================================================== */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'datatables'
        ], factory);
    } else {
        factory();
    }
}(function () {

    $(function () {
        // zero configuration
        // ================================
        if ( $('#entries-tbl').length > 0 ) {
            var oTable = $('#entries-tbl').dataTable(
            {
                'dom': '<"row"<"col-sm-6"l><"col-sm-6"f>><"table-responsive"rt><"row"<"col-sm-6"p><"col-sm-6"i>>',
                'order': [[ 2, "desc" ]],
                'autoWidth': false,
                'deferRender': true,
                'processing': true,
                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;
         
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
         
                    // Total over all pages
                    var total = api
                        .column( 1 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
         
                    // Total over this page
                    var pageTotal = api
                        .column( 1, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
         
                    // Update footer
                    $( api.column( 0 ).footer() ).html(
                        'Page total: ' + parseFloat(pageTotal).toFixed(2) + ' cal<br>Total: ' + parseFloat(total).toFixed(2) + ' cal'
                    );
                }
            });
             
            oTable.yadcf(
            [
                {
                    column_number : 2,
                    datepicker_type: "bootstrap-datetimepicker",
                    filter_type: "range_date",
                    date_format: "D-M-YYYY HH:mm:ss",
                    filter_delay: 500
                }
            ]);
        }
        
        if ( $('#filter-tbl').length > 0 ) {
            $('#filter-tbl').DataTable({
                'dom': '<"row"<"col-sm-6"l><"col-sm-6"f>><"table-responsive"rt><"row"<"col-sm-6"p><"col-sm-6"i>>'
            });
        }
    });

}));