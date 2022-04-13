<div class="form-group option-product">
	<label>Sort by:</label>
	<select class="form-control oderBy">
		<option <?php echo $data['orderBy'] == "A-Z" || $data['orderBy'] == '' ? "selected" : "" ?> value="A-Z">A-Z</option>
		<option <?php echo $data['orderBy'] == "Z-A" ? "selected" : "" ?> value="Z-A">Z-A</option>
		<option <?php echo $data['orderBy'] == "price" ? "selected" : "" ?> value="price">Price: low to high</option>
		<option <?php echo $data['orderBy'] == "price-desc" ? "selected" : "" ?> value="price-desc">Price: high to low</option>
	</select>
</div>
<input  id="detail" type="hidden" value='<?php echo json_encode($data['data']) ?>'>
<?php
	$product = $data['data'];
?>
<div class="row productList" id="show">
	<?php for ($x = 0; $x < count($product); $x++) { ?>
		<div class="col-12 col-sm-6 col-lg-3 product-item">
			<img class="card-img-top" src="<?php echo $product[$x][3]?>" alt="Card image cap">
			<div class="middle">
				<p class="button-product" onclick="add_to_cart(<?php echo $product[$x][0]?>)">Add to cart</p>
				<a href="<?php echo constant("HOST")?>/Shop/detail/<?php echo $product[$x][0] ?>" ><p class="button-product">View</p></a>
			</div>
			<h4 class="text-center product-detail"><?php echo $product[$x][1] ?></h4>
			<h6 class="text-center product-price"><?php echo Constant::currency . $product[$x][4]; ?></h6>
		</div>
	<?php } ?>
</div>
<script type="text/javascript">
    function add_to_cart(id) {
        let url = "<?php echo constant("HOST")?>/Cart/addToCart/" + id;
        $.ajax({
            url: url,
            method: 'post',
            data: {
                'quantity':   1
            },
            error: function() {
                $("#myModal .modal-body").text('Add product erorr.');
                $("#myModal").modal()
            },
            success: function(result){
                $("#myModal .modal-body").text('Add product success.');
                $("#myModal").modal()
            }
        });
    }
</script>