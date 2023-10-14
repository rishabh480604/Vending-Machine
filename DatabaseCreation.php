<?php

    $user='root';
    $pass='user';
    
    $conn=new mysqli('localhost',$user,'') or die("unable to connect");
    // if($db->connect_error){
    //     die("connection failed".$db->connect_error);
    // }else{
    //     echo"connection successfully";
    // }
    
    $sql = "CREATE DATABASE pfcl";
    $out=$conn->query($sql) === TRUE;
    if ($out) {
        echo "Database created successfully ";
    } else {
        echo "Error creating database: " . $conn->error;
        return;
    }
    
    // Close the connection
    $conn->close();
    $conn=new mysqli('localhost',$user,'','pfcl') or die("unable to connect");
    if($out){
        $sql="CREATE TABLE user(
            firstname text,
            lastname text,
            email varchar(50),
            password varchar(20),
            address varchar(50),
            phno varchar(10),
            gender varchar(56)
        )";
        
        if ($conn->query($sql) === TRUE) {
            echo "<br>account registeration table created";
        } else {
            echo "<br>Error creating database: " . $conn->error;
            
        }
        $sql="CREATE TABLE ordered(
            Name text,
            Contact bigint(10),
            Item varchar(20),
            Quantity tinyint(2)
        )";
        if ($conn->query($sql) === TRUE) {
            echo "<br>order table created";
        } else {
            echo "<br>Error creating database: " . $conn->error;
            
        }

    }
    
    
    
    
    
    
 ?> 