<h3 class="text-center">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="">
        <tr class="text-center">
            <th>Slno</th>
            <th>Brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="">
    <?php 
        $select_brand="Select * from brands"; 
        $result=mysqli_query($con, $select_brand); 
        $number=0;
        while($row=mysqli_fetch_assoc($result))
        { 
            $brand_id=$row['brand_id']; 
            $brand_title=$row['brand_title']; 
            $number++;
    ?>  
        <tr class="text-center">
            <td><?php echo $number;?></td>
            <td><?php echo $brand_title;?></td>
            <td><a href='index.php?edit_brand=<?php echo $brand_id?>' class='text-black'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id?>' class='text-black'><i class='fa-solid fa-trash'></i></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>




