$('#range').on('input', function() {
    var $set = $(this).val();
    $(this).next().text($set);
});
