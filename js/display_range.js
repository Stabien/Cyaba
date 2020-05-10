$(function() {
    $('#range').next().text('1499');
    $('#range').on('input', function() {
        var $set = $(this).val();
        $(this).next().text($set);
    });
});
