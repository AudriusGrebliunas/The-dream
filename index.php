<?php

error_reporting(0);


$firstValue = false;
$json = file_get_contents('https://www.alphavantage.co/query?function=SUGAR&interval=monthly&apikey=demo');
$data = json_decode($json, true);
if (!($data['data'][0]['value'])) {
    //echo "Our API is unavailable. Please try again later";
} else {
    $firstValue = $data['data'][0]['value'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vina+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <form action="index.php" method="POST">
        <div id="content" style="height: 100%;">
            <div id="Currency">
                <p class="currency">Dollar:</p>
                <input type="number" name="currency" id="" class="currencyInput" placeholder="<?php if (isset($_POST['currency'])){
                    echo $_POST['currency'];
                }
                else{
                    echo "...";
                } ?>">
            </div>

            <div id="Sugar">
                <p style="font-size: 37.64px; justify-self: center; margin-top: 20px;">Sugar:</p>
                <p style="font-size: 66.59px; justify-self: center;">


                    <?php $user_value; ?>
                    <?php

                    if (isset($_POST['currency']) && $firstValue != false) {


                        $sugarAmount = ((1 / $firstValue) * $_POST['currency'] * 100) * 453.59237;

                        // echo round($sugarAmount) . " grams";
                        // $user_value = $user_value.''.$user_
                        echo round($sugarAmount);
                    } else {
                        echo "...";
                    }

                    ?>




                    <span style="color: #FB9092; font-size: 37.64px;">g</span>
                </p>
                <span style= "align-self: center; justify-self: center">
                    <?php echo "The current price is " . round($firstValue) . " cents for a pound of sugar"; ?>
                </span>

            </div>
        </div>
        <input type="submit" value="" class="submitForm">
        <object data="download.svg" width="40px" height="40px"></object>
    </form>



</head>

<body>

</body>

</html>