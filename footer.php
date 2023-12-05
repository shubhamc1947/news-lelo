<?php

$sqlsettings="select * from settings";
$ressettings=mysqli_query($conn,$sqlsettings) or die("did not get the settings value");
$rowsettings=mysqli_fetch_assoc($ressettings);

?>
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span><?php echo $rowsettings['footer'];?></span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
