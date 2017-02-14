<!--Database Connection-->
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>WATCHES:SHOP</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="watches watches-shop luxury"/>
        <link rel="stylesheet" href="stylesheets/stylesheet.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<!--BODY STARTS-->    
    <body>
<!-----------promo------------>
    <div class="container" id="promo">
        <h5><bold>SALE:</bold>50% OFF on selected watches.</h5>
        </div>
<!-------Header(NAV) Starts-------->        
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container"> 
         <div class="navbar-header">
            <a class="navbar-brand" href="#">LOGO</a>
         </div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">HOME</a></li>
            <?php
                $get_cate = "SELECT * FROM categories";
                $run_cate = mysqli_query($connection,$get_cate);
                confirm_query($run_cate);
                while($row_cate = mysqli_fetch_assoc($run_cate)){
                    $cate_id = $row_cate['cato_id'];
                    $cate_title = $row_cate['cato_title'];
                    echo "<li><a href='index.php?cate=$cate_id'>$cate_title</a></li>";
                }
            ?>    
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">SIGN-IN</a></li>
            <li><a href="#">CART</a></li>
        </ul>      
        </div>  
     </nav>
<!-----Header Ends------------>
<!-----Banner Starts---------->
        <div id="banner" class="carousel slide" data-ride="carousel">
             <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#banner" data-slide-to="0" class="active"></li>
                <li data-target="#banner" data-slide-to="1"></li>
                <li data-target="#banner" data-slide-to="2"></li>
              </ol>
             <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="images/home/banner/bnr-1.jpg" alt="Chania">
                </div>

                <div class="item">
                  <img src="images/home/banner/bnr-2.jpg" alt="Chania">
                </div>

                <div class="item">
                  <img src="images/home/banner/bnr-3.jpg" alt="Flower">
                </div>
              </div>
            <!-- LEFT-RIGHT Controls-->
              <a class="left carousel-control" href="#banner" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
             </a>
             <a class="right carousel-control" href="#banner" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
<!--------Banner Ends---------->        
<!--------- TRENDING----------->
        
<!--------- TRENDING ENDS----------->        
        
        
        
        <footer></footer>
    </body>
                <!--5. Disconnect the database-->
    <?php
        if(isset($connection)){
            mysqli_close($connection);
        }
     ?>
</html>