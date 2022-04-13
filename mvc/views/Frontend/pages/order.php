<?php if (count($data["orders"]) > 0){ ?>
<div>
	<h5>Order list:</h5>
	<div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">ORDER NUMBER</th>
					<th scope="col">ADDRESS</th>
					<th scope="col">TOTAL</th>
					<th scope="col">DATE</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data["orders"] as $order) { ?>
					<tr>
						<td><a href="<?php echo constant("HOST") . "/order/detail/" . $order[0] ?>"><?php echo $order[0] ?></a></td>
						<td><?php echo $order[1] ?></td>
						<td><?php echo $order[3] ?></td>
						<td><?php echo $order[2] ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php } else { ?>
	<h4>Your order is empty</h4>
<?php }?>
