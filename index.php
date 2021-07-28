<?php
$test= 'test';

function calculatePrice (){
    $rate = (float)$_POST["rate"];
    $price = (float)$_POST["price"];
    if (($rate == 0)){
        return '<p class="warning">Attention! Rate can not be 0</p>';
    }
    if (($price == 0) || ($price <= 0)) {
        return '<p class="warning">Please check the price of your cocktail</p>';
    }

    $calculatedPrice = (round($price/$rate, 2));
    return '<p class="calulated-price"> The price of your cocktail is ' .$calculatedPrice .' euro';
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
                <label for="rate">Enter local rate: </label>
                <input type='text' id="rate" name="rate">
            </div>
            <div class="form-group">
                <label for="price">Enter the price of cocktail in local currency: </label>
                <input type='text' id="price" name="price">
            </div>

            <div class="form-group">
                <button type="submit">Calulate the price</button>
            </div>

        </form>
        <?php
        echo calculatePrice ();
        ?>
    </div>

</div>

</body>
</html>


