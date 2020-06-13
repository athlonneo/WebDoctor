<div class="rowB">
    <div class="kolomB left"></div>
    <div class="kolomB mid">
        <p class="midJudulB">Diseases</p>
        <div class="dBox">             
            <p class="dJud">Click to see details</p><br><br>
                <div class="currentS">
                    <div class="tengahCek" style="margin-left: -15%"> 
                        <ul>
                            <?php
                                echo "<ul>";
                                foreach($diseases as $key => $row){
                                    echo 
                                        "
                                        <li>
                                        <a href='disease?id=".$row['idD']."'>
                                        ".$row['name']."
                                        </a>
                                        </li>";
                                }
                                echo "</ul>";
                            ?>
                        </ul>
                    </div>     
                </div>
        </div>
    </div>    
    <div class="kolomB right"></div>
</div>



