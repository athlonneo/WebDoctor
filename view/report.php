
<div class="judulGWrapper">
<p class="judulG">User Count in Each City</p>
</div>

<div class="tableWrapper">
    <table class="reportT">
        <tr>
            <th>City</th>
            <th>User Count</th>
        <tr>
        <?php
            //print_r($report);
            foreach($report as $key=>$row){
                echo "<tr>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['jumlah']."</td>";
                echo "<tr>";
            }
        ?>
    </table>
    <br>
    <button><a href="pdf">Create PDF</a></button>
</div>