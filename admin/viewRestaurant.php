<?php
session_start();
include_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Restaurants</title>

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
                            <li class="active">
                                <a href="viewRestaurant.php"><i class="fa fa-fw fa-table"></i> View Restaurant</a>
                            </li>
                            <li>
                                <a href="add_restaurant.php"><i class="fa fa-fw fa-edit"></i> Add Restaurant</a>
                            </li>
                            <li>
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

    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Restaurants
                    </h1>

                </div>
            </div>

            <?php
            if(isset($_SESSION['valid'])==True){?>
            <div class="row">

                <div class="col-lg-6" style="width: 100%">
                    <h2>Restaurants Informations</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Restaurant Name</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "select * from restaurant";

                                $result = mysqli_query($conn,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
                                    echo "<tr>
                                    <td>".$row[1]."</td>
                                    <td>".$row[2]."</td>
                                    <td><form method=\"post\" action=\"delete.php\"><a href=\"deleteR.php?id=".$row['0']."\" class=\"delete\"><input type=\"button\" class=\"btn btn-default\" value=\"Delete\"></a></form></td>
                                </tr>";
                                $count++;
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

</div>

</div>

</div>
<script src="js/jquery.js"></script>

<script src="js/bootstrap.min.js"></script>

</body>

</html>
