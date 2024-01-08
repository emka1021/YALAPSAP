<h3 class="text-center text-success">Tüm Kategoriler</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">

            <td>Kategori No</td>
            <td>Kategori Adı</td>
            <td>Düzenle</td>
            <td>Sil</td>

        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_cat = "Select * from `categories`";
        $result = mysqli_query($con,$select_cat);
        $number = 0;
        while($row = mysqli_fetch_assoc($result)){
            $category_id = $row['category_id'];
            $category_title = $row['category_title'];
            $number++;
      
        ?>
        <tr class="text-center">
            <td><?php echo $number?></td>
            <td><?php echo $category_title?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>

        </tr>
        <?php   } ?>
    </tbody>
</table>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Bu Kategoriyi Silmek İstediğine Emin Misin ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands" class="text-light text-decoration-none">Hayır</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_category=<?php echo $category_id?>' type="button" class="btn btn-primary 'text-light'" data-toggle="modal" data-target="#exampleModal">Evet</a></button>
      </div>
    </div>
  </div>
</div> -->