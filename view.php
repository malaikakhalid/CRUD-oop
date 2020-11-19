<?php 
    
    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $result=$db->view_record();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Crud Operation in Php Using OOP</title>
</head>
<body class="bg-dark">

  
  <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center text-dark"> Employees Record </h2>
                    </div>
                    <div class="card-body">
                    <?php
                              $db->display_message(); 
                              
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 10%"> ID </td>
                                <td style="width: 10%"> First Name </td>
                                <td style="width: 20%"> Last Name </td>
                                <td style="width: 20%"> User Email </td>
                                <td style="width: 20%"> User Name </td>
                                <td style="width: 20" colspan="2">Operations</td>
                            </tr>
                            <tr>
                            <?php
                                              	$i=1;
                                            	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
  	                                         	echo "<tr>";
                                                echo "<td>".$i++."</td>";
                                                  echo "<td>".$row['fname']."</td>";
                                                  echo "<td>".$row['lname']."</td>";
                                                  echo "<td>".$row['email']."</td>";
                                                  echo "<td>".$row['username']."</td>";
                                                echo "<td><a href='edit.php?id=".$row['user_id']."' class='btn btn-primary'>Update</a></td>";
  		                                        echo "<td><a href='del.php?id=".$row['user_id']."' class='btn btn-danger'>Delete</a>  	</td>";
  	                                        	echo "</tr>";
                                             	}
                                       ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>