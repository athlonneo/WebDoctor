
<div class="judulGWrapper">
<p class="judulG">Registered Accounts</p>
</div>
<br>
<div id="accfilt">
    <form action="account" method="POST">
        <input type="text" name="filter">
        <input type="submit" value="Search">
    </form>
</div>
<div class="tableWrapper">
    <table class="reportT">
        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Birth Date</th>
            <th>City</th>
            <th>Delete</th>
        <tr>
        <?php
            //print_r($accounts);
            foreach($accounts as $key=>$row){
                echo "<tr>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['uname']."</td>";
                echo "<td>".$row['birth_date']."</td>";
                echo "<td>".$row['cname']."</td>";
                echo "<td>";
                echo'
                <form action="deleteUser" method="POST">
                    <input type="hidden" name="delName" value="'.$row['username'].'">
                    <input type="submit" value="Delete">
                </form>';
                echo "</td>";
                echo "<tr>";
            }
        ?>
    </table>
    <br>
</div>