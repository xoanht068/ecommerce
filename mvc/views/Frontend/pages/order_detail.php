<div>
	<h2>Order #<?php echo $data["order"][0][0] ?></h2><hr>
	<div class="d-flex">
		<div>
			<h4>Receiver Information</h4>
			<p><?php echo $data["order"][0][3] . " " . $data["order"][0][2]?></p>
			<p><?php echo $data["order"][0][4] ?></p>
			<p><?php echo $data["order"][0][5] ?></p>
			<p><?php echo $data["order"][0][6] ?></p>
		</div>
		<div class="ml-auto">
			<h4>Total: <?php echo $data["total"] ?></h4>
		</div>
	</div>

	<div>
		<table class="table table-striped">
			<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">PRODUCT</th>
				<th scope="col">QUANTITY</th>
				<th scope="col">PRICE</th>
				<th scope="col">TOTAL</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($data["order"] as $order) { ?>
				<tr>
					<td><img class="img-fluid product-img-cart" src="<?php echo $order[14] ?>"></td>
					<td><a href="<?php echo constant("HOST")?>/Shop/detail/<?php echo $order[11] ?>"><?php echo $order[12] ?></a></td>
					<td><?php echo $order[17] ?></td>
					<td><?php echo $order[15] ?></td>
					<td class="sub-total"><?php echo $order[17] * $order[15] ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>
</div>
