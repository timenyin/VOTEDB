<!-- --- create sessions for the page ---- -->
<?php
require_once("includes/db.php");
function Redirect_to($New_Location)
{
    header("Location:" . $New_Location);

    exit();
};
