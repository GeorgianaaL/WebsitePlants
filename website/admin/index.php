<?php
    include('../includes/connect.php');
   
?>


<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title> 
    <!-- bootstrat CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link css -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
            width: 300px;
            object-fit: contain;
        }
        .footer{
            position: absolute;
            bottom: 0;
        }

        .administrare{
            background-image: url("../image/bck9.jpg");
            height: 50px;
            background-repeat: repeat;
        }

        .top{
            background-image: url("../image/bck13.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .nav-link{
            background-image: url("../image/bck7.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        
    </style>
</head> 
<body>
     
    <!--navbar -->
    <div class="container-fluid p-0">

        <!-- first child -->
        <nav class=" top navbar navbar-expand-lg navar-light bg-success">
            <div class="container-fluid">
                <img src="../image/gllogo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="../index.php" class="nav-link text-light">Pagina principala</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="administrare rounded">
            <h3 class="text-center text-light p-2">Administrare magazin</h3>
        </div>


        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-transparent p-1 d-flex align-items-center">
                <div class="p-5">
                    <a href="#"><img src="../image/plants.jpg" alt="" class="admin_image"></a>

                </div>
                <div class="button text-center btn-outline-light rounded">
                    <button><a href="insert_products.php" class="nav-link text-light bg-success p-4">Produs nou</a></button>
                    <button><a href="index.php?products_list" class="nav-link text-light bg-success p-4">Produse</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-success p-4">Categorie noua</a></button>
                    <button><a href="index.php?categories_list" class="nav-link text-light bg-success p-4">Categorii</a></button>


                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-2">
            <?php 
                if(isset($_GET['insert_category'])){
                    include('insert_categories.php');
                }

                if(isset($_GET['products_list'])){
                    include('products_list.php');
                }

                if(isset($_GET['edit_products'])){
                    include('edit_products.php');
                }

                if(isset($_GET['delete_products'])){
                    include('delete_products.php');
                }

                if(isset($_GET['categories_list'])){
                    include('categories_list.php');
                }

                if(isset($_GET['edit_categories'])){
                    include('edit_categories.php');
                }

                if(isset($_GET['delete_categories'])){
                    include('delete_categories.php');
                }

            ?>
        </div>

        <!-- last child -->
        <?php
            include("../includes/footer.php");
        ?>


    </div>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body> 
</html>