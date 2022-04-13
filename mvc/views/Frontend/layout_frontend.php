<!DOCTYPE html>
<html>
<head>
	<title>Ecommerce</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo constant("HOST")?>/mvc/public/css/style.css">
	<script src="<?php echo constant("HOST")?>/mvc/public/js/main.js"></script>
</head>
<body style="background-color: #e5e3e0">

	    <?php include "header.php"; ?>
	        <div class="container">
		        <?php include "pages/" . $data["page"] . ".php"; ?>
	        </div>
	    <?php include "footer.php"; ?>
	    <div class="modal fade" id="myModal">
		    <div class="modal-dialog">
			    <div class="modal-content">

				    <!-- Modal body -->
				    <div class="modal-body">
				    </div>

				    <!-- Modal footer -->
				    <div class="modal-footer">
					    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
				    </div>

			    </div>
		    </div>
	    </div>
</body>