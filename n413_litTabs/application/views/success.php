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

            <div>
                <?php

                if(isset($_SESSION["ourUser"])){
                    echo ' <h2>WELCOME !! </h2> <p class="text-warning">Welcome '.$_SESSION["ourUser"].'</p> 
         <a id="contact_link" class="nav-link text-dark" href="logout">LogOut</a>
          <a href="'. site_url().'/"><button>Go Shop!</button></a>';
                }else{
                    echo '<p>Sorry, Unfortunatly we are not able to find a match in our system. Please Try again or sign up today!!</p> <button> <a id="contact_link" class="nav-link text-dark" href="login">LogIn</a></button>';
                }
                ?>
            </div>
        </div> <!-- /.col-12 -->
    </div> <!-- /.row -->



</div> <!-- /.container-fluid -->
</body>
<script>

    $(document).ready(function(){
        document.title = page_title;
        navbar_update(this_page);

    }); //document.ready




</script>
</html>