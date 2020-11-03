<?php

/* redirect use to a location */
function Redirect($new_location)
{
    header("Location:" . $new_location);
    exit;
}


/* session messages */

//errors
function ErrorMessage()
{
    if (isset($_SESSION['ErrorMessage'])) {
        $output = "<div class=\"alert alert-danger p-1\">";
        $output .= htmlentities($_SESSION['ErrorMessage']);
        $output .= "</div>";

        $_SESSION['ErrorMessage'] = null;

        return $output;
    }
}


//success
function SuccessMessage()
{
    if (isset($_SESSION['SuccessMessage'])) {
        $output = "<div class=\"alert alert-success p-1\">";
        $output .= htmlentities($_SESSION['SuccessMessage']);
        $output .= "</div>";

        $_SESSION['SuccessMessage'] = null;
        return $output;
    }
}


function Confirm_Login()
{
    if (isset($_SESSION['user'])) {
        return;
    } else {
        Redirect('index.php?Login=login required !');
    }
}
