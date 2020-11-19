<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operations extends dbconfig
    {





        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $FirstName = $_POST['First'];
                $LastName = $_POST['Last'];
                $UserName = $_POST['UserName'];
                $UserEmail = $_POST['UserEmail'];

                if($this->insert_record($FirstName,$LastName,$UserEmail,$UserName))
                {
                    echo '<div class="alert alert-success"> Your Record Has Been Saved :) </div>';
                    header('location:view.php');
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }


      // Insert Record in the Database Using Query    
        function insert_record($a,$b,$c,$d)
        {
            global $db;
            $query = "insert into user (fname,lname, email,username) values('$a','$b','$c','$d')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

       // View Database Record
        public function view_record()
        {
            global $db;
            $query = "select * from user";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }


        // Get Particular Record
        public function get_record($id)
        {
            global $db;
            $sql = "select * from user where user_id='$id'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }


        public function update()
        {
            global $db;

            if(isset($_POST['btn_update']))
            {
                $id = $_GET['id'];

                $qu= "update user set fname ='".$_POST['First']."',lname ='".$_POST['Last']."',email ='".$_POST['UserEmail']."',username ='".$_POST['UserName']."'  where user_id='$id'";
            $result = mysqli_query($db->connection,$qu);
            if($result)
            {
             
                $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated : )</div>');
                header("location:view.php");
            }
            else
            {
                $this->set_messsage('<div class="alert alert-success"> Something Wrong : )</div>');
            }

               
            }
        }

       


        public function set_messsage($msg)
        {
            if(!empty($msg))
            {
                $_SESSION['Message']=$msg;
            }
            else
            {
                $msg = "";
            }
        }

        // Display Session Message
        public function display_message()
        {
            if(isset($_SESSION['Message']))
            {
                echo $_SESSION['Message'];
                unset($_SESSION['Message']);
            }
        }


        public function Delete_Record($id)
        {
            global $db;
            $query = "delete from user where user_id='$id'";
            $result = mysqli_query($db->connection,$query);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }



     }
?>