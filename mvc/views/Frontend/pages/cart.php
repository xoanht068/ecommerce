<?php
	$total = 0;
?>
<h1>Shopping Cart</h1>

<?php if (count($data['data']) > 0) { ?>
	<div class="cart-show">
		<h5>Number of Items:</h5>
		<div>
			<table class="table table-striped">
				<thead>
				<tr>
					<th scope="col"></th>
					<th scope="col">PRODUCT</th>
					<th scope="col">QUANTITY</th>
					<th scope="col">PRICE</th>
					<th scope="col">TOTAL</th>
					<th scope="col"></th>
				</tr>
				</thead>
				<tbody>
				<?php for ($i = 0; $i < count($data['data']); $i++) {
					$total += $data['quantity'][$i]['quantity'] * $data['data'][$i]['price'];
					?>
					<tr id="cart-item-<?php echo $data['data'][$i]['id'] ?>">
						<td><img class="img-fluid product-img-cart" src="<?php echo $data['data'][$i]['img'] ?>"></td>
						<td><a href="<?php echo constant("HOST")?>/Shop/detail/<?php echo $data['data'][$i]['id'] ?>"><?php echo $data['data'][$i]['product_name'] ?></a></td>
						<td><?php echo $data['quantity'][$i]['quantity'] ?></td>
						<td><?php echo $data['data'][$i]['price'] ?></td>
						<td class="sub-total"><?php echo $data['quantity'][$i]['quantity'] * $data['data'][$i]['price'] ?></td>
						<td><button class="btn btn-danger" onclick="remove(<?php echo $data['data'][$i]['id'] ?>)">Remove</button></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			<div class="d-flex">
				<h3>Total: <span class="total"><?php echo $total; ?></span></h3>
				<button class="btn btn-primary ml-auto" data-toggle="modal" data-target="#checkout">Check out</button>

			</div>
		</div>
	</div>
	<div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<form id="order">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Checkout Information</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="form-group col-12 col-md-6">
								<label for="recipient-name" class="col-form-label">First name:</label>
								<input type="text" name="first_name" class="form-control required">
							</div>
							<div class="form-group col-12 col-md-6">
								<label for="recipient-name" class="col-form-label">Last name:</label>
								<input type="text" name="last_name" class="form-control required">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12 col-md-6">
								<label for="recipient-name" class="col-form-label">Email:</label>
								<input type="email" name="email" class="form-control required">
							</div>
							<div class="form-group col-12 col-md-6">
								<label for="recipient-name" class="col-form-label">Phone:</label>
								<input type="text" name="phone" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12 col-md-6">
								<label for="recipient-name" class="col-form-label">Address 1:</label>
								<input type="text" name="address1" class="form-control required">
							</div>
							<div class="form-group col-12 col-md-6">
								<label for="recipient-name" class="col-form-label">Address 2:</label>
								<input type="text" name="address2" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="form-group col-12 col-md-6">
								<label for="recipient-name" class="col-form-label">City:</label>
								<input type="text" name="city" class="form-control required">
							</div>
							<div class="form-group col-12 col-md-6">
								<label for="recipient-name" class="col-form-label">Country:</label>
								<select class="form-control" name="country">
									<?php foreach ($data["countryList"] as $country) { ?>
									<option value="<?php echo $country[0]; ?>"><?php echo $country[1]; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Order</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="checkout-success">
		<div class="modal-dialog">
			<div class="modal-content">

				<!-- Modal body -->
				<div class="modal-body">
				</div>

				<!-- Modal footer -->
				<div class="modal-footer">
					<a href="<?php echo constant("HOST")?>/Shop"><button type="button" class="btn btn-info">Continue shopping</button></a>
					<a href="<?php echo constant("HOST")?>/Order"><button type="button" class="btn btn-primary">View orders</button></a>
				</div>

			</div>
		</div>
	</div>
<?php } else { ?>
	<p>Your cart is currently empty.</p>
<?php } ?>