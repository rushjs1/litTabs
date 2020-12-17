

<style>
    .cursor-pointer {cursor:pointer;}
    body {
        background-color: #bfaa8f;
        color: #fffcee;
        height: 100%;
    }
    .container-fluid{
        height: 100%;

    }
</style>
<div class="container-fluid min-vh-100">
    <div id-"headline" class="row mt-5">
    <div class="col-12 text-center">
        <?php
        if($row){
            echo '<h1>'.$row["productName"].'</h1>';
        }else{
            echo '<h2>There has been a database error.</h2>';
        }
        ?>
    </div> <!-- /.col-12 -->
</div> <!-- /.row -->
<?php
if($row){
    echo '      
                <div class="row mt-3">
                    <div class="col-1"></div>  <!-- spacer -->
                    <div class="col-4"><img src="'.$row["image"].'" width="100%"/></div>
                    <div class="col-6 text-dark">'.$row["productDescription"].'   <div class="mt-3 text-danger"><p class="text-warning">Price: </p>'.$row["buyPrice"].'</div></div>
                    
                
                </div>  <!-- /.row -->';

}
?>

<div class="row mt-4 mb-5">
    <div class="col-12 text-center">
        <p>**DISCLAIMER**: This is not a physical product. Digital downloads will expire so please store them on your computer for future use. </p>
        <a href="<?=site_url()?>/litshop/addToCart/<?=$row["productId"]?>"><button class="btn btn-warning">Add to Cart</button></a>
        <a href="<?=site_url()?>"><button class="btn btn-dark">Back to The Products</button></a>
    </div> <!-- /.col-12 -->
</div> <!-- /.row -->
</div> <!-- /.container-fluid -->
</body>
</html>