<div class="container d-flex">
	<div class="product-img">
		<img class="img-fluid" src="<?php echo $data['data']['img']?>">
	</div>
	<div>
		<h1><?php echo $data['data']['product_name'] ?></h1>
		<h3><?php echo $data['data']['detail'] ?></h3>
		<div style="background-color: #50b7d6">
			<h3>Price: <?php echo $data['data']['price'] ?><h3>
		</div>
		<div>
			<input id="name" type="hidden" value="<?php echo $data['data']['quantity'] ?>">
			<form id="addCart" name="add" action="<?php echo constant("HOST")?>/Cart/addToCartAndViewCart/<?php echo $data['data']['id'] ?>" method="POST">
				<p>The remaining amount: <span id="quantityInStock"> <?php echo $data['data']['quantity'] ?> </span><p>
				<div class="d-flex quantity-add-cart">
					<label>Quantity:</label>
					<input class="form-control ml-2" type="number" min="0" id="quantity" name="quantity"><br><br>
				</div>
				<div class="d-flex mt-2">
					<input class="btn btn-info mr-2" type="button" id="addToCart" value="Add to Cart">
					<input class="btn btn-primary" type="submit" value="Buy now">
				</div>

			</form>
		</div>
	</div>
</div>
<script>
    function validateForm() {
        let x = document.forms["add"]["quantity"].value;
        let quantity_in_stock = document.getElementById('quantityInStock').innerHTML
        if (x > parseInt(quantity_in_stock)) {
            alert("Quantity in stock is not enough");
            return false;
        } else if (x == 0) {

            $("#myModal .modal-body").text('Quantity must not = 0.')
            $("#myModal").modal()
        } else {
            return true;
        }
    }
    jQuery( document ).ready(function($) {

        $("#addCart").submit(function(e){
            let validateData = validateAddCart();
            if (!validateData) {
                e.preventDefault()
                $("#myModal").modal()
            }
        });

        $("#addToCart").on('click', function () {
            let validateData = validateAddCart();
            if (!validateData) {
                $("#myModal").modal()
            } else {
                let url = "<?php echo constant("HOST")?>/Cart/addToCart/<?php echo $data['data']['id'] ?>";
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {
                        'quantity':   $('#quantity').val()
                    },
                    error: function() {
                        $("#myModal .modal-body").text('Add product error. Please try again!')
                        $("#myModal").modal()
                    },
                    success: function(){
                        $("#myModal .modal-body").text('Add product success.')
                        $("#myModal").modal()
                    }
                });
            }
        })

	    function validateAddCart() {
            let quantity = $("#quantity").val();
            let quantity_in_stock = parseInt($("#quantityInStock").html());
            if (quantity > quantity_in_stock) {
                $("#myModal .modal-body").text('Quantity in stock is not enough.')
	            return false;
            } else if (quantity <= 0 || isNaN(quantity)) {
                $("#myModal .modal-body").text('The number must be at least 1.')
                return false;
            }
            return true;
        }
    });
</script>