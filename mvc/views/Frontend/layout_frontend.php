<!DOCTYPE html>
<html>
<head>
<title>Ecommerce</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <?php 
        include "header.php";
        include "pages/" . $data["page"] . ".php";
        include "footer.php"; 
    ?>
</body>