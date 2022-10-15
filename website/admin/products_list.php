

<h3 class="text-center">Produse</h3>

<table class="table table-striped mt-5">
    <thed>
        <tr class="bg-success text-light text-center">
            <th>ID</th>
            <th>Imagine</th>
            <th>Denumire produs</th>
            <th>Descriere produs</th>
            <th>Pret</th>
            <th>Categorie</th>
            <th>Editare</th>
            <th>Stergere</th>
        </tr>
    </thed>

   
    <tbody class="text-success text-center">

    <?php
    $get_products="select p.product_id, p.product_image, p.product_title, p.product_description, p.product_price, c.category_title 
    from `products` p left join `categories` c on p.category_id=c.category_id";
    $result=mysqli_query($con,$get_products);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $product_id=$row['product_id'];
        $product_image=$row['product_image'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_price=$row['product_price'];
        $product_category=$row['category_title'];
        $number++;
    ?>
    
    <tr class='text-success text-center'>
        <td><?php echo $number;?></td>
        <td><img src='./product_images/<?php echo $product_image;?>' class='product_image'></td>
        <td><?php echo $product_title;?></td>
        <td><?php echo $product_description;?></td>
        <td><?php echo $product_price;?></td>
        <td><?php echo $product_category;?></td>
        <td><a href='index.php?edit_products=<?php echo $product_id?>' class='text-success'><i class='fa-solid fa-pen-nib'></i></a></td>
        <td><a href='index.php?delete_products=<?php echo $product_id?>' class='text-success'><i class='fa-solid fa-trash-can'></i></a></td>
    </tr>
    <?php
    }
?>

        
    </tbody>
</table>
