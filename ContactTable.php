<?php

    $Name = $_POST ['Name'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $Message = $_POST['Message'];

// Database connection
    $conn = new mysqli('localhost','root','','EnglishDatabase');

        
        if ($conn->connect_error) 
        {
            die('connection Failed :'.$conn->connect_error);
        }
    
        else
        {
            $stmt = $conn->prepare("insert into contactTable(Name,Phone,Email,Message)
            values(?,?,?,?)");
            $stmt->bind_param("siss",$Name,$Phone,$Email,$Message);
            $stmt->execute();
            echo '<script>alert("Form submitted successfully!"); window.location.href="index.html";</script>';

            // header('location: OM_pg.html');
            // echo "Registration Successful...";
            $stmt->close();
            $conn->close();
        }

?>