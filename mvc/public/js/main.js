jQuery(document).ready(function ($) {
    $(".oderBy").on("change", function () {
        let url = window.location.href.split('?')[0] + "?orderBy=" + $(".oderBy").val();
        window.location = url;
    })

    $("#order").submit(function(e){
        e.preventDefault();
        let required = false;
        $("#order .required").map(function() {
            if ('' == this.value.trim()) {
                this.classList.add("required-error");
                required = true;
            }
        });
        if (required) {
            $("#myModal .modal-body").text('There are some fields is required.');
            $("#myModal").modal()
        } else {
            let data = $("#order").serialize();
            let url = 'http://localhost/ecommerce/Order/ordering';
            $.ajax({
                url: url,
                method: 'post',
                data: data,
                error: function() {
                    $("#myModal .modal-body").text('Order error. Please try again!');
                    $("#myModal").modal()
                },
                success: function(result){
                    if (result) {
                        $("#checkout-success .modal-body").text('Order success!');
                        $("#checkout-success").modal({backdrop: 'static', keyboard: false})
                    } else {
                        $("#myModal .modal-body").text('Order error. Please try again!');
                        $("#myModal").modal()
                    }
                }
            });
        }
    });
});

function remove(id) {
    let url = window.location.href.split('?')[0] + "/removeCart";
    $.ajax({
        url: url,
        method: 'post',
        data: {
            'product_id': id
        },
        error: function() {

        },
        success: function(result){
            if (result) {
                let el = "#cart-item-" + id;
                $(el).empty();
                let total = 0;
                let all = $(".sub-total").map(function() {
                    total += parseInt(this.innerHTML);
                }).get();
                if (total > 0) {
                    $(".total").html(total)
                    $("#myModal .modal-body").text('Remove product success.');
                } else {
                    $(".cart-show").empty();
                    $("#myModal .modal-body").text('Your cart is empty.');
                }
            } else {
                $("#myModal .modal-body").text('Remove product error. Please try again!');
            }
            $("#myModal").modal()
        }
    });
}