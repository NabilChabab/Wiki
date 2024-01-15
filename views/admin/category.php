<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="/Wiki/public/css/admin.css">
    <link rel="stylesheet" href="/Wiki/public/css/cat.css">

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation active">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Wiki</span>
                    </a>
                </li>

                <li>
                    <a href="admin">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Users</span>
                    </a>
                </li>

                <li class="active">
                    <a href="books.php">
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
                <div class="card">
                    <div>
                        <div class="numbers" style="font-size:25px;">
                            <p>Total Tags</p>
                        </div>
                        <div class="cardName">
                            <p>2000</p>

                        </div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="checkmark-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers" style="font-size:25px;">
                            <p>Total Categories</p>
                        </div>
                        <div class="cardName">
                            <p>2000</p>

                        </div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="checkmark-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers" style="font-size:25px;">
                            <p>Total Tags</p>
                        </div>
                        <div class="cardName">
                            <p>2000</p>

                        </div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="checkmark-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers" style="font-size:25px;">
                            <p>Total Tags</p>
                        </div>
                        <div class="cardName">
                            <p>2000</p>

                        </div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="checkmark-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details" style="display:flex;width:100%;justify-content:space-between;">
                <div class="recentOrders" style="width:50%;">
                    <div class="cardHeader">
                        <h2>Recent Categories</h2>
                        <a href="#" class="btn">Add New Category</a>
                    </div>
                    <div id="addCategoryModal" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModal()">&times;</span>
                            <h2>Add New Category</h2>
                            <form id="addCategoryForm" action="addcatg" method="post">
                                <label for="categoryName">Category Name:</label>
                                <input type="text" id="categoryName" name="category" required>
                                <button name="addcatg" type="submit">Add Category</button>
                            </form>
                        </div>
                    </div>

                    <table id="userTable">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Category</td>
                                <td>Action</td>

                            </tr>
                        </thead>

                        <tbody id="userTableBody">
                            <?php foreach ($category as $catg): ?>
                                <tr>
                                    <td>
                                        <?= $catg['id'] ?>
                                    </td>
                                    <td>
                                        <?= $catg['name'] ?>
                                    </td>
                                    <td>
                                        <a href="#" class="update-category" data-id="<?= $catg['id'] ?>"
                                            style="color:black;font-size:20px;margin-right:20px">
                                            <ion-icon name="pencil-outline"></ion-icon>
                                        </a>
                                        <div id="updateCategoryModal<?= $catg['id'] ?>" class="modal">
                                            <div class="modal-content">
                                                <span class="close"
                                                    onclick="closeModal('updateCategoryModal<?= $catg['id'] ?>')">&times;</span>
                                                <h2 style="color:black;">Update Category</h2>
                                                <form id="updateCategoryForm<?= $catg['id'] ?>" action="editcat?id=<?= base64_encode($catg['id']) ?>"
                                                    method="Post">
                                                    <label for="categoryName" style="color:black;">Category Name:</label>
                                                    <input type="text" id="categoryName<?= $catg['id'] ?>" name="newCategory"
                                                        value="<?= $catg['name'] ?>" required>
                                                    <button name="update" type="submit">Update Category</button>
                                                </form>
                                            </div>
                                        </div>
                                        <a href="#" style="color:red;font-size:20px;">
                                            <ion-icon name="close-circle-outline"></ion-icon>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- Update Category Modal -->


                <!-- ================= New Customers ================ -->
                <div class="recentOrders" style="width:50%;">
                    <div class="cardHeader">
                        <h2>Recent Tags</h2>
                        <a href="#" class="btn">Add New Tag</a>
                    </div>
                    <div id="addTagModal" class="modal">
                        <div class="modal-content">
                            <span class="close" onclick="closeModalTag()">&times;</span>
                            <h2>Add New Tag</h2>
                            <form id="addTagForm" action="addtag" method="post">
                                <label for="TagName">Tag Name:</label>
                                <input type="text" id="TagName" name="tag" required>
                                <button name="addtag" type="submit">Add Tag</button>
                            </form>
                        </div>
                    </div>

                    <table id="userTable">
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Tag</td>
                                <td>Action</td>

                            </tr>
                        </thead>

                        <tbody id="userTableBody">
                            <?php foreach ($tags as $tag): ?>
                                <tr>
                                    <td>
                                        <?= $tag['id'] ?>
                                    </td>
                                    <td>
                                        <?= $tag['name'] ?>
                                    </td>
                                    <td>
                                        <a href="#" style="color:black;font-size:20px;margin-right:20px"><ion-icon
                                                name="pencil-outline"></ion-icon></a>
                                        <a href="#" style="color:red;font-size:20px;"><ion-icon
                                                name="close-circle-outline"></ion-icon></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- ======================= Cards ================== -->
        </div>

    </div>

    <!-- =========== Scripts =========  -->
    <script src="/Wiki/public/js/admin.js"></script>
    <script src="/Wiki/public/js/cat.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>