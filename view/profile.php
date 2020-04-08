<div id="divprofile">
    <?php
        echo "<img src='view/img/".$info[0]['image']."'><br>";
    ?>
    
    <?php
    if($info[0]['image']=="placeholder.png"){
        echo'
        <form action="upload" method="POST" enctype="multipart/form-data">
            <input type="file" name="fileUpload">
            <input type="submit" value="Upload Image">
        </form>';
    }
    else{
        echo'
        <form action="delete" method="POST">
            <input type="submit" value="Reset Image">
        </form>';
    }
    ?>

    <?php
        echo "<p>Name:</><br>";
        echo $_SESSION['name'];
        echo "<p>Birth Date:</><br>";
        $date = DateTime::createFromFormat('Y-m-d',$info[0]['birth_date'])->format('d F Y');
        echo $date;
        echo "<p>City:</><br>";
        echo $info[0]['name'];
    ?>

    <br><br>
    <form action="changepass" method="GET">
        <input type="submit" value="Change Password">
    </form>

    <?php
        if ($_SESSION['isAdmin'] == 1){
            echo'
            <br>
            <form action="adminpage" method="GET">
                <input type="submit" value="Admin Page">
            </form>';
        }
    ?>
</div>