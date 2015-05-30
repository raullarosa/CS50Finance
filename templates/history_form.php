<div class="container">
<div class="row">
<div class="span8">
    <ul  class="nav nav-pills">
        <li><a href="/"><span class="glyphicon glyphicon-stats"></span> <b>Portfolio</b></a></li>
        <li><a href="quote.php"><span class="glyphicon glyphicon-search"></span> <b>Quote</b></a></li>
        <li><a href="buy.php"><span class="glyphicon glyphicon-usd"></span> <b>Buy</b></a></li>
        <li><a href="sell.php"><span class="glyphicon glyphicon-briefcase"></span> <b>Sell</b></a></li>
        <li><a href="deposit.php"><span class="glyphicon glyphicon-transfer"></span> <b>Deposit</b></a></li>
        <li class="active"><a href="history.php"><span class="glyphicon glyphicon-search"></span> <b>History</b></a></li>
    </ul>
</div>
</div>
</div>
<br>
<table class="table table-hover">

    <thead>
        <tr>
            <th>Transaction Type</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>


    <tbody>
    <?php
	    foreach ($table as $row)	
        {   
            echo("<tr>");
            echo("<td>" . $row["transaction"] . "</td>");
            echo("<td>" . date('d/m/y, g:i A',strtotime($row["time"])) . "</td>");
            echo("<td>" . $row["symbol"] . "</td>");
            echo("<td>" . $row["shares"] . "</td>");
            echo("<td>$" . number_format($row["prices"], 2) . "</td>");
            echo("</tr>");
        }
    ?>

    </tbody>
    
</table>
