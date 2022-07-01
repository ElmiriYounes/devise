<?php
include_once('variables.php');
session_start();
if (isset($_SESSION['clicked'])) {
    // echo $_SESSION['clicked'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devise</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    * {
        box-sizing: border-box;
    }

    a {
        color: unset;
        text-decoration: none;
    }

    body {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: orangered;
        overflow: hidden;
        background-color: black;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0;
        /* <-- Apparently some margin are still there even though it's hidden */
    }

    input[type=number] {
        -moz-appearance: textfield;
        padding: 10px 0;
        text-align: center;
        /* Firefox */
    }

    form {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        border: 2px solid gray;
        width: 60%;
    }

    form>* {
        margin: 1rem 2rem;
    }

    .result {
        width: 60%;
        margin: 20px 0;
        text-align: center;
    }

    select {
        background-color: orange;
        border: none;
        color: white;
        padding: 10px 0;
        font-weight: bold;
        text-align: center;
    }

    #convert-btn {
        background-color: orangered;
        padding: 10px;
        border: none;
        cursor: pointer;
        color: white;
        letter-spacing: 2px;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <h1>Convertisseur de monnaies</h1>
    <form action="index.php" method="POST">
        <input type="number" name="money" step="any" placeholder="Monnaie locale" value=<?php if (isset($_POST['money'])) {
                                                                                            echo $_POST['money'];
                                                                                        } ?> />
        <select name="devise1">
            <option value="euro" <?php if ((isset($_POST['devise1']) && $_POST['devise1'] == "euro" && isset($_SESSION['clicked']))) {
                                        echo ' selected="selected"';
                                    } ?>>Euro (EUR)</option>
            <option value="dollar" <?php if (isset($_POST['devise1']) && $_POST['devise1'] == "dollar") {
                                        echo ' selected="selected"';
                                    } ?>>Dollar (USD)</option>
            <option value="yen" <?php if (isset($_POST['devise1']) && $_POST['devise1'] == "yen") {
                                    echo ' selected="selected"';
                                } ?>>
                Yen
                (JPY)</option>
            <option value="livre" <?php if (isset($_POST['devise1']) && $_POST['devise1'] == "livre") {
                                        echo ' selected="selected"';
                                    } ?>>Livre (GBP)</option>
            <option value="franc suisse" <?php if (isset($_POST['devise1']) && $_POST['devise1'] == "franc suisse") {
                                                echo ' selected="selected"';
                                            } ?>>Franc suisse (CHF)</option>
            <option value="dollar canadien" <?php if (isset($_POST['devise1']) && $_POST['devise1'] == "dollar canadien") {
                                                echo ' selected="selected"';
                                            } ?>>dollar canadien (CAD)</option>
            <option value="dirham" <?php if (isset($_POST['devise1']) && $_POST['devise1'] == "dirham") {
                                        echo ' selected="selected"';
                                    } ?>>Dirham (MAR)</option>
            <option value="yuan" <?php if (isset($_POST['devise1']) && $_POST['devise1'] == "yuan") {
                                        echo ' selected="selected"';
                                    } ?>>Yuan (CNY)</option>
            <option value="baht" <?php if (isset($_POST['devise1']) && $_POST['devise1'] == "baht") {
                                        echo ' selected="selected"';
                                    } ?>>Baht (THB)</option>
            <option value="rouble russe" <?php if (isset($_POST['devise1']) && $_POST['devise1'] == "rouble russe") {
                                                echo ' selected="selected"';
                                            } ?>>Rouble russe (RUB)</option>
        </select>
        <button onclick=<?php header('index.php');
                        if (isset($_SESSION['clicked'])) {
                            if ($_SESSION['clicked'] == 'true') {
                                $_SESSION['clicked'] = 'false';
                            } else {
                                $_SESSION['clicked'] = 'true';
                            }
                        } else {
                            $_SESSION['clicked'] = 'true';
                        }; ?>><i class="fa-solid fa-repeat"></i></button>
        <select name="devise2">
            <option value="euro" <?php if (isset($_POST['devise2']) && $_POST['devise2'] == "euro") {
                                        echo ' selected="selected"';
                                    } ?>>Euro (EUR)</option>
            <option value="dollar" <?php if (isset($_POST['devise2']) && $_POST['devise2'] == "dollar") {
                                        echo ' selected="selected"';
                                    } ?>>Dollar (USD)</option>
            <option value="yen" <?php if (isset($_POST['devise2']) && $_POST['devise2'] == "yen") {
                                    echo ' selected="selected"';
                                } ?>>
                Yen
                (JPY)</option>
            <option value="livre" <?php if (isset($_POST['devise2']) && $_POST['devise2'] == "livre") {
                                        echo ' selected="selected"';
                                    } ?>>Livre (GBP)</option>
            <option value="franc suisse" <?php if (isset($_POST['devise2']) && $_POST['devise2'] == "franc suisse") {
                                                echo ' selected="selected"';
                                            } ?>>Franc suisse (CHF)</option>
            <option value="dollar canadien" <?php if (isset($_POST['devise2']) && $_POST['devise2'] == "dollar canadien") {
                                                echo ' selected="selected"';
                                            } ?>>dollar canadien (CAD)</option>
            <option value="dirham" <?php if (isset($_POST['devise2']) && $_POST['devise2'] == "dirham") {
                                        echo ' selected="selected"';
                                    } ?>>Dirham (MAR)</option>
            <option value="yuan" <?php if (isset($_POST['devise2']) && $_POST['devise2'] == "yuan") {
                                        echo ' selected="selected"';
                                    } ?>>Yuan (CNY)</option>
            <option value="baht" <?php if (isset($_POST['devise2']) && $_POST['devise2'] == "baht") {
                                        echo ' selected="selected"';
                                    } ?>>Baht (THB)</option>
            <option value="rouble russe" <?php if (isset($_POST['devise2']) && $_POST['devise2'] == "rouble russe") {
                                                echo ' selected="selected"';
                                            } ?>>Rouble russe (RUB)</option>
        </select>
        <input id="convert-btn" type="submit" value="Convertir" />
    </form>
    <?php
    if (isset($_POST['money']) && $_POST['money'] != '') {
        $moneyToConvert = $devises[$_POST['devise1']][$_POST['devise2']] * $_POST['money'];
        echo "<div class='result'>
                <h1>" . $_POST['money'] . ' ' . $_POST['devise1'] . '(s)' . ' = ' . $moneyToConvert . ' ' . $_POST['devise2'] . '(s)' . "</h1>
                <h2>1 " . $_POST['devise1'] . " = " . $devises[$_POST['devise1']][$_POST['devise2']] . ' ' . $_POST['devise2'] . '(s)' . "</h2>
                <h2>1 " . $_POST['devise2'] . " = " . $devises[$_POST['devise2']][$_POST['devise1']] . ' ' . $_POST['devise1'] . '(s)' . "</h2>
            </div>";
    }
    ?>
</body>

</html>