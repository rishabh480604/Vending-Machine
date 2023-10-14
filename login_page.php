<?php

    $user='root';
    $pass='user';
    $db='pfcl';
    $db=new mysqli('localhost',$user,'','pfcl') or die("unable to connect");
    // if($db->connect_error){
    //     die("connection failed".$db->connect_error);
    // }else{
    //     echo"connection successfully";
    // }
 ?>    
<html>
    <head>
        <title></title>
      
        <link href='login_page/login_page.css' rel='stylesheet'>
        </head>
        <body id=body>
        <div class='menu'>
            <ul>
                <li class='menu_element'><a href='index.php'>Home</a></li>
                <li class='menu_element'><a href='items.html'>Items</a></li>
                <li class='menu_element'><a href='#'>Branches</a></li>
                <li class='menu_element'><a href='#'>Services</a></li>
                <li class='menu_element'><a href='#'>About Us</a></li>
                <li class='menu_element' id='login'><a href="login_page.php">Login</a></li>
                
            </ul>
        </div>
        
        
        <form id="form" name="form" method="POST">
            <div class="label">Username</div>
            <div ><input type="text" class="field" namespace="username" id="username" name="username"></div>
            <br>
            <br>

            <div class="label">Password</div>
            <div ><input class="field" type="password" id="password" name="password"></div>
            <br>
            <button type="submit" name="submit" onclick=login()>Login</button>
            <br>
            <br>
            <div id="social">Sign Up With <img src="login_page/Google.jpg">  <img src="login_page/facebook.jpg">  <img src="login_page/insta_icon.jpg"></div>
            <br>
            <br>
            <div id="newuser"><a href="create_account.php">New to PFCL? Create an account</a></div>
</form>

<?php
    if(array_key_exists('submit', $_POST)) 
    {
        $user=$_REQUEST['username'];
        $user=strtolower(htmlspecialchars($user));
        $pass=$_REQUEST['password'];
        $sql="SELECT email,password FROM user WHERE email='$user' AND password=$pass";
        $result = $db -> query($sql);
        if(!($result->num_rows==0) )
        {
            echo "<script>alert('Login Success')</script>";
            echo "<script>window.location.replace('https://vtop2.vitap.ac.in/vtop/initialProcess')</script>";
            
        }else 
            echo "$sql";
            echo "<script>alert('Invalid Username or Password')</script>";
    }
?>
        
        <script src="login_page/login_page.js"></script>
    </body>
</html>


