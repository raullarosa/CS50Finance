<!DOCTYPE html>

<html>

    <head>

        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/css/bootstrap-theme.min.css" rel="stylesheet"/>
        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>
        
        <?php
        // query cash
        $cash =	query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        $balance = $cash[0]["cash"];	
        
        //query username
        $username = query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
        $name = $username[0]["username"];
        
        ?>

        <script src="/js/jquery-1.11.1.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>
        
        <style type="text/css">  
            .center-block {  
                width:2000px;  
                padding:10px;  
                background-color:#ffffff;  
                color:#ffffff  
            }  
        </style> 
        
    </head>

    <body>

        <div class="container">
             <div align="right">
                Hi, <?= $name?>!
                <br>
                Cash Available: $<?=number_format($balance, 2)?>
                <br>
                <a href="logout.php">Log Out</a>
                        }
                    
            </div>
            <div id="top">
                <a href="/"><img alt="C$50 Finance" src="/img/logo.gif"/></a>
            </div>
           
            <div id="middle">
