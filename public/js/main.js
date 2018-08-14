/*Cart*/
$('body').on('click', '.button-add', function (e) {
    e.preventDefault();
    var id = $(this).data('id'),
        qty = 1;
        sup = false;
        $.ajax({
           url: '/cart/add',
           data: {id: id, qty: qty, sup: sup},
           type: 'GET',
           success: function (res) {
               addHtmlToCart(res);

           },
           error: function () {
               alert('Error! Try again later.');
           }
        });
});

function addHtmlToCart(cart){
    $('.cart-info').html(cart);
    $('.miniCart').fadeIn(800);
}
/*Cart*/
$('#currency').change(function(){
    window.location = '/currency/change?curr=' + $(this).val();
});