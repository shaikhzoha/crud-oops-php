<?php 
    include_once 'database.php';
    //include_once 'show.php'; 

    $obj = new database();
    $obj->update();
    
    $id = $_GET['e_id'];
    //print_r($id);
    $result= $obj->get_record($id);
    // print_r($result);
    if($result){
    $row = mysqli_fetch_assoc($result); 
        echo"running";
    }
    else{
       echo"error";
    }


?>
<!doctype html>
  <head>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
      <?php $obj->update();?>
    <form method = "POST">
    
    <div class="form-group">
              <label for="id">id</label>
              <input type="text" class="form-control" id="id" name="id" value="<?php echo  $row['id'];?>" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?php echo  $row['name'];?>" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
                  <label for="lastname">Last Name</label>
              <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo  $row['lastname'];?>" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email"  value="<?php echo  $row['email'];?>" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="<?php echo  $row['phone'];?>" aria-describedby="emailHelp">
      </div>
      <div class="modal-footer d-block mr-auto">   
      <button type="submit" name="update" class="btn btn-primary">Update</button>
      
       </div>
       <!-- <div>
          <table class="table" id="myTable">
          <thead>
            <tr>
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
               while($row = mysqli_fetch_assoc($result))
               {
                  $ename= $row['email'];
                  echo "<tr>
                  <td>". $row['name'] . "</td>
                  <td>". $row['lastname'] . "</td>
                  <td>". $row['email'] . "</td>
                  <td>". $row['phone'] ."</td>
                  <td><a class='btn btn-info' href= '/oops_crud/edit.php?e_id= $id' id='edit' name='edit'>Edit</a>
                  <a class='btn btn-info' href = '/oops_crud/delete.php?d_id=$id' id='delete' name='delete'>Delete</a></td>
                //   <td><a class='btn btn-info' href= '/crud/edit.php?id=$ename' id='edit' name='edit'>Edit</a><a class='btn btn-info' href = '/crud/delete.php?id=$ename' id='delete' name='delete'>Delete</a></td>
                  </tr>";
               } 
            }
            ?>
          </tbody>
          </table>
        </div>
            -->
        </form>
      </body>
</html>