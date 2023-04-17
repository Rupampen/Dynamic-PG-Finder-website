<?php

    $PGname = $_POST ['PGname'];
    $Firstname = $_POST['Firstname'];
    $Phonenumber = $_POST['Phonenumber'];
    $Email = $_POST['Email'];
    $Gender = $_POST['Gender'];
    $Age = $_POST['Age'];
    $Address = $_POST ['Address'];
    $City = $_POST ['City'];
    $State = $_POST ['State'];

// Database connection
    $conn = new mysqli('localhost','root','','EnglishDatabase');


    // if ($PGname !="" && $Firstname !="" && $Phonenumber !="" && $Email !="" && $Gender !="" && $Age !="" && $Address !="" && $City !="" && $State !="") 
    // {
        
        if ($conn->connect_error) 
        {
            die('connection Failed :'.$conn->connect_error);
        }
    
        else
        {
            $stmt = $conn->prepare("insert into englishtable(PGname,Firstname,Phonenumber,Email,Gender,Age,Address,City,State)
            values(?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssississs",$PGname,$Firstname,$Phonenumber,$Email,$Gender,$Age,$Address,$City,$State);
            $stmt->execute();
            echo '<script>alert("Form submitted successfully!"); window.location.href="index.html";</script>';

            // header('location: OM_pg.html');
            // echo "Registration Successful...";
            $stmt->close();
            $conn->close();
        }
    // }

    // else 
    // {
    //     echo "<script>alert('Please Fill The Form')</script>";

    // }

?>