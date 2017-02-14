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
                <td><input type="text" name="product_title" /></td>
            </tr>
            <tr>
                <td><b>Category</b></td>
                <td>
                    <select name="product_cart">
                        <option>Select a category</option>
                        <?php
                            $get_cate = "SELECT * FROM categories";
                            $run_cate = mysqli_query($connection,$get_cate);
                            confirm_query($run_cate);
                            while($row_cate = mysqli_fetch_assoc($run_cate)){
                                $cate_id = $row_cate['cato_id'];
                                $cate_title = $row_cate['cato_title'];
                                echo "<option value='cate_id'>$cate_title</option>";
                            }
                        ?>    
                    </select>    
                </td>
            </tr>
            <tr>
                <td><b>Select Image 1</b></td>
                <td><input type="file" name="product_img1" /></td>
            </tr>
            <tr>
                <td><b>Select Image 2</b></td>
                <td><input type="file" name="product_img2" /></td>
            </tr>
            <tr>
                <td><b>Select Image 3</b></td>
                <td><input type="file" name="product_img3" /></td>
            </tr>
            <tr>
                <td><b>Enter Price</b></td>
                <td><input type="text" name="product_price" /></td>
            </tr>
            <tr>
                <td><b>Product Description</b></td>
                <td><textarea rows="4" cols="50" name="product_desc"></textarea></td>
            </tr>
             <tr>
                <td><b>Product Keyword</b></td>
                <td><input type="text" name="product_keyword" /></td>
            </tr>
            <tr align=center>
                <td colspan="2"><input type="submit" name="submit" /></td>
            </tr>
        </table>
    </form>
    </div>    
    </body>
                    <!--5. Disconnect the database-->
    <?php
        if(isset($connection)){
            mysqli_close($connection);
        }
     ?>
</html>
