<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("location: index.php");
}
require '../connection/_dbconnect.php';

// operation after click on the ADD Button
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {


    // all the values of the form
    $name = $_POST['res_name'];
    $email = $_POST['bussiness_email'];
    $phone = $_POST['Phone'];
    $url = $_POST['web_url'];
    $ohrs = $_POST['o_hrs'];
    $chrs = $_POST['c_hrs'];
    $odays = $_POST['o_days'];
    $category = $_POST['category'];
    $address = $_POST['res_address'];

    // fetching the category id number using its name
    $sql = "SELECT * FROM `res_category` WHERE `c_name` LIKE '$category'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    $catId = 0;
    if ($row == 1) {
        $row = mysqli_fetch_assoc($result);
        $catId = $row['c_id'];
    }

    // it will br 4 if there is not image in there and 0 if there is an image available there
    $hasImage = ($_FILES["image"]["error"]);
    // checking the image
    if (!($hasImage)) {
        // echo "Has Image";
        // echo "image is here";

        // echo "<pre>";
        // print_r($_FILES['image']);
        // echo "</pre>";

        $img_name = $_FILES['image']['name'];

        move_uploaded_file($_FILES['image']['tmp_name'], "Res_img/" . $_FILES['image']['name']);

        $sql = "INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES (NULL, '$catId', '$name', '$email', '$phone', '$url', '$ohrs', '$chrs', '$odays', '$address', '$img_name', current_timestamp());";

        $result = mysqli_query($conn, $sql);
    }
}

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
            <?php
            include 'include/_mainAside.php';
            ?>


            <!--  ================================================================================ right side of the dashboard ================================================================================= -->
            <div class="main-right-display">
                <?php
                include 'include/_marquee_info.php';
                ?>

                <!-- <div class="marqueetag">
                    write the marquee here
                    <marquee behavior="" direction="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi eos sed aliquid culpa distinctio nostrum sequi a quas. Harum omnis at nobis amet deserunt sapiente totam provident laudantium officiis illum?</marquee>
                </div> -->

                <div class="update_restaurant-modal">
                    <div class="modal__container">
                        <div class="modal-start">
                            <div class="modal-heading">
                                <h2>Add New Restaurant</h2>
                                <hr>
                            </div>
                            <!-- action="operations-file/all_restaurant_modal-update.php" -->
                            <form id="modal-form" method="post" enctype="multipart/form-data">

                                <div class="first_row grid-row rows_b-margin">
                                    <div class="res_name">
                                        <label for="res_name">Restaurant Name</label><br>
                                        <input type="text" class="input-box" name="res_name" id="res_name" placeholder="Restaurant Name" minlength="3" required>
                                    </div>
                                    <div class="buss_email">
                                        <label for="bussiness_email">Bussiness E-Mail</label><br>
                                        <input type="text" class="input-box" name="bussiness_email" id="bussiness_email" placeholder="Bussiness Email" required>
                                    </div>
                                </div>

                                <div class="second_row grid-row rows_b-margin">
                                    <div class="phone">
                                        <label for="Phone">Phone</label><br>
                                        <input type="text" class="input-box" name="Phone" id="Phone" placeholder="Phone Number" minlength="10" maxlength="13" required>
                                    </div>
                                    <div class="website_url">
                                        <label for="web_url">Website URL</label><br>
                                        <input type="text" class="input-box" name="web_url" id="web_url" placeholder="Website URL" required>
                                    </div>
                                </div>

                                <div class="third_row grid-row rows_b-margin">
                                    <div class="o_hr">
                                        <label for="o_hrs">Open Hours</label><br>
                                        <!-- <input type="text" class="input-box" name="o_hrs" id="o_hrs" placeholder="Open Hours"> -->
                                        <select name="o_hrs" class="input-box custom-box" id="o_hrs" required>
                                            <option value selected disabled>--Select your Hours--</option>
                                            <option value="6am">6am</option>
                                            <option value="7am">7am</option>
                                            <option value="8am">8am</option>
                                            <option value="9am">9am</option>
                                            <option value="10am">10am</option>
                                            <option value="11am">11am</option>
                                        </select>
                                    </div>
                                    <div class="c_hr">
                                        <label for="c_hrs">Close Hours</label><br>
                                        <!-- <input type="text" class="input-box" name="c_hrs" id="c_hrs" placeholder="Close Hours"> -->
                                        <select name="c_hrs" class="input-box custom-box" id="c_hrs" required>
                                            <option value selected disabled>--Select your Hours--</option>
                                            <option value="3pm">3pm</option>
                                            <option value="4pm">4pm</option>
                                            <option value="5pm">5pm</option>
                                            <option value="6pm">6pm</option>
                                            <option value="7pm">7pm</option>
                                            <option value="8pm">8pm</option>
                                            <option value="9pm">9pm</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="fourth_row grid-row rows_b-margin">
                                    <div class="o_days">
                                        <label for="o_days">Open Days</label><br>
                                        <!-- <input type="text" class="input-box" name="o_days" id="o_days" placeholder="Open Days"> -->
                                        <select name="o_days" class="input-box custom-box" id="o_day" required>
                                            <option value selected disabled>--Select your Days--</option>
                                            <option value="mon-tue">mon-tue</option>
                                            <option value="mon-wed">mon-wed</option>
                                            <option value="mon-thu">mon-thu</option>
                                            <option value="mon-fri">mon-fri</option>
                                            <option value="mon-sat">mon-sat</option>
                                            <option value="24hr-x7">24hr-x7</option>
                                        </select>
                                    </div>
                                    <div class="image">
                                        <label for="image">Image &nbsp;<small>Selected Image.jpg</small></label><br>
                                        <input type="file" name="image" id="image" class="input-box" data-image_name="" required>
                                    </div>
                                </div>

                                <div class="last_row rows_b-margin">
                                    <label for="category">Select Category</label><br>
                                    <select name="category" class="input-box custom-box" id="category" required>
                                        <option value selected disabled>--Select Category--</option>
                                        <!-- fetching the categories using php -->
                                        <?php
                                        $sql = "SELECT * FROM `res_category`";
                                        $result = mysqli_query($conn, $sql);

                                        $row = mysqli_num_rows($result);
                                        if ($row > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $cat_name = $row['c_name'];
                                                echo "<option value='$cat_name'>$cat_name</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>


                                <div class="restaurant_address">
                                    <div class="res_address_heading">
                                        <label for="res_address">
                                            <h2>Restaurant Address</h2>
                                        </label>
                                        <hr>
                                    </div>
                                    <textarea class="input-box" name="res_address" id="res_address" cols="30" rows="6" placeholder="Restaurant Address" required></textarea>
                                </div>

                                <div class="modal-buttons" style="display: flex;">
                                    <input type="submit" class="update-btn btn" value="ADD" name="submit" required>
                                    <a class="cancle-btn btn">CLOSE</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    </div>





    <?php
    include 'include/_footer.php';
    ?>



    <script src="javascript/script.js"></script>
    <script src="javascript/all_restaurant_edit-update.js"></script>


</body>

</html>