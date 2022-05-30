<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(image/background.jpg);
    background-position: center;
    background-size: contain;
    background-repeat: no-repeat;
    width: 100%;
    height: 100%;
    background-size: 100% 100%;
    background-position: center;
    font-family: 'Cairo', sans-serif;
    font-size: 20px;
    font-weight: 800;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <title>Regestration</title>
  
</head>
<style>
    .error{
        color: red;
       
    }
</style>
<body>
    <br>
    <br>

    <center>




        <form class="f" method="POST" action="buynow.php">
            
            
               <div style="display:flex;align-items:center;margin:0 auto;justify-content:center"><img src="image/logo_size.png" alt="" style="height:70px;width:70px"><h1>Buy Now</h1></div> 
            
            <hr class="line">
<?php
if(count($error)>0):?>
<div class="error">
                <?php
                    foreach($error as $error1) {
                        echo $error1;
                        echo "<br>";
                    }
                ?>
</div>
<?php endif ?>


 </i> <label>Name</label><br>
            <input type="text" name="name" placeholder="Enter your name" ><br>
         
 <label>Adress</label><br>
            <input type="text" name="adress" placeholder="Enter your Adress" ><br>
         
          
         <label>Mobile number</label><br>
            <input type="number" name="phone" placeholder="Enter your number" ><br>
           <label>Product ID </label><br>
            <input type="textarea" name="pid" placeholder="please enter product id and number of quantity" ><br>
           <label> Quantity</label><br>
            <input type="number" name="quantity" placeholder="please enter product id and number of quantity" ><br>
  
            <input class="bu" type="submit" name="buy" value="Submit">
            <a  style=" border-radius: 10px 10px;height: 2px;"class="bu" href="home.html">Back To Home</a>

        </form>
    </center>










    <script src="https://kit.fontawesome.com/56d859db36.js" crossorigin="anonymous"></script>
</body>

</html>