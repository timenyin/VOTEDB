<?php

session_start();

function ErrorMessage()
{
    if (isset($_SESSION["ErrorMessage"])) {
        $Output = "<div class= \"alert alert-danger alert_bad danger_bad\">";
        $Output .= htmlentities($_SESSION["ErrorMessage"]);
        $Output .= "</div>";
        $_SESSION["ErrorMessage"] = null;
        return $Output;
    }
}

function SuccessMessage()
{
    if (isset($_SESSION["SuccessMessage"])) {
        $Output = "<div class= \"alert alert-success alert_gud success_gud\">";
        $Output .= htmlentities($_SESSION["SuccessMessage"]);
        $Output .= "</div>";
        $_SESSION["SuccessMessage"] = null;
        return $Output;
    }
}
