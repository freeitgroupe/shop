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
               showCart(res);
           },
           error: function () {
               alert('Error! Try again later.');
           }
        });
});

function showCart(cart){
    console.log(cart);
}
/*Cart*/
$('#currency').change(function(){
    window.location = '/currency/change?curr=' + $(this).val();
});