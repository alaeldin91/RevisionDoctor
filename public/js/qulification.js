$(document).ready(function(){
    var url = $('#url').val();
    $('#btn_add').click(function(){
        $('#btn-save').val("add");
        $('#frmqly').trigger("reset");
        $('#Qly').modal('show');
    });



   
});