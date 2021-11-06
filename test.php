<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="">
</head>
<?php
    include_once("connection.php");
?>
<body>
    <table width="500" border="1" >
        <tr>
                <th><strong>User Name</strong></th>
                <th><strong>Password</strong></th>
                <th><strong>Full Name</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Phone</strong></th>
                <th><strong>Address</strong></th>
        </tr>
        <tbody>
        <?php
            $id=1;
            $result=pg_query($conn,"SELCET * FROM user");
            while($row=pg_fetch_array($result,NULL, PGSQL_ASSOC))
            {
            ?>
			<tr>
              <td><?php echo $row["user_name"];?></td>
              <td><?php echo $row["password"];?></td>
              <td><?php echo $row["full_name"];?></td>
              <td><?php echo $row["email"];?></td>
              <td><?php echo $row["phone"];?></td>
              <td><?php echo $row["address"];?></td>
            </tr>
            <?php $id++;}?>
            </tbody>
    </table>
</body>
</html>