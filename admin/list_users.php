<?php
include("../includes/connect.php");
include_once("../includes/session_handler.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users Page</title>
</head>

<body>
<div class="container">
    <div class="categ-header">
        <div class="sub-title">
            <span class="shape"></span>
            <h2>All Users</h2>
        </div>
    </div>
    <div class="table-data">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead class="table-dark">
            <?php
            $get_user_query = "SELECT * FROM `user_table`";
            $get_user_result = mysqli_query($con, $get_user_query);
            $row_count = mysqli_num_rows($get_user_result);
            if ($row_count != 0) {
                echo "
                        <tr>
                        <th>User No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Delete</th>
                    </tr>
                    ";
            }
            ?>
            </thead>
            <tbody>
            <?php
            if ($row_count == 0) {
                echo "<h2 class='text-center text-light p-2 bg-dark'>No users yet</h2>";
            } else {
                $id_number = 1;

                while ($row_fetch_users = mysqli_fetch_array($get_user_result)) {
                    $user_id = $row_fetch_users['user_id'];
                    $username = $row_fetch_users['username'];
                    $user_email = $row_fetch_users['user_email'];
                    $user_image_key = $row_fetch_users['user_image'];
                    $user_address = $row_fetch_users['user_address'];
                    $user_mobile = $row_fetch_users['user_mobile'];

                    if ($user_image_key) {
                        $user_image_url = '/users_area/user_images/' . urlencode($user_image_key);
                    } else {
                        $user_image_url = '/users_area/user_images/profile.png'; // Default image if none exists
                    }

                    echo "
                            <tr>
                            <td>$id_number</td>
                            <td>$username</td>
                            <td>$user_email</td>
                            <td>
                                <img src='$user_image_url' alt='$username photo' class='img-thumbnail' width='100px'/>
                            </td>
                            <td>$user_address</td>
                            <td>$user_mobile</td>
                            <td>
                                <a href='index.php?delete_user=$user_id' data-bs-toggle='modal' data-bs-target='#deleteModal_$user_id'>
                                    <!-- Delete icon SVG or image -->
                                </a>
                                <!-- Modal -->
                            </td>
                        </tr>
                            ";

                    $id_number++;
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>

</html>
