<?php
//include_once 'index.php';
//include_once 'show.php';

    class database{
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $db = "student";

        public $conn2 = "";
        public $conn = false;
        
        

       

        public function __construct(){
            if(!$this->conn){
                $this->conn2 = new mysqli($this->servername, $this->username, $this->password, $this->db );
                $this->conn = true;
                
                if($this->conn2->connect_error){
                    echo "error";
                    return false;
                }
                else{
                    // echo "connection done";
                    //print_r($this->mysqli);
                    return true;
                }
            }
        }

        public function store_data(){
            if (isset($_POST['insert'])) {
                 $id = $_POST["id"];
                 $name = $_POST["name"];
                 $lastname = $_POST["lastname"];
                 $email = $_POST["email"];
                 $phone = $_POST["phone"];

                 if($this->insert($id,$name,$lastname,$email,$phone))
             {
                 echo"done";
             }
             else{
                 echo"not done";
             }
             }
             

        }

        public function insert($id, $name, $lastname, $email, $phone){
            
                $sql = "INSERT INTO `student` (`id`, `name`, `lastname`, `email`, `phone`) VALUES ('$id', '$name', '$lastname', '$email', '$phone')";
                if($this->conn2->query($sql)){
                    //echo"data inserted"; 
                    return true;
                }
                else{
                   // echo" data not inserted";
                    return false;
                }


        
            
        }
        public function get_record($id){
           $sql = "SELECT * FROM `student` WHERE id ='$id'";
            // print_r($sql);
            //$sql = "select * from student where id='$id'";
            $result = $this->conn2->query($sql);
            // if($result){
            // $row = mysqli_fetch_assoc($result); 
            // }
            // //$result = mysqli_query($this->conn2, $sql);
            //print_r($sql);

            // $result = $this->conn2->query($sql);
            //  $row = mysqli_fetch_assoc($result);
  
  
            //   while($data = mysqli_fetch_assoc($result))
            //   {
            //       print_r($data);
            //   }
            
           //$result = $this->conn2->query($sql);
           
            //print_r($result);
            return $result ;
            // return array($result, $sql);
        }

        public function update(){

            if (isset($_POST['update'])) {
                
                $id = $_POST["id"];
                $name = $_POST["name"];
                $lastname = $_POST["lastname"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
                
                if($this->update_record($id,$name,$lastname,$email,$phone))
            {
                // print_r($id);
                echo"update done";
                header("location:show.php");
            }
            else{
                echo"update not done";
            }
            }

        }
        public function update_record($id,$name,$lastname,$email,$phone){
            echo "update record";
            $sql = "UPDATE `student` SET `name`='$name',`lastname`='$lastname',`email`='$email',`phone`='$phone' WHERE id= '$id'";
            //  print_r($sql);die;
                $result = $this->conn2->query($sql);
                // print_r($result);
                if($result){
                    
                    echo"\n update_record done"; 
                    return true;
                }
                else{
                    echo" update_record not done";
                    return false;
                }

        }

        // public function message()
        // {
            

        //    $message = '<div class="alert alert-success" role="alert">do you want to delete it </div>';
        //    echo $message;
        //    return true;
        // }
        // function  createConfirmationmbox($id) {  
        //    // echo "hi";
        //     echo '<script type="text/javascript">  if (confirm("Are you sure you want to delete)) {  $this->delete($id);}</script>';
        // }
    
        public function delete($id){

        
            //echo  "i m here";
            
            $sql = "DELETE FROM `student` WHERE `student`.`id` = '$id'";
            // print_r($sql);die;
            $result = $this->conn2->query($sql);
            
            if($result){
                return true;
            }
            else{
                return false;
            }            


        }
        // public function function_alert($message) {
      
        //     // Display the alert box 
        //     echo "<script>alert('$message');</script>";
        // }
      

        public function select(){
            $sql = "SELECT * FROM `student`";
        
            //$result = mysqli_query($this->conn2,$sql);
            // print_r($this->conn2);
            $result = $this->conn2->query($sql);
          //  $row = mysqli_fetch_assoc($result);


            // while($data = mysqli_fetch_assoc($result))
            // {
            //     print_r($data);
            // }
               
            // print_r($row);
            //print_r($this->mysqli); 
            return $result;
             
        }

       

    

        public function __destruct(){
            if($this->conn){
                if($this->conn2->close()){
                    $this->conn = false;
                    return true;
                }
                else{
                    return false;
                }

            }

        }

    }
?>
