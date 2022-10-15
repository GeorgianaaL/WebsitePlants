<?php
include('../includes/connect.php');
    if(isset($_POST['insert_cat'])){
        $category_title=$_POST['cat_title'];

        // select
        $select_query="select * from `categories` where category_title='$category_title'";
        $result_select=mysqli_query($con,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo "<script>alert('Aceasta categorie exista deja!')</script>";
        }else{
        $insert_query="insert into `categories` (category_title) values ('$category_title')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Categoria a fost adaugata cu succes!')</script>";
        }}
    }
?>

<h2 class="text-center">Adauga o categorie noua</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipe"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Adauga categorie" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="form-control bg-success border-0 p-2 my-3" name="insert_cat" value="Adauga">

    </div>

</form>