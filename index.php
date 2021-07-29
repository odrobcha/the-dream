<?php

function calculatePrice (){
    if(empty($_POST)){
        return '';
    }

    $from = $_POST["from"];
    $to = $_POST["to"];

    $price = (float)$_POST["price"];

    if ($from == ''){
        return '<p class="warning">Please, enter the currency</p>';
    }

    if (($price == 0) || ($price <= 0)) {
        return '<p class="warning">Please check the the entered amount</p>';
    }
    $rate = 1;
    if ($to == $from){
        $rate = 1;
    }
    if (($from=='eur') && ($to == 'usd')){
        $rate = 1.19;
    }
    if (($from=='eur') && ($to == 'uah')){
        $rate = 31.37;
    }
    if (($from=='usd') && ($to == 'eur')){
        $rate = 0.84;
    }
    if (($from=='usd') && ($to == 'uah')){
        $rate = 26.77;
    }
    if (($from=='uah') && ($to == 'eur')){
        $rate = 0.032;
    }
    if (($from=='uah') && ($to == 'usd')){
        $rate = 0.037;
    }

    $calculatedPrice = (round($price/$rate, 2));
    return '<p class="calulated-price"> You wil get ' .$calculatedPrice .' '.$from ;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Dream</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <div class="container-inner">
        <form action="" method="post">
            <div class="form-group">
                <label for="currency">Chose your local currency: </label>
                <select  id="currency" name="from">
                    <option value="eur">EUR</option>
                    <option value="usd">USD</option>
                    <option value="uah">UAH</option>
                </select>
            </div>
            <div class="form-group">
                <label for="currency">Chose your desired currency: </label>
                <select  id="currency" name="to">
                    <option value="eur">EUR</option>
                    <option value="usd">USD</option>
                    <option value="uh">UH</option>
                </select>
            </div>

            <div class="form-group">
                <label for="price">Enter the amount in local currency: </label>
                <input type='text' id="price" name="price">
            </div>

            <div class="form-group">
                <button type="submit">Calculate the price</button>
            </div>

        </form>
        <?php
            echo calculatePrice ();
        ?>
    </div>

</div>

</body>
</html>


