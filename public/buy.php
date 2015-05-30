<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("buy_form.php", ["title" => "Buy"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // set transaction type
        $transaction = 'BUY';
        
        // apply function lookup
        $stock = lookup($_POST["symbol"]);
        
        // validate stock symbol
        if ($stock === false)
        {
            apologize("Invalid Stock Symbol");
        }
        
        // accessing amount of funds for user; associative array
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        // desired puchase amount
        $purchase = $_POST["amount"]*$stock["price"];
        
        // balance before purchase
        $current = (int)$cash[0]["cash"];
        
        // balance after purchase
        $balance = $current - $purchase;
        
        // validating if user has sufficient funds
        if ($balance < 0)
        {
            apologize("You have insufficient funds. Try raising more capital or reframe from overspending.");
        }
        
        // decrease cash
        query("UPDATE users SET cash = cash - ? WHERE id = ?", $purchase, $_SESSION["id"]);
        
        // add purchase to portfolio
        query("INSERT INTO portfolio (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)",  $_SESSION["id"], $stock["symbol"], $_POST["amount"]);
        
        // update history
        query("INSERT INTO history (id, transaction, symbol, shares, prices) VALUES (?, ?, ?, ?, ?)", $_SESSION["id"], $transaction, $_POST["symbol"], $_POST["amount"], $stock["price"]);
 
        // redirect to successful buy form with variables
        render("buy.php", ["title" => "Success", "balance" => $balance, "name" => $stock["name"], "price" => $stock["price"], "symbol" => $stock["symbol"], "total" => $_POST["amount"]*$stock["price"], "shares" => $_POST["amount"]]);
    }

?>
