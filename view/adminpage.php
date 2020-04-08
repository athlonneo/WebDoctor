<?php
    if ( isset( $_SESSION['isAdmin'])!=1 ) {
        header("Location: profile");
    }
?>

<div id="divprofile" style="height:800px">
    <h1>Admin Page</h1>
    <fieldset>
        <legend>Add Symptom</legend>
        <form action="newSymptom" method="POST">
            <input type="text" name="symptom" required>
            <input type="submit" value="Add Symptom">
        </form>
    </fieldset>
    <fieldset>
        <legend>Add Disease</legend>
        <form action="newDisease" method="POST">
            <input type="text" name="disease" required>
            <input type="submit" value="Add Disease">
        </form>
    </fieldset>
    <br>

    <fieldset>
        <legend>Delete Symptom</legend>
        <form action="delSymptom" method="POST">
            <select name="symptom">
                <?php
                    foreach($symptoms as $key => $row){
                        echo "<option value='".$row['idS']."'>";
                        echo $row['name'];
                        echo "</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Delete Symptom">
        </form>
    </fieldset>
    <fieldset>
        <legend>Delete Disease</legend>
        <form action="delDisease" method="POST">
            <select name="disease">
                <?php
                    foreach($diseases as $key => $row){
                        echo "<option value='".$row['idD']."'>";
                        echo $row['name'];
                        echo "</option>";
                    }
                ?>
            </select>
            <input type="submit" value="Delete Disease">
        </form>
    </fieldset>
    <br>

    <fieldset>
        <legend>Link Disease and Symptom</legend>
        <form action="linkDS" method="POST">
            <select name="disease">
                <?php
                    foreach($diseases as $key => $row){
                        echo "<option value='".$row['idD']."'>";
                        echo $row['name'];
                        echo "</option>";
                    }
                ?>
            </select><br>
            <select name="symptom">
                <?php
                    foreach($symptoms as $key => $row){
                        echo "<option value='".$row['idS']."'>";
                        echo $row['name'];
                        echo "</option>";
                    }
                ?>
            </select><br><br>
            <input type="submit" value="Add">
        </form>
    </fieldset>
    <fieldset>
        <legend>Separate Disease and Symptom</legend>
        <form action="delDS" method="POST">
            <select name="disease">
                <?php
                    foreach($diseases as $key => $row){
                        echo "<option value='".$row['idD']."'>";
                        echo $row['name'];
                        echo "</option>";
                    }
                ?>
            </select><br>
            <select name="symptom">
                <?php
                    foreach($symptoms as $key => $row){
                        echo "<option value='".$row['idS']."'>";
                        echo $row['name'];
                        echo "</option>";
                    }
                ?>
            </select><br><br>
            <input type="submit" value="Delete">
        </form>
    </fieldset><br>
    <button><a href="account">Accounts</a></button>
    <button><a href="report">Show Report</a></button>
<div>