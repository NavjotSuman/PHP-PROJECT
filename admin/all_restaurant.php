<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require '../connection/_dbconnect.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>navjot</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all_users.css">
    <!-- <link rel="stylesheet" href="css/all_user-modal.css"> -->
    <link rel="stylesheet" href="css/all_restaurant.css">

    <!-- open sans font-family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'include/_navbar.php'; ?>



    <!-- dashboard main started here -->
    <div class="dashboard-main">
        <header>
            <aside>
                <div class="aside__container">
                    <div class="aside__container-top">
                        <ul class="aside-dashboard">
                            <h4>HOME</h4>
                            <li class="flex-aside-li"><a href="dashboard.php"><img class="aside-img" src="images/icons/gauge-high-solid.png" alt="" srcset=""><span>Dashboard</span></a></li>
                        </ul>
                    </div>


                    <div class="aside__container-bottom">
                        <div class="admin-controler-links">
                            <ul class="aside-admin">
                                <h4>LOG</h4>
                                <li class="flex-aside-li list-bg"><a href="all_users.php" class="flex-anchor"><img class="aside-img" src="images/icons/user-solid.png" alt="" srcset=""><span>Users</span></a></li>
                                <li class="flex-aside-li list-bg hidden-off">
                                    <a class="flex-anchor"><img class="aside-img" src="images/icons/box-archive-solid.png" alt="" srcset=""><span>Restaurant</span><img src="images/icons/greater-than-solid.png" class="arraw-img" alt="" srcset="">
                                    </a>
                                    <ul hidden class="hidden-div">
                                        <li><a href="all_restaurant.php"><span>All Restaurant</span></a></li>
                                        <li><a><span>Add Category</span></a></li>
                                        <li><a><span>Add Restaurant</span></a></li>
                                    </ul>
                                </li>
                                <li class="flex-aside-li list-bg hidden-off">
                                    <a class="flex-anchor"><img class="aside-img " src="images/icons/utensils-solid.png" alt="" srcset=""><span>Menu</span><img src="images/icons/greater-than-solid.png" class="arraw-img" alt="" srcset=""></a>
                                    <ul hidden class="hidden-div">
                                        <li><a><span>All Menus</span></a></li>
                                        <li><a><span>Add Menus</span></a></li>
                                    </ul>
                                </li>
                                <li class="flex-aside-li list-bg"><a href="all_orders.php" class="flex-anchor"><img class="aside-img" src="images/icons/cart-shopping-solid.png" alt="" srcset=""><span>Orders</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>


            <!--  ================================================================================ right side of the dashboard ================================================================================= -->

            <div class="main-right-display">
                <div class="marqueetag">
                    <!-- write the marquee here -->
                    <marquee behavior="" direction="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi eos sed aliquid culpa distinctio nostrum sequi a quas. Harum omnis at nobis amet deserunt sapiente totam provident laudantium officiis illum?</marquee>
                </div>
                <div class="admin__dashboard">
                    <div class="admin__dashboard-container">

                        <div class="dashboard__header">
                            <h4>All Restaurant</h4>
                        </div>


                        <!-- first row in admin dashboard -->

                        <div class="all_users-table">
                            <!-- this full table is copied from the previous files so the class may confuse us-->
                            <table>
                                <thead>
                                    <tr>
                                        <td>Category</td>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Phone</td>
                                        <td>Url</td>
                                        <td>Open Hrs</td>
                                        <td>Close Hrs</td>
                                        <td>Open Days</td>
                                        <td>Address</td>
                                        <td>Image</td>
                                        <td>Date</td>
                                        <td style="width: 12%;">Action</td>
                                    </tr>
                                </thead>

                                <tbody id="display_users_detail">
                                    <!-- filling it using javascript -->

                                    <!-- <tr>
                                        <td>American</td>
                                        <td>Highlands Bar & Grill</td>
                                        <td>hbg@mail.com</td>
                                        <td>6545687458</td>
                                        <td>www.hbg.com</td>
                                        <td>7am</td>
                                        <td>8pm</td>
                                        <td>mon-sat</td>
                                        <td>812 Walter Street</td>
                                        <td><img class="all_res_img" src="Res_img/6290860e72d1e.jpg" alt="" srcset=""></td>
                                        <td>2022-05-27 16:31:03</td>
                                        <td class="action_data">
                                            <a class="all_user-action all_user-action-trash"><img src="images/icons/trash-solid.png" alt="" srcset=""></a>
                                            <a class="all_user-action all_user-action-edit"><img src="images/icons/file-pen-solid.png" alt="" srcset=""></a>
                                        </td>
                                    </tr> -->


                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </header>

    </div>


    <div class="update_restaurant-modal" style="display: block;">
        <div class="modal__container">
            <div class="modal-start">
                <div class="modal-heading">
                    <h2>Update Restaurant</h2>
                    <hr>
                </div>

                <form id="modal-form" action="" method="post">

                    <div class="first_row grid-row rows_b-margin">
                        <div class="res_name">
                            <label for="res_name">Restaurant Name</label><br>
                            <input type="text" class="input-box" name="res_name" id="res_name" placeholder="Restaurant Name">
                        </div>
                        <div class="buss_email">
                            <label for="bussiness_email">Bussiness E-Mail</label><br>
                            <input type="text" class="input-box" name="bussiness_email" id="bussiness_email" placeholder="Bussiness Email">
                        </div>
                    </div>

                    <div class="second_row grid-row rows_b-margin">
                        <div class="phone">
                            <label for="Phone">Phone</label><br>
                            <input type="text" class="input-box" name="Phone" id="Phone" placeholder="Phone Number">
                        </div>
                        <div class="website_url">
                            <label for="web_url">Website URL</label><br>
                            <input type="text" class="input-box" name="web_url" id="web_url" placeholder="Website Url">
                        </div>
                    </div>

                    <div class="third_row grid-row rows_b-margin">
                        <div class="o_hr">
                            <label for="o_hrs">Open Hours</label><br>
                            <input type="text" class="input-box" name="o_hrs" id="o_hrs" placeholder="Open Hours">
                        </div>
                        <div class="c_hr">
                            <label for="c_hrs">Close Hours</label><br>
                            <input type="text" class="input-box" name="c_hrs" id="c_hrs" placeholder="Close Hours">
                        </div>
                    </div>

                    <div class="fourth_row grid-row rows_b-margin">
                        <div class="o_hr">
                            <label for="o_days">Open Days</label><br>
                            <input type="text" class="input-box" name="o_days" id="o_days" placeholder="Open Days">
                        </div>
                        <div class="c_hr">
                            <label for="image">Image</label><br>
                            <input type="text" class="input-box" name="image" id="image" placeholder="Image">
                        </div>
                    </div>

                    <div class="last_row rows_b-margin">
                        <label for="doj">Select Category</label><br>
                        <input type="text" class="input-box" name="doj" id="doj" placeholder="Register Date">
                    </div>


                    <div class="restaurant_address">
                        <div class="res_address_heading">
                            <label for="res_address">
                                <h2>Restaurant Address</h2>
                            </label>
                            <hr>
                        </div>
                        <textarea name="res_address" id="res_address" cols="30" rows="6" placeholder="Restaurant Address"></textarea>
                    </div>

                    <div class="modal-buttons" style="display: flex;">
                        <a class="update-btn btn">UPDATE</a>
                        <a class="cancle-btn btn">CLOSE</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php
    include 'include/_footer.php';
    ?>



    <script src="javascript/script.js"></script>
    <script src="javascript/all_restaurant.js"></script>

</body>

</html>