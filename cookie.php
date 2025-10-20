
<?php 
include ("config.php");
if (!isset($_COOKIE['admin'])){
    header('location: adminLogin.php');
    exit;
}
$sql="SELECT * FROM `admin` WHERE fullName LIKE '".$_COOKIE['admin']."'";
$user = array();

if($conn->query($sql) == TRUE){
    $sql="SELECT * FROM `admin` WHERE fullName LIKE '".$_COOKIE['admin']."'";
        $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
           $user = $row; 
        }
    }else{
        header('location: adminLogin.php');
        exit;
    }
    
}else{
    echo "Error: " .$sql."<br>".$conn->error;
}

?>