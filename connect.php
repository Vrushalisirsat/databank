
<?php
    global $conn;
   $students_name = $_POST['students_name'];
   $project_name = $_POST['project_name'];
   $deparnment = $_POST['deparnment'];
   $guided_by = $_POST['guided_by'];
   $project_details = $_POST['project_details'];

   $con = new mysqli("localhost","root","","php_college");
   if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
}else{

    $stmt = $con->prepare("insert into main(students_name,project_name,deparnment,guided_by,project_details)values(?,?,?,?,?)");
    $stmt->bind_param("sssss",$students_name,$project_name,$deparnment,$guided_by,$project_details);
    $stmt->execute();
    echo "registration successfull...";
    $stmt->close();
   

}   




?>