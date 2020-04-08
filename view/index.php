<div class="row">
    <div class="column left"></div>
    <div class="column mid">
        <p class="midJudul">
        WELCOME,
        <?php echo $_SESSION['name']?>
        !
        </p>
        <p class="midBody">
            Feeling unwell or sick? Congrats, you just visited
            the right website. This website is designed for
            diagnosing diseases that you may carry based on
            the symptomps you are having.     
        </p>
        <div class ="buttonWrapper">
            <form method="GET" action="diagnose">
                <input type="submit" class="startD" value="Start Diagnosis">
            </form>
            <p class="or">OR</p>
            <form method="GET" action="history">
                <input type="submit" class="startD" value="Check Past Diagnosis">
            </form>
        </div>
    </div>
    <div class="column right"></div>
</div>