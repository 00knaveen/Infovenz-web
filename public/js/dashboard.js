$(document).ready(function () {
    $('.add-product').click(function () {
        $('.product-container').toggleClass('d-none');
    });
    $('.close').click(function() {
        $(this).closest('.alert-success').remove();
    });
    
});