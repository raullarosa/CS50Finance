<div class="container">
<div class="row">
<div class="center-block">
<div class="span8">
    <ul  class="nav nav-pills">
        <li><a href="/"><span class="glyphicon glyphicon-stats"></span> <b>Portfolio</b></a></li>
        <li><a href="quote.php"><span class="glyphicon glyphicon-search"></span> <b>Quote</b></a></li>
        <li class="active"><a href="buy.php"><span class="glyphicon glyphicon-usd"></span> <b>Buy</b></a></li>
        <li><a href="sell.php"><span class="glyphicon glyphicon-briefcase"></span> <b>Sell</b></a></li>
        <li><a href="deposit.php"><span class="glyphicon glyphicon-transfer"></span> <b>Deposit</b></a></li>
        <li><a href="history.php"><span class="glyphicon glyphicon-search"></span> <b>History</b></a></li>
    </ul>
</div>
</div>
</div>
</div>
<br>
<form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="symbol" placeholder="Stock's Symbol" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="amount" placeholder="Amount of Shares" type="number" min="1"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Buy</button>
        </div>
    </fieldset>
</form>
