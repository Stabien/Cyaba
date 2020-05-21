<script>
function sendData() {
    var all_marque = $('.marque');
    var all_attribut = $('.attribut');
    var prix = $('#range').val();
    var marque = [];
    var attribut = [];

    for (i = 0; i < $('.marque').length; i++) {
        if (all_marque[i].checked)
            marque.push(all_marque[i].value);
    }
    for (i = 0; i < $('.attribut').length; i++) {
        if (all_attribut[i].checked)
        attribut.push(all_attribut[i].value);
    }

    $.post(
        'av_photo.php',
        {
            marque: marque,
            attribut: attribut,
            prix: prix
        }
    );
}
</script>
