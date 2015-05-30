<div class="container">
<div class="row">
<div class="span8">
    <ul  class="nav nav-pills">
        <li><a href="/"><span class="glyphicon glyphicon-stats"></span> <b>Portfolio</b></a></li>
        <li><a href="quote.php"><span class="glyphicon glyphicon-search"></span> <b>Quote</b></a></li>
        <li><a href="buy.php"><span class="glyphicon glyphicon-usd"></span> <b>Buy</b></a></li>
        <li><a href="sell.php"><span class="glyphicon glyphicon-briefcase"></span> <b>Sell</b></a></li>
        <li class="active"><a href="deposit.php"><span class="glyphicon glyphicon-transfer"></span> <b>Deposit</b></a></li>
        <li><a href="history.php"><span class="glyphicon glyphicon-search"></span> <b>History</b></a></li>
    </ul>
</div>
</div>
</div>
<br>
<form action="deposit.php" method="post">
    <fieldset>
        <div>
            <b>How much money would you like to deposit today?</b>
        <br>
        <br>
            <input autofocus class="form-control" name="deposit" placeholder="Deposit Amount" type="text"/>
        <br>
        <br>
            <button type="submit" class="btn btn-success">Deposit</button>
        </div>
    </fieldset>
</form>
<br>
<div>
    <a href="logout.php">Log Out</a>
</div>
