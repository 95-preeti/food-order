<?php include('partials/menu.php');?>

        <!--main content section starts-->
        <div class="main-content">
          <div class="wrapper">
             <h1>Manage Admin</h1>
               <br />

               <?php
                    if(isset($_SESSION['add']))
                    {
                         echo $_SESSION['add'];//Displaying session message
                         unset($_SESSION['add']);//Removing session message
                    }

                    if(isset($_SESSION['delete']))
                    {
                         echo $_SESSION['delete'];
                         unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update']))
                    {
                         echo $_SESSION['update'];
                         unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                         echo $_SESSION['user-not-found'];
                         unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                         echo $_SESSION['pwd-not-match'];
                         unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_session['change-pwd']))
                    {
                         echo $_session['change-pwd'];
                         unset($_SESSION['changed-pwd']);
                    }
                ?>
                <br /><br /><br />

             <!-- Button to Add Admin -->
              <a href="add-admin.php" class="btn-primary">Add Admin</a>
              <br /><br /><br />
              
          <table class="tbl-full">
               <tr>
                    <th>S.N.</th>
                    <th>full name</th>
                    <th>username</th>
                    <th>action</th>
               </tr>

                 <?php 
                      //Query to Get all Admin
                      $sql="SELECT * FROM tbl_admin";
                      //Execute the Query
                      $res = mysqli_query($conn,$sql);

                      //check whether the Query is Executed of not 
                      if($res==TRUE)
                      {
                         //count Rows to check whether we have data in database or not
                         $count = mysqli_num_rows($res); //Function to get all the rows in database

                         $sn=1; //create a variable and assign the value

                         //check the num of rows
                         if($count>0)
                         {
                              //We have data in database
                              while($rows=mysqli_fetch_assoc($res))
                              {
                                  //using while loop to get all the data from database.
                                  //And while loop will run as long as we have data in database
                                  
                                  //Get individual Data
                                  $id=$rows['id'];
                                  $full_name=$rows['full_name'];
                                  $username=$rows['username'];

                                    //display the value in our table
                                    ?>
                                          <tr>
                                              <td><?php echo $sn++; ?>.</td>
                                              <td><?php echo $full_name; ?></td>
                                              <td><?php echo $username;?></td>
                                              <td>
                                                  <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">change password</a>
                                                   <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">update Admin</a>
                                                   <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">delete admin</a>
                                               </td>
                                            </tr>
                                          

                                    <?php

                              }
                         }
                         else
                         {
                              //We do not have data in database
                         }
                      }
                 ?>


              
          </table>
             
        </div>
        </div>
        <!--main content section ends-->

        <?php include('partials/footer.php');?>