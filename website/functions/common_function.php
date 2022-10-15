<?php

include('./includes/connect.php');

function getproducts(){
        global $con;
        if(!isset($_GET['category'])){
            $select_query="select * from `products` order by product_title limit 0,3";
            $result_query=mysqli_query($con,$select_query);
            while($row=mysqli_fetch_assoc($result_query)){
                $product_id=$row['product_id']; 
                $product_title=$row['product_title']; 
                $product_description=$row['product_description'];
                $product_category=$row['category_id']; 
                $product_image=$row['product_image'];      
                $product_price=$row['product_price'];
                echo "  <div class='col-md-4 mb-2'>
                            <div class='card'>
                                <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <p class='card-text'>Pret: $product_price RON</p>
                                    <a href='#' class='btn btn-success' style='border:2px solid GreenYellow'>Adauga in cos</a>
                                    <a href='product_detail.php?product_id=$product_id' class='btn btn-success' style='border:2px solid GreenYellow'>Descriere</a>
                                </div>
                            </div>
                        </div>";
            }
        }
}

function getuniquecategories(){
    global $con;
    
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        $select_query="select * from `products` where category_id=$category_id";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id']; 
            $product_title=$row['product_title']; 
            $product_description=$row['product_description'];
            $product_category=$row['category_id']; 
            $product_image=$row['product_image'];      
            $product_price=$row['product_price'];
            echo "  <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Pret: $product_price RON</p>
                                <a href='#' class='btn btn-success' style='border:2px solid GreenYellow'>Adauga in cos</a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-success' style='border:2px solid GreenYellow'>Descriere</a>
                            </div>
                        </div>
                    </div>";
        }
    }
}


function getcategories(){
    global $con;
        $select_categories="select * from `categories`";
        $result_categories=mysqli_query($con,$select_categories);
        while($row_data=mysqli_fetch_assoc($result_categories)){
            $category_title=$row_data['category_title'];
            $category_id=$row_data['category_id'];
            echo "  <li class='nav-item'>
                        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                    </li> ";
        }
}

function search(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query="select * from `products` where product_title like '%$search_data_value%'";
        $result_query=mysqli_query($con,$search_query);
        $number=mysqli_num_rows($result_query);
        if($number==0){
            echo "<h2 class='text-center text-danger'>Nu a fost gasit niciun produs.</h2>'";
        }
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id']; 
            $product_title=$row['product_title']; 
            $product_description=$row['product_description'];
            $product_category=$row['category_id']; 
            $product_image=$row['product_image'];      
            $product_price=$row['product_price'];
            echo "  <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Pret: $product_price RON</p>
                                <a href='#' class='btn btn-success' style='border:2px solid GreenYellow'>Adauga in cos</a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-success' style='border:2px solid GreenYellow'>Descriere</a>
                            </div>
                        </div>
                    </div>";
        }
    }
}


function getallproducts(){
    global $con;
    if(!isset($_GET['category'])){
        $select_query="select * from `products` order by product_title";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id']; 
            $product_title=$row['product_title']; 
            $product_description=$row['product_description'];
            $product_category=$row['category_id']; 
            $product_image=$row['product_image'];      
            $product_price=$row['product_price'];
            echo "  <div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>Pret: $product_price RON</p>
                                <a href='#' class='btn btn-success' style='border:2px solid GreenYellow'>Adauga in cos</a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-success' style='border:2px solid GreenYellow'>Descriere</a>
                            </div>
                        </div>
                    </div>";
        }
    }

}

function product_detail(){
    global $con;
    if(isset($_GET['product_id'])){ 
    if(!isset($_GET['category'])){
        $product_id=$_GET['product_id'];
        $select_query="select * from `products` where product_id=$product_id";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id']; 
            $product_title=$row['product_title']; 
            $product_description=$row['product_description'];
            $product_category=$row['category_id']; 
            $product_image=$row['product_image'];      
            $product_price=$row['product_price'];
            echo "  
                    <div class='col-md-6'>
                        <div class='card'>
                            <img src='./admin/product_images/$product_image' class='card-img-top' alt='$product_title'>
                        </div>
                    </div>
                    
                    <div class='col-md-5 text-center'>
                        <div class='card'>
                            <div class='card-body'>
                            <h2 class='card-title'>$product_title</h2>
                            <h6 class='card-text'>$product_description</h6>
                            <h5 class='card-text'>Pret: $product_price RON</h5>
                            <a href='#' class='btn btn-success' style='border:2px solid GreenYellow'>Adauga in cos</a>
                        </div>
                    </div>
                    </div>
                

                ";
        }
    }
}
}


?>
