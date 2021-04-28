/* tabs set active class */
$('#bologna-list a').on('click', function (e) {
    e.preventDefault()
    $(this).tab('show')
});


$( ".product-quicview" ).click(function() {
    $(this).attr('data-id');
});
