<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="/Wiki/public/css/admin.css">

</head>
<style>
    .admin {
        display: flex;
        gap: 1rem;
    }

    .name p {
        font-weight: bold;
        color: grey;
    }
</style>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation active" style="">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Wiki</span>
                    </a>
                </li>

                <li class="active">
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Users</span>
                    </a>
                </li>

                <li>
                    <a href="category">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Category & Tag</span>
                    </a>
                </li>
                <li>
                    <a href="wikis">
                        <span class="icon">
                            <ion-icon name="checkmark-outline"></ion-icon>
                        </span>
                        <span class="title">Wikis</span>
                    </a>
                </li>

                <li>
                    <a href="logout">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main active">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here" name="search" id="search">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="admin">
                    <div class="user">
                        <img src="/Wiki/public/img/<?php echo $_SESSION['admin_image'] ?>" alt="">
                    </div>
                    <div class="name">
                        <p>
                            <?php echo isset($_COOKIE['user_name']) ? $_COOKIE['user_name'] : ''; ?>
                        </p>
                        <p>
                            <?php echo isset($_COOKIE['user_role']) ? $_COOKIE['user_role'] : ''; ?>
                        </p>
                    </div>
                </div>
            </div>


            <div class="cardBox">
                <?php 
                    $counter = 0;
                foreach($users as $user): ?>
                <div class="card">
                    <div>
                        <div class="numbers" style="font-size:25px;">
                            <p><?= $user['fullname']?></p>
                        </div>
                        <div class="cardName">
                        <p><?= $user['email']?></p>
                           
                        </div>
                    </div>

                    <div class="iconBx">
                        <img src="/Wiki/public/img/<?= $user['profil']?>" alt="Profile" style="max-width:50px;border-radius:50%;">
                    </div>
                </div>
                <?php
                $counter++;
                if($counter >= 4){
                    break;
                }
             endforeach; ?>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Users</h2>
                        <a href="add_students.php" class="btn">View All</a>
                    </div>

                    <table id="userTable">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Profil</td>
                                <td>FullName</td>
                                <td>Address</td>
                                <td>Email</td>
                                <td>Type</td>
                                <td>Actions</td>

                            </tr>
                        </thead>

                        <tbody id="userTableBody">
                            <?php foreach($users as $user):?>
                            <tr>
                                <td> <?= $user['id']?></td>
                                <td><img src="/Wiki/public/img/<?= $user['profil']?>" alt="Profile"
                                        style="max-width:45px;border-radius:50%;"></td>
                                <td><?= $user['fullname']?></td>
                                <td><?= $user['address']?></td>
                                <td><?= $user['email']?></td>
                                <td><?= isset($user['role_id'])?'Author':''?></td>
                                <td>
                                    <a href="#"
                                        style="color:black;font-size:20px;margin-right:20px"><ion-icon
                                            name="pencil-outline"></ion-icon></a>
                                    <a href="#"
                                        style="color:red;font-size:20px;"><ion-icon
                                            name="close-circle-outline"></ion-icon></a>
                                </td>
                            </tr>
                            <?php endforeach;?>

                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->

            </div>

            <!-- ======================= Cards ================== -->
        </div>

    </div>

    <!-- =========== Scripts =========  -->
    <script src="/Wiki/public/js/admin.js"></script>






    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>