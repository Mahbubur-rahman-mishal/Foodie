<?php
include_once 'connect.php';
session_start();

if(isset($_POST['btn-itmadd']) != 0 ){
    
    $restaurant = $_POST['restaurant'];
    $item = $_POST['item'];
    $details = $_POST['details'];
    $price = $_POST['price'];

    if ((strlen($item) == 0) || (strlen($restaurant) == 0)  || (strlen($price) == 0)) {
        echo '<script language="javascript">';
        echo 'alert("Please fill all the fields")';
        echo '</script>';
    }
    else {
        $query = "SELECT item FROM menu WHERE item='$item'";
        $result = mysqli_query($conn,$query);
        
        $count = mysqli_num_rows($result);
        
        if ($count==0) {

            $query = 'INSERT INTO menu(restaurant, item, details, price) VALUES ("'.$restaurant.'","'.$item.'","'.$details.'","'.$price.'")';

            mysqli_query($conn,$query);
            
            echo '<script language="javascript">';
            echo 'alert("Item Successfully Added!")';
            echo '</script>';
            header('Refresh: 0; URL = add_menu_item.php');  
        }
        else {
            echo '<script language="javascript">';
            echo 'alert("Sorry this item already exists.")';
            echo '</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add a menu items</title>


    <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/sb-admin.css" rel="stylesheet">


    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    </head>

    <body>

        <div id="wrapper">


            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Admin</a>
                </div>

                <?php
                if(isset($_SESSION['valid'])==True){            
                    echo "<ul class=\"nav navbar-right top-nav\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i> ".$_SESSION['username']." <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li>
                                <a href=\"#\"><i class=\"fa fa-fw fa-user\"></i> Profile</a>
                            </li>
                            <li class=\"divider\"></li>
                            <li>
                                <a href=\"logout.php\"><i class=\"fa fa-fw fa-power-off\"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>";

            }
            ?>

            <?php
            if(isset($_SESSION['valid'])==True){?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Welcome</a>
                    </li>
                    <li class="active">
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Manage <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="active">
                            <li>
                                <a href="viewuser.php"><i class="fa fa-fw fa-table"></i> View Users</a>
                            </li>
                            <li>
                                <a href="viewRestaurant.php"><i class="fa fa-fw fa-table"></i> View Restaurant</a>
                            </li>
                            <li>
                                <a href="add_restaurant.php"><i class="fa fa-fw fa-edit"></i> Add Restaurant</a>
                            </li>
                            <li class="active">
                                <a href="add_menu_item.php"><i class="fa fa-fw fa-edit"></i> Add Menu Item</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <?php
        }
        ?>

    </nav>

    <?php
    if(isset($_SESSION['valid'])==True){?>

    <div id="page-wrapper">

        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Add menu items
                    </h1>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">

                    <form role="form" action="add_menu_item.php" method="POST">

                        <div class="form-group">
                            <label>Restaurant</label>
                            <select name="restaurant" class="form-control">
                                <option selected="selected"></option>

                                <?php
                                $sql = "select * from restaurant";

                                $result = mysqli_query($conn,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "
                                    <option>".$row[1]."</option>";
                                $count++;
                            }

                            ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Item</label>
                            <input name="item" class="form-control" placeholder="Enter item name">
                        </div>

                        <div class="form-group">
                            <label>Details</label>
                            <input name="details" class="form-control" placeholder="Enter details">
                        </div>

                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="number" class="form-control" placeholder="Enter Price">
                        </div>

                        <input type="submit" class="btn btn-default" name="btn-itmadd" value="Submit">

                    </form>

                </div>
                
            </div>


        </div>


    </div>

    <?php
}
?>
</div>



<script src="js/jquery.js"></script>


<script src="js/bootstrap.min.js"></script>

</body>

</html>
