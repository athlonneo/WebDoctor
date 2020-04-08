<div id="divmainR">
    <p>Register</p>
    <div id="divinner">
        <form method="POST" action="register">
            <p>Username</p>
            <input name="username" type="text" required>
            <p>Password</p>
            <input name="password" type="password" required>
            <p>Confirm Password</p>
            <input name="confirmpass" type="password" required>
            <br><br>
            <p>Name</p>
            <input name="name" type="text" required>
            <p>Date of Birth</p>
            <input name="dob" type="date" required>
            <p>City</p>
            <select name="city">
                <?php
                    foreach($cities as $key => $row){
                        echo "<option value='".$row['idC']."'>";
                        echo $row['name'];
                        echo "</option>";
                    }
                ?>
            </select>
            <br><br><br>
            <input type="submit" value="Register">
        </form>
</div>
