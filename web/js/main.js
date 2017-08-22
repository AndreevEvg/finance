$(document).ready(function(){
    $(function () {
        $('#datetimepicker6').datetimepicker({
            locale: 'ru',
            format: 'DD.MM.YYYY',
        
        });
        $('#datetimepicker7').datetimepicker({
            useCurrent: false,
            locale: 'ru',
            format: 'DD.MM.YYYY'
        });
        
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
    
    
    $(".search").click(function(){
        var text = $(".name1").val();

        $.ajax({
            type: "POST",
            url: "http://finance.site/web/app_dev.php/reports",         
            data: {
                text: text
            }
        });
    });
});


