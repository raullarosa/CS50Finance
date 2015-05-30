<?php
    // email subscription
    
    // configuration
    require("../includes/config.php");
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("workhub_form.php", ["title" => "WorkHub"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["email"]))
        {
            apologize("You must provide your e-mail.");
        }
        // if validations pass then do the following
        // query database for subscriber
        $rows = query("INSERT INTO subscribers (id, email) VALUES(?, ?)", $_POST["id"], $_POST["email"]);
        
        // redirect to portfolio
        redirect("/");
    }
?>
