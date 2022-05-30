<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" href="image/logo_size.png" type="image/gif" />
    <title>Home</title>
</head>
<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(image/background.jpg);
        background-position: center;
        background-repeat:no-repeat;
        width: 100%;
        height:200vh;
        background-size: 100% 100%;
        font-family: 'Cairo', sans-serif;
        font-size: 20px;
        font-weight: 800;
        background-attachment: fixed;
    }
    .fot {
    
    color: #369d85;
    background-color: #063547;
    font-size: 30px;
    font-weight: 400;
    border-radius: 10px 10px;
    width: 80%;
    align-items: center;
    position: sticky;
    bottom: 0;
}
</style>

<body>
    <center>
        <nav>

            <ul class="lis">
                <a href="home.html"> <img src="image/logo_size.png" alt="logo" class="logo"></a>
                <li> <a href="home.html">Home</a> </li>
                <li><a href="buynow.php">Buy Now</a></li>
                <li><a href="book2 .html">Recomended</a> </li>
                <li><a href="best-selling.html"> Bestselling</a> </li>
                <li><a href="book page.html"> Special Books </a></li>
             <form style="display:flex;justify-content:spacearound;"  method="post"> 
                 <input  name="search" id="s" type="text" placeholder="Search..">
                 <button  name="btn" type="submit"><img style="position:relative; right: 1px;
                 bottom: 0px;" src="image/search.png" alt=""></button>
            </form>
            </ul>


        </nav>
    </center>
    <!-- end nav -->
    <br>
    <br>
    <br>
    <br>
    <article style="height: auto;">
    <form id="right" method="post"> <label style="color:#369d85 ;"> Sort By:</label>
        <select name="sorting" required>
           <option> --Select Option-- </option>
           <option value="low"> Price: Low to High </option>
           <option value="high"> Price: High to Low </option>
        </select>
        <input type="submit" Value="Sort_Your_Products" name="btn2">
         </form> <br><br><br><br>
    <?php
//retrieve Data
if (isset($_POST['btn'])) {
  ?>
  <center>
    <table style="border-radius: 10px 10px; color:#369d85; align-items:center">
      <?php
  $st=$_POST['search'];
  $myquery="select * from `books` where `name` like '%$st%'"; 
$result= mysqli_query($db,$myquery);
while ($row=mysqli_fetch_array($result)) {
   ?>
<tr style="text-align: center;display: inline; width:350px ;color:#369d85;" >
<pre><td style="border: thin solid lightgrey;width:250px;border-radius: 20px 20px;  height:250px; color:#369d85; background-color:#063547"> 
<img style="width:150px;height:150px ; border-radius: 10px 10px;" src="<?php echo $row['photo']; ?>"><br>

<b><?php echo $row['name'];  ?> </b>
<span style="color: #369d85; font-weight:bold;"><?php echo $row['price'];  ?>  L.E</span>
<b><?php echo $row['desc'];  ?> </b>

 </td></pre>


  </tr>
<?php
}

}
?>
  </table>
             
</center>


<?php
//sort_Data
if (isset($_POST['btn2'])) {
  ?>
  <center>
  <table style="border-radius: 10px 10px; color:#369d85; align-items:center">
      <?php
     
  $opt=$_POST['sorting'];
  if ($opt=="low") {
    $qq="select * from `books` order by `price` ASC";
    $re=mysqli_query($db,$qq);
    while ($row=mysqli_fetch_array($re)) {
      ?>
<center>
<tr style="margin:20px;text-align: center;display: inline;"> <pre>
<td style="  border-radius: 10px 10px;background-color:#063547;border: thin solid lightgrey;width:250px;">
<center><img style="width:150px;height:150px ; border-radius: 10px 10px; display:block" src="<?php echo $row['photo']; ?>"></center>
<b><?php echo $row['name'];  ?> </b>
<span style="color: #369d85; font-weight:bold;"><?php echo $row['price'];  ?>  L.E</span>
<b><?php echo $row['desc'];  ?> </b>
</pre>
 </td>


  </tr></center>
    
      <?php
    }
  }else{
$qq="SELECT * FROM `books` order by `price` DESC";
    $re=mysqli_query($db,$qq);
    while ($row=mysqli_fetch_array($re)) {
      ?>
<tr style="margin:20px;text-align: center;display: inline;"> 
<td style="  border-radius: 10px 10px;background-color:#063547;border: thin solid lightgrey;width:250px;"><pre>
<img style="width:150px;height:150px ; border-radius: 10px 10px;" src="<?php echo $row['photo']; ?>">

<b><?php echo $row['name'];  ?> </b>
<span style="color: #369d85; font-weight:bold;"><?php echo $row['price'];  ?>  L.E</span>
<b><?php echo $row['desc'];  ?> </b>
</pre>
 </td>


  </tr>
<?php
  }
}
}
?>
</table></center>

    
    <br>
    </article>
  </body></html>