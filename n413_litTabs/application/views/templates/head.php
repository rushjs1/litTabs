<!DOCTYPE html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
            <title><?=$page_title?></title>
<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

<script src="<?=base_url()?>assets/js/jquery-3.4.1.min.js" type="application/javascript"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js" type="application/javascript"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js.map" type="application/javascript"></script>

<script>
    var this_page = "<?=$this_page?>";
    var page_title = "<?=$page_title?>";

    function navbar_update(this_page){
        $("#"+this_page+"_item").addClass('active');
        $("#"+this_page+"_link").append(' <span class="sr-only">(current)</span>');
    }
</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#bfaa8f;">
    <a class="navbar-brand text-warning" href="<?=site_url()?>">The Giving Moon</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li id="home_item" class="nav-item">
                <a id="home_link" class="nav-link" href="<?=site_url()?>">Shop</a>
            </li>
            <li id="litlist_item" class="nav-item">
                <a id="litlist_link" class="nav-link" href="<?=site_url()?>/litshop/getCart">Cart</a>
             
            </li>
            <li id="contact_item" class="nav-item">
                <a id="contact_link" class="nav-link" href="<?=site_url()?>/litshop/login">Login</a>
            </li>
        </ul>
    </div>

    <?php
/*    if($_SESSION["ourUser"]){
        echo '<h1>Welcome '.$_SESSION["ourUser"].'</h1> 
    <a id="contact_link" class="nav-link text-danger" href="<?=site_url()?>/litshop/logout">LogOut</a>';
    }else{
        echo '<p>You should Login 😎 </p>';
    }
    */

    if(isset($_SESSION["ourUser"])){
        echo '<p class="text-warning">Welcome '.$_SESSION["ourUser"].'</p> 
    <!--<a id="contact_link" class="nav-link text-dark" href="index.php/litshop/logout">LogOut</a>-->
     <a id="contact_link" class="nav-link text-dark"  href="'.site_url().'/litshop/logout">LogOut</a>';
    }else{
        echo '<p>You should Login 😎 </p>';
    }
    ?>




</nav>


