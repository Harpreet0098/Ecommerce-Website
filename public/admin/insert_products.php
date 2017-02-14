<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="styles/adminstyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>ADMIN_INSERT</title>
</head>
<!-----------BODY------------>    
<body>
    <div class="responsive-table">
    <form method="post" enctype="multipart/form-data" action="insert_products.php">
        <table class="table-bordered table-hover" width ="700" align = "center">
            <caption><h2>Insert New Products</h2></caption>
            <tr>
                <td><b>Product Title</b></td>
                <td><input type="text" name="product_title" required="required" /></td>
            </tr>
            <tr>
                <td><b>Category</b></td>
                <td>
                    <select name="cats">
                        <option>Select a category</option>
                       <?php
                            $get_cate = "SELECT * FROM categories";
                            $run_cate = mysqli_query($connection,$get_cate);
                            confirm_query($run_cate);
                            while($row_cate = mysqli_fetch_assoc($run_cate)){
                            $cate_id = $row_cate['cato_id'];
                            $cate_title = $row_cate['cato_title'];
                            echo "<option value='$cate_id'>$cate_title</option>";
                            }
                        ?>        
                    </select>    
                </td>
            </tr>
            <tr>
                <td><b>Select Image 1</b></td>
                <td><input type="file" name="product_img1" required="required" /></td>
            </tr>
            <tr>
                <td><b>Select Image 2</b></td>
                <td><input type="file" name="product_img2" required="required" /></td>
            </tr>
            <tr>
                <td><b>Select Image 3</b></td>
                <td><input type="file" name="product_img3" required="required"/></td>
            </tr>
            <tr>
                <td><b>Enter Price</b></td>
                <td><input type="text" name="product_price" required="required"/></td>
            </tr>
            <tr>
                <td><b>Product Description</b></td>
                <td><textarea rows="4" cols="50" name="product_desc" required="required"></textarea></td>
            </tr>
             <tr>
                <td><b>Product Keyword</b></td>
                <td><input type="text" name="product_keyword" required="required"/></td>
            </tr>
            <tr align=center>
                <td colspan="2"><input type="submit" name="submit" value="submit" /></td>
            </tr>
        </table>
    </form>
    </div>    
    </body>
</html>
<!--PHP script to add the form data to tables in database -->
<?php
    //Form data variable
    if(isset($_POST['submit'])){
        $product_title=$_POST['product_title'];
        $product_cato=$_POST['cats'];
        $product_price=$_POST['product_price'];
        $product_desc=$_POST['product_desc'];
        $status='on';
        $product_keyword=$_POST['product_keyword'];
   
    //Images variables
        $product_img1=$_FILES['product_img1']['name'];
        $product_img2=$_FILES['product_img2']['name'];
        $product_img3=$_FILES['product_img3']['name'];
    
    //Temp images name    
        $temp_name1=$_FILES['product_img1']['tmp_name'];
        $temp_name2=$_FILES['product_img2']['tmp_name'];
        $temp_name3=$_FILES['product_img3']['tmp_name'];
    
    //uploading images into folder admin\products_images.
        move_uploaded_file($temp_name1,"products_images/$product_img1");
        move_uploaded_file($temp_name2,"products_images/$product_img2");
        move_uploaded_file($temp_name3,"products_images/$product_img3");
        
    //Insert query
        $insert_products="insert into products (product_cato,date,product_title,product_img1,product_img2,product_img3,product_price,product_disc,product_status) values    ('$product_cato',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status')";
    //run the query
        $run_products=mysqli_query($connection, $insert_products);
        if($run_products){
            echo"<script>alert('Product succesfully inserted!')</script>";
        }
    }
?>       


<!--5. Disconnect the database-->
    <?php
        if(isset($connection)){
            mysqli_close($connection);
        }
     ?>