<?php

         //Include constants.php file here
         include('../admin/config/constants.php');
  
        //1. get the ID of Admin to be deleted
         $id =$_GET['id'];

        //2. create SQL Query to Delete admin
        $sql ="DELETE FROM tbl_admin WHERE id=$id";

        //Execute the Query
        $res = mysqli_query($conn,$sql);

        //check whether the query executed successfully or not
        if($res==true)
        {
             //Query executed successully and Admin Deleted
             //echo "Admin Deleted";
             //create session variable to display message 
             $_SESSION['delete'] ="<div  class='success'>Admin Delete Successfully.</div>";
             //Redirect to manage Admin page 
             header ('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to Delete Admin
           // echo "Failed to Delete Admin";

           $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again later.</div>";
           header ('location:'.SITEURL.'admin/manage-admin.php');
        }

        //3. Redirect to Manage Admin page with message (sucess/error)






?>