<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database  = "new";
try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully"; 
    }
    catch(PDOException $e) {    
        echo "Connection failed: " . $e->getMessage();
        }
	
    	$n1 = $_POST["u"];
		
    /* Get the name of the uploaded file */
    $filename = $_FILES['file']['name'];
    
    /* Choose where to save the uploaded file */
    $location = "upload/".$filename;
    
    /* Save the uploaded file to the local filesystem */
    if ( move_uploaded_file($_FILES['file']['tmp_name'], $location) ) 
    { 
         echo 'Success'; 
    } 
    else 
    { 
        echo 'Failure'; 
    }

$file="upload/". $filename;
if($file == "upload/")
	$file = "upload/default.png";
		


$query ="UPDATE Users SET profpic = '$file' WHERE username = '$n1';";
    if ($conn->query($query) == TRUE) {
		echo "Success";}
    


?>