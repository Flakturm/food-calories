$(function () {
    $('#from-date').datetimepicker({
        sideBySide: true,
        format: "D-M-YYYY h:mm:ss"
    });
    $('#to-date').datetimepicker({
        useCurrent: false, //Important! See issue #1075
        sideBySide: true,
        format: "D-M-YYYY h:mm:ss"
    });
    $("#from-date").on("dp.change", function (e) {
        $('#to-date').data("DateTimePicker").minDate(e.date);
    });
    $("#to-date").on("dp.change", function (e) {
        $('#from-date').data("DateTimePicker").maxDate(e.date);
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('#my-modal').on('hidden.bs.modal', function () {
        $(this).find('.empty').val('').end();
    });
    
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('data-id', $(e.relatedTarget).data('id') );
    });
    
    $('#confirm-edit').on('show.bs.modal', function(e) {
        
        var ele = $(this);
        var id = $(e.relatedTarget).data('id');
        
        $.getJSON('home/edit/' + id, function(obj) {
           
            if ( !obj.empty )
            {
                $('#edit-date').datetimepicker({
                    sideBySide: true,
                    format: "D-M-YYYY H:mm:ss",
                    defaultDate: obj.date
                });
                ele.find('input[name="id"]').val( obj.id );
                ele.find('input[name="title"]').val( obj.title );
                ele.find('input[name="calories"]').val( obj.calories );
            }
            
        }).fail( function() {
            alert('Unable to fetch data, please try again later.')
        });
    });
    
    $('#insert-btn').on('click', function() {
        $('#my-modal').modal();
    })

    var datepickerDefaults = {
        showTodayButton: true,
        showClear: true
    };

    var dateNow = new Date();
    $('#date').datetimepicker({
        sideBySide: true,
        format: "D-M-YYYY H:mm:ss",
        defaultDate: dateNow
    });
    
});