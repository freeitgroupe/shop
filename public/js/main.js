/* Search */
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY',
    }
});

products.initialize();

$("#typeahead").typeahead({
    // hint: false,
    highlight: true
},{
    name: 'products',
    display: 'title',
    limit: 10,
    source: products
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion) {
    // console.log(suggestion);
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});



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
    if($('#sumCartAll').val()){
        $('.summ-cart').html($('#sumCartAll').val());
    }else{
        $('.summ-cart').text('Cart is empty!');
    }
    //$('.simpleCart_total').html()
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function (res) {
            addHtmlToCart(res);
        },
        error: function () {
            alert('Error! Try again later.');
        }
    });
}

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            addHtmlToCart(res);
        },
        error: function () {
            alert('Error! Try again later.');
        }
    });
}

$('#miniCart .miniList').on('click', '.deleteItem', function () {
    var id = $(this).data('product');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            addHtmlToCart(res);
        },
        error: function () {
            alert('Error! Try again later.');
        }
    });
});

/*Cart*/
$('#currency').change(function(){
    window.location = '/currency/change?curr=' + $(this).val();
});