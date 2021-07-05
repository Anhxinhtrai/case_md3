function cartUpdate(event) {
    event.preventDefault();
    let urlUpdateCart = $('.update-cart-url-1').data('url')
    let id = $(this).data("id");
    let quantity = $(this).parents('tr').find('input.cart_quantity_input').val();
    $.ajax({
        type: "GET",
        url: urlUpdateCart,
        data: {
            id: id,
            quantity: quantity
        },
        success: function (data) {
            if (data.code === 200) {
                $('.cart_wrapper').html(data.cart_component)
            }
        },
        error: function () {
        }
    })
}

function cartDelete(event){
    event.preventDefault();
    let id = $(this).data("id");
    let urlDelete = $('.cart_info').data('url');
    $.ajax({
        type: "GET",
        url: urlDelete,
        data: {
            id: id
        },
        success: function (data) {
            if (data.code === 200) {
                $('.cart_wrapper').html(data.cart_component)
            }
        },
        error: function () {

        }
    })
}

$(

function () {
    $(document).on('input','.update-quantity', cartUpdate)
    $(document).on('click','.cart_quantity_delete', cartDelete)
}

)

// function upQuantity(id) {
//     return document.getElementById("quantity-" + id).value++
// }
//
// function downQuantity(id) {
//     return document.getElementById("quantity-" + id).value--
//
// }
