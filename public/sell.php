<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("sell_form.php", ["title" => "Sell"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         // set transaction type
        $transaction = 'SELL';
        
        // apply function lookup
        $stock = lookup($_POST["symbol"]);
        
        // stock price
        $price = $stock["price"];
        
        // validate symbol
        if ($stock === false)
        {
            apologize("Invalid Stock Symbol");
        }
        
        // lookup user's shares of stock being sold
        $shares = query("SELECT shares FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
        
        // accessing amount of funds for user; associative array
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        // balance before purchase
        $current = $cash[0]["cash"];
        
        // shares being purchased
        $pShares = $_POST["amount"];
        
        // calculate total sale value (stock's price * shares)
        $value = $price * $pShares;
        
        // balance after sale
        $balance = $current + $value;
        
        // add the sale value to cash
        query("UPDATE users SET cash = ? WHERE id = ?", $balance, $_SESSION["id"]);
        
        // delete the stock from their portfolio 
        query("UPDATE portfolio SET shares = shares - ? WHERE id = ? AND symbol = ?", $pShares, $_SESSION["id"], $stock["symbol"]); 
        
        // delete stocks that have been depleted
        query("DELETE FROM portfolio WHERE id = ? AND shares = 0", $_SESSION["id"]);
        
        // update history
        query("INSERT INTO history (id, transaction, symbol, shares, price) VALUES (?, ?, ?, ?, ?)", $_SESSION["id"], $transaction, $_POST["symbol"], $shares[0]["shares"], $price);
        
        // redirect to successful sell form with variables
        render("sell.php", ["title" => "Success", "balance" => $balance, "name" => $stock["name"], "price" => $price, "symbol" => $stock["symbol"], "total" => $value, "shares" => $pShares]);
    }

?>
