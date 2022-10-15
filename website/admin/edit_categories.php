<?php 

if(isset($_GET['edit_categories'])){
    $edit_id=$_GET['edit_categories']; 
    $get_data="select * from `categories` where category_id=$edit_id"; 
    $result=mysqli_query($con,$get_data); 
    $row=mysqli_fetch_assoc($result); 
    $category_title=$row['category_title']; 
    $category_id=$row['category_id']; 
}
?>

<div class="container mt-5">
    <h1 class="text-center">Editeaza</h1> 
    <form action="" method="post" enctype="multipart/form-data"> 
        <div class="form-outline w-50 m-auto mb-4">
        <label for="category_title" class="form-label">Categorie</label> 
        <input type="text" id="category_title" value="<?php echo $category_title?>" name="category_title" class="form-control" required="required"> 
    </div> 

    <div class="w-50 m-auto">
        <input type="submit" name="edit categories" value="Salveaza" class="btn btn-success px-3 mb-3"> 
    </div>
</form> 
</div>

<?php
    if(isset($_POST['edit_categories'])){
    $category_title=$_POST['category_title']; 

    if($category_title=='' ){
        echo "<script>alert('Completeaza toate campurile')</script>";}
        else{
            
            $update_category="update `categories` set category_title='$category_title' where category_id=$edit_id"; 
            $result_update=mysqli_query($con,$update_category); 
            if($result_update){
                echo "<script>alert('Categoria a fost editata cu succes!')</script>";       
            }

        }
    }

?>