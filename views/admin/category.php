<?php session_start();
 if(empty($_SESSION['role'])){
    header('location:signin');
}
?>
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

    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 100001;
    }

    .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 50%;
        border-radius: 15px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        background-color: #00023A;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        display: block;
        margin: 0 auto;
    }

    button:hover {
        background-color: #45a049;
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modal = document.getElementById('addCategoryModal');
            var updateModal = document.getElementById('updateCategoryModal');
            var span = document.querySelector('.close');
            var modals = document.querySelectorAll('.modal');

            // Open addCategoryModal
            var addButton = document.querySelector('.btn');
            addButton.onclick = function () {
                modal.style.display = 'block';
            };

            span.onclick = function () {
                closeModal();
            };

            window.onclick = function (event) {
                if (event.target == modal) {
                    closeModal();
                }
            };

            function openUpdateModal(categoryId) {
                updateModal.style.display = 'block';
            }

            function closeUpdateModal() {
                updateModal.style.display = 'none';
            }

            var updatePencilIcons = document.querySelectorAll('.update-category');
            updatePencilIcons.forEach(function (icon) {
                icon.addEventListener('click', function () {
                    var categoryId = icon.dataset.id;
                    openModal('updateCategoryModal' + categoryId);
                });
            });

            function openModal(modalId) {
                var modal = document.getElementById(modalId);
                modal.style.display = 'block';
            }

            function closeModal(modalId) {
                var modal = document.getElementById(modalId);
                modal.style.display = 'none';
            }
            var updateCloseButton = document.querySelector('.update-close-btn');
            updateCloseButton.onclick = function () {
                closeUpdateModal();
            };

            function closeModal() {
                modal.style.display = 'none';
            }
        });


    </script>





    <!-- <script>
        var modal = document.getElementById('addCategoryModal');

        var addButton = document.querySelector('.btn');

        var span = document.querySelector('.close');

        addButton.onclick = function () {
            modal.style.display = 'block';
        };

        span.onclick = function () {
            closeModal();
        };

        window.onclick = function (event) {
            if (event.target == modal) {
                closeModal();
            }
        };

        function closeModal() {
            modal.style.display = 'none';
        }
    </script> -->

    <script>
        var modalTag = document.getElementById('addTagModal');
        var addButtonTag = document.querySelectorAll('.btn')[1];  // Selecting the second .btn element
        var spanTag = document.querySelectorAll('.close')[1];  // Selecting the second .close element

        addButtonTag.onclick = function () {
            modalTag.style.display = 'block';
        };

        spanTag.onclick = function () {
            closeModalTag();
        };

        window.onclick = function (event) {
            if (event.target == modalTag) {
                closeModalTag();
            }
        };

        function closeModalTag() {
            modalTag.style.display = 'none';
        }
    </script>







    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>