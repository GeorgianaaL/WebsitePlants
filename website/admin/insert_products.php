<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title']; 
    $description=$_POST['description']; 
    $product_category=$_POST['product_category']; 
    $product_price=$_POST['product_price'];
    
    // accessing images 
    $product_image=$_FILES['product_image']['name']; 
    
    // accesing image tmp name 
    $temp_image=$_FILES['product_image']['tmp_name']; 

    // checking empty condition 
    if($product_title=='' or $description=='' or $product_category=='' or $product_price=='' or $product_image==''){
        echo "<script>alert('Completeaza toate campurile')</script>";
        exit(); 
    }else{
        move_uploaded_file($temp_image,"./product_images/$product_image");

        // insert query 
        $insert_products="insert into `products` (product_title,product_description,category_id,product_image,product_price) 
        values ('$product_title','$description','$product_category','$product_image','$product_price')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('Produsul a fost adaugat cu succes!')</script>";
        }
    }
}
?>

<!DOCTYPE html> 
<html lang="en"> 
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adaugare produse</title> 
    <!-- bootstrat CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link css -->
    <link rel="stylesheet" href="../style.css">

</head> 
<body class="bg-light">
    <div class="container mt-3 p-0">
        <h1 class="bg-success text-light text-center mb-5 p-0 m-auto">Adauga un produs nou</h1> 
        <!-- form --> 
        <form action="" method="post" enctype="multipart/form-data"> 
            <!-- titlu -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Titlul produsului</label> 
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Titlu produs" autocomplete="off" require="required">
            </div> 

            <!-- descriere -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Descrierea produsului</label> 
                <input type="text" name="description" id="description" class="form-control" placeholder="Descriere" autocomplete="off" require="required">
            </div> 

            <!-- categorie  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Selecteaza o categorie</option> 
                    <?php
                        $select_query="select * from `categories`"; 
                        $result_query=mysqli_query($con, $select_query); 
                        while($row=mysqli_fetch_assoc($result_query)) {
                            $category_title=$row['category_title']; 
                            $category_id=$row['category_id']; 
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- imagine -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Imaginea produsului</label> 
                <input type="file" name="product_image" id="product_image" class="form-control" require="required">
            </div> 

            <!-- pret -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Pretul produsului</label> 
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Pret" autocomplete="off" require="required">
            </div> 

            <!-- submit -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-success mb-3 px-3" value="Adauga">
            </div>

        </form> 
    </div>



</body>
</html>
