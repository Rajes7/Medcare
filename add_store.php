<?php

  // Include database connection file

  include_once('config.php');
  $a_a = "";

  if (isset($_POST['relation'])) {
    
    $name=$con->real_escape_string($_POST['name']);
    $mobile=$con->real_escape_string($_POST['phone']);
    $dob=$con->real_escape_string($_POST['dob']);
    $relation=$con->real_escape_string($_POST['relation']);
    $image1="img/profile.png";

    $fileName = basename($image1); 
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $allowTypes = array('jpg','png','jpeg','gif'); 
    // if(in_array($fileType, $allowTypes)){ 
        $image = $image1; 
        $imgContent = addslashes(file_get_contents($image)); 

    function ageCalculator($dob){
      if(!empty($dob)){
          $birthdate = new DateTime($dob);
          $today   = new DateTime('today');
          $age = $birthdate->diff($today)->y;
          return $age;
      }else{
          return 0;
      }
  }
  $age=ageCalculator($dob);
  $height="";
  $weight="";
  $blood="";
  $address="";
  $alter="";
  $problems="";
  $gender="";
  $family_id="";


//     $query1 = "SELECT * FROM users where phone = '$mobile'";
//     $result1 = $con->query($query1);

//      while($row1 = $result1->fetch_assoc())
//      {
//     $a_a = $row1["phone"];
    
//   }

//   if($a_a == $mobile)
//   {
//     echo "mobile number already registered!";
// }
// else{
 $query  = "INSERT INTO family (name,phone,dob,age,image,height,weight,blood,address,alter_no,problems,gender,family_id,relation) VALUES ('$name','$mobile','$dob','$age','$imgContent','$height','$weight','$blood','$address','$alter','$problems','$gender','$family_id','$relation')";
 $result = $con -> query($query);

 if ($result) {
     echo "yes";
 }else{
     echo "no";
 }   

// }

    }
  
?>