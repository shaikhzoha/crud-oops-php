
<?php
 include_once 'database.php';
 //include_once 'index.php';
 $obj = new database(); 
  $result = $obj->select();


?>

<!doctype html>
<!-- <title> show </title> -->
<div>
  <!-- <form method="POST"> -->
<table class="table" id="myTable">
          <thead>
            <tr>
              <th>Id</td>
              <th>Name</th>
              <th>Last name</th>
              <th>Email</th>
              <th>phone</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              if($result){

                //echo "i am here";
               //while($row = $obj->fetch_assoc($result))
              
           
               while( $row = mysqli_fetch_assoc($result))
               {
                 //print_r($row);
                  $id = $row['id'];
                  //print_r($id);
                  echo "<tr>
                  <td>". $row['id'] . "</td>
                  <td>". $row['name'] . "</td>
                  <td>". $row['lastname'] . "</td>
                  <td>". $row['email'] . "</td>
                  <td>". $row['phone'] ."</td>
                  <td><a class='btn btn-info' href= '/oops_crud/edit.php?e_id= $id' id='edit' name='edit'>Edit</a>
                  <a class='btn btn-info' href = '/oops_crud/delete.php?d_id=$id' id='delete' onClick=\"javascript: return confirm('Please confirm deletion');\" name='delete'>Delete</a></td>
                  
                  </tr>";
                  
               } 
              }
            ?>
          </tbody>
          <script>
          function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>
          </table>
            <!-- </form> -->
        </div>
        <div>
        <a class='btn-btn-primary' href = '/oops_crud/index.php' id='goback' name='goback'>Go Back</a>
            </div>
</html>

