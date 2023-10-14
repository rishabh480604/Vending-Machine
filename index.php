<?php
    $user='root';
    $pass='';
    $db='pfcl';

    $db=new mysqli('localhost',$user,$pass,$db) or die("unable to connect");        

    ?>
<!DOCTYPE html>

<html>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script> -->
    <head>
        <title> PFCL HomePage</title>
        <link rel="stylesheet" href="src/index.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <style>
            body{
                background-size: cover;
                background-image: url('home/wallpaper.jpg')
                
            }
            .menu{
                position: fixed;
               width: 100%;            
               
               background-color: bisque;
               border: 2px solid blue;
               
               /* overflow: auto; */

            }
            .menu_element{
                

                padding-right: 20px;
                display: inline-block;
                list-style: none;
            }
            .menu_element a{

                
                color: black;
                text-decoration: none;

            }
            .menu_element a:hover{
                background-color: burlywood;
                
            }
            #login{
                float: right;
                /* padding-right: 1%; */
                margin-right: 2px;
            }
            #logo{
                position: absolute;
                top: 70px;
                left: 60px;
                width: 128px;
                height: 128px;
                
            }
            #form{
                background: rgb(131,58,180);
background: linear-gradient(90deg, rgba(131,58,180,1) 0%, rgba(253,29,29,1) 45%, rgba(249,185,94,1) 100%);
                padding: 5px 5px;
                position: absolute;
                border: 2px solid lightcoral;
                left: 30px;
                bottom: 100px;
            }
            #form div{
                margin: 10px 10px;
            }
            #form h1{
                text-align: center;
            }
            #complaint{
                background-image: url('mail.JPG');
                background-size: cover;
                border: 2px solid black; 
                position: absolute;
                right: 5px;
                bottom: 10px;
                border-radius: 5px;
            }
            
            footer{
                clear: both;
                position: absolute;
                border: 2px solid black;
                bottom: 5px;
                width: 100%;
                height: 20px;
                background-color: grey;
                border-radius: 10px;
                
         
            }
            footer p{
                position: relative;
                font-size: 12px;
                top: -5px;
                
            }
            
            
            
        </style>
    </head>
    <body>
        

        
        <div class='menu'>
            <ul>
                <li class='menu_element'><a href='home.php'>Home</a></li>
                <li class='menu_element'><a href='items.html'>Items</a></li>
                <li class='menu_element'><a href='#'>Branches</a></li>
                <li class='menu_element'><a href='#'>Services</a></li>
                <li class='menu_element'><a href='#'>About Us</a></li>
                <li class='menu_element' id='login'><a href="login_page.php">Login</a></li>
                
            </ul>
        </div>
        
        <img  id='logo' src='home/can_logo.png' alt='logo'>
        <form id='form' method='post' autocomplete="on">
            <h1>Order Items</h1>
            <div>
                <label >First Name</label>
                <input type='text' name='name'>
            </div>
            <div>
                <label >Last Name</label>
                <input type='text' name='surname'>
            </div>
            <div>
                <label >Contact no</label>
                <input type='number' name='contact'>
            </div>
            <div>
                <label>Menu</label>
                <select  name='item' default=null>
                    <option value=null>Choose</option>
                    <option value="Sprite Can">Sprite Can</option>
                    <option value="Cliff bars">Cliff bars</option>
                    <option value="Pop-tarts">Pop-tarts</option>
                    <option value="Sun Chips">Sun Chips</option>
                    <option value="Kurkure">Kurkure</option>
                    <option value="Doritos">Doritos</option>
                    <option value="Cheetos">Cheetos</option>
                    <option value="Lays">Lays</option>
                    <option value="Pepsi">Pepsi</option>
                    <option value="Diet Coke">Diet Coke</option>

                </select>

                <label>Quantity</label>
                <input  type='Number' min="1" name='quant'>

            </div>
            <div>
                <input type="radio" name="confirm" value=1> Confirm order<br>
                <button type="submit"  name='submit' value='submit' onclick="check()">order</button>
            </div>
            
            
        </form>
        <div id="complaint">
            <p>
                For Complaint</p>
            <p>
            <a href="mailto : pfcl@gmail.com">click here</a><p>
        </div>
        
        <footer>
            <p>2022 The People's Food corporation Limited.All Rights Reserved</p>
        </footer>
        <script src="src/index.js"></script>
        
    </body>
</html>
<?php
            function check(){
                echo "<script>alert('functi')</script>";
                
                
            }
            if(array_key_exists('submit', $_POST)) {
                
                
                $name=$_REQUEST['name'];
                if($name==null){
                    echo "<script>alert('name is null')</script>";
                    return;
                }
                $surname=$_REQUEST['surname'];
                $contact = $_REQUEST['contact'];
                if(strlen(strval($contact))!=10){
                    echo "<script>alert('invalid contact no')</script>";
                    return;
                }
                $item=$_POST['item'];
                if($item==null or $item=='null'){
                    echo "<script>alert('select an item to order')</script>";
                    return;
                }
                $qty=$_REQUEST['quant'];
                if($qty==null or $qty<=0){
                    echo "<script>alert('invalid input')</script>";
                    return;
                }
                $name=$name." ".$surname;
                $query="INSERT INTO ordered (Name,  Contact, Item, Quantity)
                VALUES ('$name','$contact','$item',$qty);";
                $check=$_REQUEST['confirm'];
                // echo"<script>alert('$check')</script>";

                if($check){
                    echo"<script>alert('Order placed Name : $name  Contact :$contact  Item : $item  Quantity : $qty')</script>";
                    $result = $db -> query($query);

                }else{
                    echo "<script>alert('please confirm the order')</script>";
                    return;
                }
                
                
            }
        ?>
