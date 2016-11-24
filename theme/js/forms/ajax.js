/* ========================================================================
 * ajax.js
 * ======================================================================== */

/* global Ladda */

'use strict';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'parsley',
            'ladda'
        ], factory);
    } else {
        factory();
    }
}(function () {
    
    function swapElement(array, indexA, indexB) {
        var tmp = array[indexA];
        array[indexA] = array[indexB];
        array[indexB] = tmp;
    }
    
    function addButtons(id) {
        var buttons = '<a id="a-' + id + '" data-id="' + id + '" class="btn btn-sm btn-danger delete-btn" data-toggle="modal" data-target="#confirm-delete" data-tooltip="true">';
            buttons += '<i class="glyphicon glyphicon-minus" aria-hidden="true"></i>';
            buttons += '</a>';
            buttons += '<a data-id="' + id + '" class="btn btn-sm btn-default edit-btn" data-toggle="modal" data-target="#confirm-edit" data-tooltip="true">';
            buttons += '<i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>';
            buttons += '</a>';
            
        return buttons;
    }

    $(function () {
        
        // call ajax
        // ================================
        $('#modal-delete-btn').on('click', function (e) {
            
            var ele = $(this);
            
            $.ajax({
                type: 'post',
                url: 'home/ajaxDelete',
                dataType: 'json',
                data: {'id': ele.data('id')},
                success: function(data, textStatus, jqXHR)
                {
                    if ( data.success ) {
                        //close the modal
                        ele.removeData('id');
                        $('#confirm-delete').modal('toggle');
                        
                        // remove the row
                        var table = $('#entries-tbl').DataTable();
                        table.row( $('#a-' + ele.data('id') ).parents('tr') ).remove().draw( false );
                        
                    }
                },
                error: function(xhr, desc, err) {
                    console.log(xhr);
                    console.log("Details: " + desc + "\nError:" + err);
                }
            });
            
            e.preventDefault();
        });
        
        $('#modal-edit-btn').on('click', function (e) {
            
            var $form   = $('#edit-form'),
                data    = $form.serialize(),
                url     = 'home/ajaxUpdate';
                
            var data_arr = $form.serializeArray();
            var arr = new Array();
            $.each(data_arr, function(i, obj){
                arr[i] = obj.value;
                console.log(obj);
            });
            var id = data_arr[3].value;
            console.log(data_arr);
            delete data_arr[3];
            
            swapElement( arr, 0, 3 )
            arr.shift();
            
            var buttons = addButtons(id);
            arr.push(buttons);
            console.log(arr);
                
            if ($form.parsley().validate()) {
                
                $.ajax({
                    type: 'post',
                    url: url,
                    dataType: 'json',
                    data: data,
                    success: function(data, textStatus, jqXHR)
                    {
                        if ( data.success ) {
                            //close the modal
                            $('#confirm-edit').modal('toggle');
                            
                            // edit the row
                            var table = $('#entries-tbl').DataTable();
                            table.row( $('#a-' + id ).parents('tr') )
                                 .data( arr )
                                 .draw();
                            
                        }
                    },
                    error: function(xhr, desc, err) {
                        console.log(xhr);
                        console.log("Details: " + desc + "\nError:" + err);
                    }
                });
                
            }
            
            e.preventDefault();
        });
        
        $('#save-item-btn').on('click', function (e) {
            var $form   = $('#insert-form'),
                $btn    = $(this),
                type    = $form.attr('method'),
                url     = 'home/ajaxCreate';

            if ($form.parsley().validate()) {
                var data    = $form.serialize();
                
                $.ajax({
                    type: type,
                    url: url,
                    dataType: 'json',
                    data: data,
                    success: function(data, textStatus, jqXHR)
                    {
                        // ladda.stop();
                        if ( data.success == true ) {
                            
                            var buttons = addButtons(data.id);
                            
                            var table = $('#entries-tbl').DataTable();
                            var rowNode = table
                                .row.add( [
                                           $form.find('input[name=title]').val(),
                                           $form.find('input[name=calories]').val(),
                                           $form.find('input[name=date]').val(),
                                           buttons
                                           ] )
                                .draw(false);
                                //.node();
                             
                            //$( rowNode )
                                //.css( 'color', '#449d44' );
                            
                            $('#my-modal').modal('toggle');
                        }
                        else {
                            console.log('not inserted');
                        }
                        
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        // Handle errors here
                    }
                });
            }

            e.preventDefault();
        });
        
        $('#search-btn').on('click', function (e) {
            var $form   = $('#search-form'),
                type    = $form.attr('method'),
                data    = $form.serialize(),
                url     = 'filter/ajaxSearch/';
                
            var limit = $form.find('input[name=exp_calories]').val();
                
            if ($form.parsley().validate()) {
                $.ajax({
                    type: type,
                    url: url,
                    dataType: 'json',
                    data: data,
                    success: function(response, textStatus, jqXHR)
                    {
                        var table = $('#filter-tbl').DataTable();
                        table.destroy();
                        $('#filter-tbl').empty();

                        table = $('#filter-tbl').DataTable({
                            'dom': '<"row"<"col-sm-6"l><"col-sm-6"f>><"table-responsive"rt><"row"<"col-sm-6"p><"col-sm-6"i>>',
                            'order': [[ 0, "desc" ]],
                            'columns': [
                                { 'title': 'Date', 'data': 'date' },
                                { 'title': 'Total Calories', 'data': 'total' }
                            ],
                            "createdRow": function ( row, data, index ) {

                                if ( parseFloat(data.total) > parseFloat(limit) ) {
                                    $('td', row).eq(1).css( 'color', 'red' );
                                }
                                else {
                                    $('td', row).eq(1).css( 'color', 'green' );
                                }
                            }
                        });
                        table.rows.add(response.data);
                        table.draw();
                    },
                    error: function(jqXHR, textStatus, errorThrown)
                    {
                        // Handle errors here
                    }
                    });
            }

            e.preventDefault();
        });
    });

}));