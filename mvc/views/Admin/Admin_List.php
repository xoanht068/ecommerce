<?php
  $userList = $data['userList'];
  ?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<h2>Danh sach nguoi dung</h2>
    <table>
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
    </tr>
    <?php foreach($userList as $product){ ?>
    <tr>
        <td><?php echo $product[1]; ?></td>
        <td><?php echo $product[3]; ?></td>
        <td><?php echo $product[4]; ?></td>
        <td><?php echo $product[5]; ?></td>
        <td><a class="btn btn-primary" href="<?php echo constant("HOST") . '/mvc/Admin/deleteUser/'.$product[0]?>" role="button">Xoa</a><td>
    </tr>
    <?php } ?>
    </table>

</body>
</html>