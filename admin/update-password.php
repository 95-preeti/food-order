<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>change password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
                <td>current password:</td>
                <td>
                    <input type="password" name="current_password" placeholder="old password">
                </td>
            </tr>

            <tr>
                <td>new password:</td>
                <td>
                    <input type="password" name="new_password" placeholder="New password">
                </td>
            </tr>

            <tr>
                <td>Confirm password:</td>
                <td>
                    <input type="password" name="confirm_paswords" placeholder="confirm password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="change password" class="btn-secondary">
                </td>
            </tr>
        </table>

        </form>

    </div>
</div>

<?php 
      
      //check whether the submit button is clicked on not
      if(isset($_POST['submit']))
      {
        //echo "clicked"

        //1.Get the data from form 
        $id=$_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password =md5($_POST['confirm_password']);

        //2.check whether the user with current ID and current password exists or not
        $sql ="SELECT * FROM tbl_admin WHERE id=$id AND password= '$current_password'";

        //Execute the query 
        $res = mysqli_query($conn,$sql);

        if($res==true)
        {
            //check whether data is available or not
            $count=mysqli_num_rows($res);

            if($count==1)
            {
                //user exists and password can be changed
                //echo "user found";

                //check whether  the new password and confirm match or not
                if($new_password==$confirm_password)
                {
                    //update the password
                    $sql2 ="UPDATE tbl_admin SET
                         password='$new_password'
                         WHERE id=$id
                         ";

                         //Execute the Query
                         $res2 = mysqli_query($conn,$sql2);

                         //check whether the query exeuted or not
                         if($res2==true)
                         {
                            //Display sucess message
                             //Redirect to manage admin page with success message
                            $_SESSION['change-pwd'] ="<div class='success'>password changed successfully. </div>";
                            //Redirect the user
                             header('location:'.SITEURL.'admin/manger-admin.php');
                         }
                         else
                         {
                            //Display error message
                             //Redirect to manage admin page with error message
                             $_SESSION['change-pwd'] ="<div class='error'>failed to changed password. </div>";
                             //Redirect the user
                              header('location:'.SITEURL.'admin/manger-admin.php');
                          }
                         }
                }
                else
                {
                    //Redirect to manage admin page with error message
                    $_SESSION['pwd-not-match'] ="<div class='error'>password did not match. </div>";
                    //Redirect the user
                    header('location:'.SITEURL.'admin/manger-admin.php');
                }

                

            }
            else
            {
                //user does not exist set message and changed
                $_SESSION['user-not-found'] ="<div class='error'>user not found. </div>";
                //Redirect the user
                header('location:'.SITEURL.'admin/manger-admin.php');
            }
            
        }

        //3.check whether the new password and confirm password match or not

        //4.change password if all above is true
      


?>

<?php include('partials/footer.php'); ?>
