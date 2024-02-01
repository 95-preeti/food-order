<?php include('partials/menu.php');?>

        <div class="main-content">
        <div class="wrapper">
             <h1>manage category</h1>
             <br /><br />

             <!-- Button to Add Admin -->
              <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add category</a>
              <br /><br /><br />
              
          <table class="tbl-full">
               <tr>
                    <th>S.N.</th>
                    <th>full name</th>
                    <th>username</th>
                    <th>action</th>
               </tr>
               <tr>
                    <td>1.</td>
                    <td>preeti</td>
                    <td>preetiyadav</td>
                     <td>
                     <a href="#" class="btn-secondary">update Admin</a>
                    <a href="#" class="btn-danger">delete admin</a>
                    </td>
               </tr>

               <tr>
                    <td>2.</td>
                    <td>preeti</td>
                    <td>preetiyadav</td>
                    <td>
                    <a href="#" class="btn-secondary">update Admin</a>
                    <a href="#" class="btn-danger">delete admin</a>
                    </td>
               </tr>

               <tr>
                    <td>3.</td>
                    <td>preeti</td>
                    <td>preetiyadav</td>
                    <td>
                    <a href="#" class="btn-secondary">update Admin</a>
                    <a href="#" class="btn-danger">delete admin</a>
                    </td>
               </tr>
          </table>
        </div>

        </div>
        
        <?php include('partials/footer.php');?>