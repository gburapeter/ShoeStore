// Kosárba tevés gomb
/*$(document).on('click', '.basket-add', function() {*/
$('.basket-add').on('click', function () {
    console.log("clicked");
    $.ajax({
        type: "POST",
        url: "/webprog/" + username + "/api/basket-add",
        data: {id: $(this).data("product")},
        dataType: "text",
        success: function (response) {
            if (response === "OK") {

                window.alert("Product added to cart");


            } else if (response === "OOS") {
                window.alert("Your shopping cart would contain more amount than possible! Please choose a lower amount");
                window.location = window.location
            }
        },
        error: function () {
            window.alert("Hiba történt a termék kosárba helyezése közben!");
        }
    });
});


/*$(document).on('click', '.basket-add-count', function() {*/

$('.basket-add-count').on('click', function () {

    $.ajax({
        type: "POST",
        url: "/webprog/" + username + "/api/basket-add",
        data: {id: $(this).data("product"), pcs: $("#product-count").val()},
        dataType: "text",
        success: function (response) {
            if (response === "OK") {
                window.alert("Product added to cart");


            } else if (response === "OOS") {
                window.alert("Your shopping cart would contain more amount than we have in stock! Please choose a lower amount");
                window.location = window.location
            }
        },
        error: function () {
            window.alert("Hiba történt a termék kosárba helyezése közben!");
        }
    });
});

function removeOne() {
    console.log($(this).data("product"));
    $.ajax({
        type: "POST",
        url: "/webprog/" + username + "/api/basket-remove",
        data: {id: $(this).data("product")},
        dataType: "text",
        success: function (response, data) {
            if (response === "OK") {
                window.alert("One piece was removed");
                window.location = window.location


            } else {
                window.alert("nem okes 1");
            }
        },
        error: function () {
            window.alert("nem okes 2 ");
        }
    });
}

function removeAll() {
    console.log($(this).data("product"));
    $.ajax({
        type: "POST",
        url: "/webprog/" + username + "/api/basket-remove-all",
        data: {id: $(this).data("product")},
        dataType: "text",
        success: function (response, data) {
            if (response === "OK") {
                window.alert("The product was totally removed");
                window.location = window.location

            } else {
                window.alert("nem okes 1");
            }
        },
        error: function () {
            window.alert("nem okes 2 ");
        }
    });
}

/*
$(document).on('click', '.remove-one', function() {
    console.log($(this).data("product"));
    $.ajax({
        type: "POST",
        url: "/webprog/"+username+"/api/basket-remove",
        data: {id: $(this).data("product")},
        dataType: "text",
        success: function(response, data){
            if(response === "OK") {
                window.alert("OKOKOKOK");
                window.location = window.location


            } else {
                window.alert("nem okes 1");
            }
        },
        error: function(){
            window.alert("nem okes 2 ");
        }
    });
});*/


$(document).on('change', '.quantity-input', function (event) {
    var productName = $(this).data("product");
    var quantity = $(this).val();


    $.ajax({
        type: "POST",
        url: "/webprog/" + username + "/api/set-quantity",
        data: {id: productName, pcs: quantity},
        dataType: "text",
        success: function (response, data) {
            if (response === "OK") {
                window.alert(`Quantity ${quantity} set for ${productName[0].toUpperCase() + productName.slice(1)}`);
                window.location = window.location;

            } else if (response === "OOS") {
                window.alert("Your shopping cart would contain more amount than we have in stock! Please choose a lower amount");
                window.location = window.location;
            }
        },
        error: function () {
            window.alert("nem okes 2 ");
        }
    });


});

$(document).on('click', '.remove-one', removeOne);

/*
$('.form-control').on('input', function() {
    alert("value changed");
});
*/


$(document).on('click', '.remove-all', removeAll);


