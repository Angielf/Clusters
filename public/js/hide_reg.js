$(document).ready(function(){
    $('#myTable').each(function(){
        $(this).find('.tr_h').each(function(){
            if (!($(this).has('.p1').length)) {
                $(this).hide();
            }
        });
    });
});
