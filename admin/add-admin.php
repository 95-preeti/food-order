<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add admin</h1>

        <br/><br/>
       
        <?php 
             if(isset($_SESSION['add'])) //checking whether the session is set of not
             {
              echo $_SESSION['add']; //Display the session message if set
              unset($_SESSION['add']); //Remove session message
             }
        ?>

<form action="" method="post">
   <table class="tbl-30">
    <tr>
        <td>Full Name: </td>
        <td>
            <input type="text" name="full_name" placeholder="enter your name">
        </td>
    </tr>

    <tr>
   <td>username:</td>
    <td>
    <input type="text" name="username" placeholder="your username">
    </td>
 </tr>

 <tr>
    <td>password:</td>
     <td>
    <input type="text" name="password" placeholder="your password">
    </td>
 </tr>

 <tr>
          <td colspan="2">
           <input type="submit" name="submit" value="Add admin" class="btn-secondary">
         </td>
        </tr>
 </table>


      </form>
    </div>
    </div>

<?php include('partials/footer.php');?>


<?php
//Process the value from form and save it in Database

//Check whethar the submit button is clicked or not

if(isset($_POST['submit']))
{
    //Button clicked
    //echo "Button clicked";

    //1.Get the Data from form
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];
    $password=md5($_POST['password']); //password encryption with MD5

    //2.SQL Query to save the data into database 
    $sql="INSERT INTO tbl_admin  SET
          full_name='$full_name',
          username='$username',
          pswd='$password'
          ";

      //3. Executing query and saving data into database
      $res=mysqli_query($conn,$sql);
       
      //4. check whether the (Query is executed) data is inserted or not and display appropirate message
      if($res==TRUE)
      {
        //Data Inserted
        //echo "data inserted";
        //Create a Session Variable to Display Message
        $_SESSION['add']="Admin Added Successfully";
        //Redirect page to Manage Admin
        header("location:".SITEURL.'admin/manage-admin.php');
      }
      else
      {
        //Failed to insert data
        //echo "failed to insert data";
        //echo "data inserted";
        //Create a Session Variable to Display Message
        $_SESSION['add']="Failed to Add Admin";
        //Redirect page to Manage Admin
        header("location:".SITEURL.'admin/add-admin.php');
      }
}


?>