<div class="rowB">
    <div class="kolomB left"></div>
    <div class="kolomB mid">
        <p class="midJudulB">Result</p>
        <div class="dBox">
            <p class="dJud">Possible Diseases:</p><br>
            <br>
            <div class="currentS" style="text-align:left">
            <ul>
                <?php
                    //print_r($diseases);
                    echo "<div class='listing'>";
                    echo "<ul>";
                    foreach($diseases as $row){
                        echo 
                            "
                            <li>
                                <div class='listBlock'>
                                    <img src='view/bullet/bullet2.png' alt='tes' style='width:10%;height:auto;'>
                                
                            "
                            .$row."
                               </div>
                            </li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                ?>

            </ul>
            </div>              
        </div>
    </div>
</div>