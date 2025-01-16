$(document).ready(function () {
    $('.add-product').click(function () {
        $('.product-container').toggleClass('d-none');
        $(".product-container-edit").addClass('d-none');
        $(".product-container-text").html('Add New Product');
        $(".save-update-product").html('Save Product');
        clearProductDetails();
    });
    $('.close').click(function() {
        $(this).closest('.alert-success').remove();
    });
    $(".editProduct").click(function() {
        let row = $(this).closest('tr');
        let proId = row.find('.product-id').text().trim();
        let proName = row.find('td').eq(1).text().trim();
        let proCategory = row.find('td').eq(2).text().trim();
        let proQuantity = row.find('td').eq(3).text().trim();
        let proPrice = row.find('td').eq(4).text().trim();
        let proDescription = row.find('td').eq(5).text().trim();
        let proImage = row.find('.product-image-container img').attr('src') || "No Image";
        $('.product-container-edit').removeClass('d-none');
        $('.product-container').removeClass('d-none');
        $(".productId").val(proId);
        $(".product_category").val(proCategory);
        $('.product_name').val(proName);
        $('.product_quantity').val(proQuantity);
        $('.product_price').val(proPrice);
        // $('.product_image').val(proImage);
        $('.product_description').val(proDescription);
        $(".save-update-product").html('Update Product');
        $(".product-container-text").html('Edit Product');
        $(".cancel-product").removeClass('d-none');
    });
    $(".cancel-button").click(function(){
        clearProductDetails();
        $('.product-container').addClass('d-none');
        $('.product-container-edit').addClass('d-none');
    });
    function clearProductDetails(){
        $(".productId").val("");
        $(".product_category").val("");
        $('.product_name').val("");
        $('.product_quantity').val("");
        $('.product_price').val("");
        $('.product_description').val("");
    }
    $(".delete-product").click(function () {
        let row = $(this).closest('tr');
        let proId = row.find('.product-id').text().trim();
        $(".productId").val(proId);
        $(".awd-ok").attr("href", `/delete/product/${proId}`);
        $(".confirmation-popup-container").removeClass("d-none");
    });
    
    $(".awd-cancel").click(function () {
        $('.productId').val("");
        $(".confirmation-popup-container").addClass("d-none");
    });    
});

