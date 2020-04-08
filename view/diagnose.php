<div class="rowB">
    <div class="kolomB left"></div>
    <div class="kolomB mid">
        <p class="midJudulB">Diagnosing</p>
        <div class="dBox">            
            <p class="dJud">CHOOSE SYMPTOMS</p><br><br>
            <div class="currentS">
                <div class="tengahCek">   
                    <form action="result" method="POST">
                        <?php                   
                            foreach($symptoms as $key => $row){
                                echo "<input type='checkbox' name='symptoms[]' value='".$row['idS']."'>".$row['name']."<br>";
                            }
                        ?>
                        <div class="diWrapper">
                            <input id="diagnosePrimary" type="submit" value="Diagnose" style="visibility:hidden">  
                        </div>              
                    </form>
                </div>     
            </div>
            <input 
                type="button" 
                id="secondaryButton" 
                onclick="document.getElementById('diagnosePrimary').click()"/
                value="Diagnose"
            >
        </div>
    </div>    
    <div class="kolomB right"></div>
</div>

