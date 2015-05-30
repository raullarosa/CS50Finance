<?php

    // configuration
    require("../includes/config.php"); 
    
    $rows = query("SELECT * FROM portfolio WHERE id = ?", $_SESSION["id"]);
    
    
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"]
            ];
        }
    }
    
    
    
    // render portfolio
    render("portfolio.php", ["title" => "Portfolio", "positions" => $positions]);

?>
