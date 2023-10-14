
<?php

    $user='root';
    $pass='user';
    $db='pfcl';
    $db=new mysqli('localhost',$user,'','pfcl') or die("unable to connect");
    if($db->connect_error){
        die("connection failed".$db->connect_error);
    }
    // else{
        // echo"connection successfully";
    // }
 ?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="account/account.css" rel="stylesheet">
    </head>
    <body>
    <div>
        <a href="index.php"><img id='logo'src="can_logo.png"></a>
        <h1 id='reg_title'>Create Account</h1>
    </div>
    
    <br>
    <br>
        <form id="form" method="post">
            <label for firstname>FirstName : </label>
            <input type="text" id=firstname name=firstname minlength="6" required><br><br>

            <label for lastname>LastName : </label>
            <input type="text" id=lastname name=lastname required><br><br>

            <label for email>E-mail Address : </label>
            <input type="mail" id=email name=email placeholder="abc@gmail.com" required><br><br>

            <label for passwrd>Password : </label>
            <input type="password" name=password id="passwrd" minlength="6" required><br><br>

            <label for address>Address : </label>
            <textarea rows="4" cols="30" name=address required id="address"></textarea><br><br>

            <label for ph>Phone NO. : </label>
            <input type="number" minlength="10" maxlength="10" name=phno  required><br><br>

            <p>Gender<input type="radio" name="gender" value="Male" id="male">
            <label for male>Male </label>
            <input type="radio" name="gender" value="Female" id="Female">
            <label for male>Female </label><p><br>

            <button type="submit" name='submit'>Create Account</button>
            <button onclick="reset()"> reset</button><br>
            <a id='account_exist_button'href="login_page.php">Already have Account</a>
            </form>
<?php
if(array_key_exists('submit', $_POST)) 
{
    
    $valid=1;
    $firstname=$_REQUEST['firstname'];
    $lastname=$_REQUEST['lastname'];
    $email=$_REQUEST['email'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "<script>alert('Enter valid email id')</script>";
        $valid=0;
    }

    $password=$_REQUEST['password'];
    $address=$_REQUEST['address'];
    $phno=$_REQUEST['phno'];
    
    if(!(strlen((string)$phno)==10)){
 
        echo "<script>alert('Invalid phone number')</script>";
        $valid=0;
    }
    
    // $ph_regex='/^\d{10}$/';
    // if(preg_match($phno,$ph_regex)){
    //     echo "<div>error</div>";
    //     echo "<script>alert('Enter valid phnone Number')</script>";
    //     $valid=0;
    // }
    $gender=$_REQUEST['gender'];
    $check="select * from user WHERE email='$email'";
    echo "<div>$check</div>";
    $result = $db -> query($check);
    if($result->num_rows==0 ){
        echo "<div>$result->num_rows</div>";
        $sql="INSERT INTO user (firstname,lastname,email,password,address,phno,gender) VALUES('$firstname','$lastname','$email','$password','$address','$phno','$gender')";
        echo "<p>$sql<p>";
        if ($result = $db -> query($sql)) 
        {
            echo"<script>alert('Account created Scuccessfully!')</script>";
            
        }
    }
    else
            echo "Account already exist"; 
}

    
?>
            

            
            


        
        <script>
            function reset(){
                document.getElementById("myForm").reset();
            }
                
            
            
        </script>
        
        
    </body>
</html>