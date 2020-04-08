<div class="rowD">
    <div class="kolomE left"></div>
    <div class="kolomE mid">
        <p class="eMidJudul">History</p>
        <div class="eBox">       
            <form action="history" method="POST" id="dateform">
                <p>Start Date</p>
                <input type="date" name="startDate">
                <p>End Date</p>
                <input type="date" name="endDate">
                <input type="submit" value="Go">
            </form><br><br>
            
            <div class="eCurrentS">
                <div class="rowF">
                    <div class="kolomF left listing">
                    <?php
                    if(ISSET($symptoms)){
                        echo "<div class='w2'><p class='judulS1'>Symptoms</p></div>";
                        echo "<ul>";
                        foreach($symptoms as $key => $row){
                            echo 
                            "
                            <li>
                                <div class='listBlock'>
                                    <img src='view/bullet/bullet2.png' alt='tes' style='width:10%;height:auto;'>
                                
                            "
                            .$row['name']."
                               </div>
                            </li>";
                        }
                        echo"</ul>";
                    }
                    ?>
                    </div>
                    <div class="kolomF mid"></div>
                    <div class="kolomF right listing">
                        <?php
                        if(ISSET($diseases)){
                            echo "<div class='w2'><p class='judulS1'>Possible Diseases</p></div>";
                        echo "<ul>";
                        foreach($diseases as $key => $row){
                            echo 
                            "
                            <li>
                                <div class='listBlock'>
                                    <img src='view/bullet/bullet2.png' alt='tes' style='width:10%;height:auto;'>
                                
                            "
                            .$row['name']."
                               </div>
                            </li>";
                        }
                        echo"</ul>";
                        }
                        ?>
                    </div>
                </div>
            </div>              
        </div>
    </div>
    <div class="kolomE right"></div>
</div>
