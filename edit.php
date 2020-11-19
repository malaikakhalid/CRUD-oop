<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $db->update();
    $id = $_GET['id'];
    $result = $db->get_record($id);
    $data = mysqli_fetch_array($result);
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
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Update Record </h2>
                    </div>
                        <?php $db->Store_Record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                <input type="text" name="ID" disabled class="form-control mb-2" value="<?php echo $data['user_id']; ?>">
                                <input type="text" name="First" placeholder=" First Name" class="form-control mb-2" required value="<?php echo $data['fname']; ?>">
                                <input type="text" name="Last" placeholder=" Last Name" class="form-control mb-2" required value="<?php echo $data['lname']; ?>">
                                <input type="text" name="UserName" placeholder=" User Name" class="form-control mb-2" required value="<?php echo $data['username']; ?>">
                                <input type="Email" name="UserEmail" placeholder=" User Name" class="form-control mb-2" required value="<?php echo $data['email']; ?>">
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_update"> Update </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>