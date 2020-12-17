<style>
    .cursor-pointer {cursor:pointer;}
    body {
        background-color: #bfaa8f;
        color: #fffcee;

    }
</style>
<div class="container-fluid">
    <div id="headline" class="row mt-5">
    <div class="col-12 text-center">
        <h2>Official tabs written by the members themselves</h2>
    </div> <!-- /.col-12 -->
</div> <!-- /.row -->
<?php
foreach ($records as $record){
    echo '
                <div class="row record-item mt-5 cursor-pointer" data-id="'.$record["productId"].'" data-item="'.$record["productName"].'">
                    <div class="col-1"></div>  <!-- spacer -->
                    <div class="col-3"><img src="'.$record["image"].'" width="100%"/></div>
                    <div class="col-7"><b>'.$record["productName"].'</b> </div>
                </div>  <!-- /.row -->
                <!-- <img src="'.base_url().'assets/'.$record["image"].'" width="100%"/> -->';
} //foreach
?>
</div> <!-- /.container-fluid -->
</body>
<script>

    $(document).ready(function(){
        document.title = page_title;
        navbar_update(this_page);
        $(".record-item").on("click", function(){
            var id = $(this).data('id');
            show_detail(id);
        }); //on()

    });
    function show_detail(id){
        window.location.assign("<?=site_url()?>/litshop/detail/"+id);
    }


</script>
</html>