<?php 

if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products']; 
    // echo $edit_id; 
    $get_data="select * from `products` where product_id=$edit_id"; 
    $result=mysqli_query($con,$get_data); 
    $row=mysqli_fetch_assoc($result); 
    $product_title=$row['product_title']; 
    // echo $product_title; 
    $product_description=$row['product_description']; 
    $category_id=$row['category_id']; 
    $product_image=$row['product_image']; 
    $product_price=$row['product_price'];
}
?>

<div class="container mt-5">
    <h1 class="text-center">Editeaza</h1> 
    <form action="" method="post" enctype="multipart/form-data"> 
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_title" class="form-label">Titlu</label> 
        <input type="text" id="product_title" value="<?php echo $product_title?>" name="product_title" class="form-control" required="required"> 
    </div> 

    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_description" class="form-label">Descriere</label> 
        <input type="text" id="product_description" value="<?php echo $product_description?>" name="product_description" class="form-control" required="required"> 
    </div> 

    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_image" class="form-label">Imagine</label> 
        <div class="d-flex"> 
            <input type="file" id="product_image" name="product_image" class="form-control W-90 m-auto" required="required"> 
            <img src="/product_images/<?php echo $product_image?>" alt="" class="poduct_image">
        </div> 
    </div>

    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_price" class="form-label">Pret</label> 
        <input type="text" id="product_price" value="<?php echo $product_price?>" name="product_price" class="form-control" required="required">
    </div> 

    <div class="w-50 m-auto">
        <input type="submit" name="edit product" value="Salveaza" class="btn btn-success px-3 mb-3"> 
    </div>
    </form> 
</div>

<?php
    if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title']; 
    $product_description=$_POST['product_description']; 
    $product_price=$_POST['product_price'];
    
    $product_image=$_FILES['product_image']['name'];
    $temp_image=$_FILES['product_image']['tmp_name'];
    
    // checking fo fields empty or not 
    if($product_title=='' or $product_description=='' or $product_image==''  or $product_price==''){
        echo "<script>alert('Completeaza toate camputrile')</script>";}
        else{
            move_uploaded_file($temp_image,"./product_images/$product_image");
        
            // query to update products 
            $update_product="update `products` set product_title='$product_title', product_description='$product_description', product_image='$product_image', product_price='$product_price' where product_id=$edit_id"; 
            $result_update=mysqli_query($con,$update_product); 
            if($result_update){
                echo "<script>alert('Produsul a fost editat cu succes!')</script>";
            }

        }
    }

?>