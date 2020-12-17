<style>
    .cursor-pointer {cursor:pointer;}
    body {
        background-color: #bfaa8f;
        color: #fffcee;
        height: 100%;
    }
/*    .container-fluid{
        height: 100%;
        background-color: #00CC00;
    }*/
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center mt-5">
            <h2>Register</h2>
        </div> <!-- /col-12 -->
    </div> <!-- /row -->
    <form method="POST" action="<?=site_url()?>/litshop/registerUser">
        <div class="row mt-5">
            <div class="col-4"></div>  <!-- spacer -->
            <div id="form-container" class="col-4">

                E-mail: <input type="email" id="email" name="email" class="form-control" value="" placeholder="Enter E-mail" required/><br/>
                Password: <input type="password" id="password" name="password" class="form-control" value="" placeholder="Enter password" required/><br/>
                <button type="submit" id="submit" class="btn btn-primary float-right">Submit</button>
            </div> <!-- /#form-container" -->

        </div>  <!-- /row -->
    </form>
</div>  <!-- /.container-fluid -->
</body>
<script>
    $(document).ready(function(){
        document.title = page_title;
        navbar_update(this_page);

    }); //document.ready

</script>
</html>