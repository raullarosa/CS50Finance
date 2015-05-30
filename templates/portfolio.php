<div class="container">
<div class="row">
<div class="span8">
    <ul  class="nav nav-pills">
        <li class="active"><a href="/"><span class="glyphicon glyphicon-stats"></span> <b>Portfolio</b></a></li>
        <li><a href="quote.php"><span class="glyphicon glyphicon-search"></span> <b>Quote</b></a></li>
        <li><a href="buy.php"><span class="glyphicon glyphicon-usd"></span> <b>Buy</b></a></li>
        <li><a href="sell.php"><span class="glyphicon glyphicon-briefcase"></span> <b>Sell</b></a></li>
        <li><a href="deposit.php"><span class="glyphicon glyphicon-transfer"></span> <b>Deposit</b></a></li>
        <li><a href="history.php"><span class="glyphicon glyphicon-search"></span> <b>History</b></a></li>
    </ul>
</div>
</div>
</div>
<br>
<div class="container">
    <table class="table table-hover">
    <tr>
        <td><b>Stock's Symbol</b></td>
        <td><b>Amount of Shares</b></td>
        <td><b>Price (per share)</b></td>
        <td><b>Total Amount</b></td>
    </tr>
    <?php foreach ($positions as $position): ?>
    
    <tr>
        <td><?= $position["symbol"] ?></td>
        <td><?= $position["shares"] ?></td>
        <td>$ <?= number_format($position["price"], 2) ?></td>
        <td>$ <?= number_format($position["price"]*$position["shares"], 2) ?></td>
    </tr>

    <?php endforeach ?>
    </table>
</div>
