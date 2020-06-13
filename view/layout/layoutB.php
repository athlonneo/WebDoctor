<?php
    if ( isset( $_SESSION['username'])==FALSE  ) {
        header("Location: login");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="view/css/styleB.css">
    <link rel="stylesheet" type="text/css" href="view/css/font-awesome.css">
</head>
<body>
    <div class="top2" id="navbar">
        <div class="rowA">
            <div class="kolom left">
                <a href="company" class="linkLogo">
                    <div class="top2LeftLogo"> 
                        <i class="fa fa-heartbeat" id="logoHeart"></i>
                        <div style="font-size:80%">WebDoctor</div>
                    </div>
                </a>
            </div>
            <div class="kolom mid">
                <ul class="navBar">
                    <li>
                        <form method="GET" action="index">
                            <input type="submit" value="Home">
                        </form>
                    </li>
                    <li>
                        <form method="GET" action="diagnose" >
                            <input type="submit" value="Diagnose">
                        </form>
                    </li>
                    <li>
                        <form method="GET" action="history" >
                            <input type="submit" value="History">
                        </form>
                    </li>
                    <li>
                        <form method="GET" action="details" >
                            <input type="submit" value="Details">
                        </form>
                    </li>
                </ul>
            </div>
            <div class="kolom right">
                <div class="barKanan">
                    <form method="POST" action="logout">
                        <input type="submit" value="Log Out" class="logOut">
                    </form>
                </div>
                <form method="GET" action="profile">
                    <div class="uTopRight">
                        <div  >
                        <label for="mySubmit" class="usernameAK">
                                <i class="fa fa-user"></i>
                                <p class="usernameTR">
                                    <?php echo $_SESSION['username'];?>
                                </p>   
                        </label>
                        </div>   
                    </div>
                    <input id="mySubmit" type="submit" value="" style="visibility: hidden;">                    
                </form>
            </div>
        </div>
    </div>
    
    <?php echo $content ?>
    
    <div class="footer">
        <a href="company">
            About Us
        </a>
    </div>
</body>
<script type="text/javascript" src="view/script/script.js"></script>
</html>