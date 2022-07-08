<?php
include_once 'variables.php';
include_once 'functions.php';

if (isset($_POST['switched'])) {
    $temp = $_POST['devise1'];
    $_POST['devise1'] = $_POST['devise2'];
    $_POST['devise2'] = $temp;
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
        padding: 0;
        margin: 0;
    }

    a {
        color: unset;
        text-decoration: none;
    }

    body {
        width: 100%;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        background: url('bg.png') no-repeat;
        background-position: center;
        background-size: cover;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
        padding: 10px 0;
        text-align: center;
    }

    form {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        padding: 20px 10px;
        border: 2px solid gray;
        width: 60%;
        margin: 10px 0;
        background-color: rgb(0, 0, 0, 0.8);
    }

    .inputs {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .inputs>* {
        margin: 1rem 2rem;
    }

    .result {
        width: 100%;
        margin: 20px 0;
        text-align: center;
    }


    .result>* {
        padding: 10px 0;
        border-top: 1px solid rgb(223, 119, 0);
    }

    .result>*:last-child {
        padding-bottom: 0;
    }

    select {
        background-color: rgb(235, 70, 3);
        border: none;
        color: white;
        padding: 10px 0;
        font-weight: bold;
        text-align: center;
    }

    #convert-btn {
        background-color: rgb(223, 119, 0);
        padding: 10px;
        border: none;
        cursor: pointer;
        color: white;
        letter-spacing: 2px;
        font-weight: bold;
    }

    @media only screen and (max-width: 1572px) {
        form {
            width: 90%;
        }
    }

    @media only screen and (max-width: 1080px) {
        .inputs {
            flex-direction: column;
        }
    }

    @media only screen and (max-width: 480px) {

        form h1 {
            font-size: 1.5rem;
            text-align: center;
        }

        .inputs>input,
        .inputs>select {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <form action="index.php" method="POST">
        <h1>Convertisseur de monnaies</h1>
        <div class="inputs">
            <input type="number" name="money" step="any" placeholder="Monnaie locale" required value=<?php if (isset($_POST['money'])) {
                                                                                                            echo $_POST['money'];
                                                                                                        } ?> />
            <select name="devise1">
                <option value="euro" <?php if ((isset($_POST['devise1']) && $_POST['devise1'] == "euro") || (isset($_GET['switched']) && $_GET['switched'] == 'false')) {
                                            echo ' selected="selected"';
                                        } ?>>Euro (EUR)</option>
                <option value="dollar" <?php if (isset($_POST['devise1']) && $_POST['devise1'] == "dollar" || (isset($_GET['switched']) && $_GET['switched'] == 'false')) {
                                            echo ' selected="selected"';
                                        } ?>>Dollar (USD)</option>
                <option value="yen" <?php if ((isset($_POST['devise1']) && $_POST['devise1'] == "yen" || (isset($_GET['switched']) && $_GET['switched'] == 'false'))) {
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

            <button name="switched"><i class="fa-solid fa-repeat"></i></button>
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
        </div>
        <?php
        if (isset($_POST['money']) && $_POST['money'] != '') {
            if ($_POST['money'] > 0) {
                if ($_POST['devise1'] != $_POST['devise2']) {
                    $moneyToConvert = $devises[$_POST['devise1']][$_POST['devise2']] * $_POST['money'];
                    echo "<div class='result'>
                    <h1>" . $_POST['money'] . ' ' . $_POST['devise1'] . '(s)' . ' = ' . $moneyToConvert . ' ' . $_POST['devise2'] . '(s)' . "</h1>
                    <h2>1 " . $_POST['devise1'] . " = " . $devises[$_POST['devise1']][$_POST['devise2']] . ' ' . $_POST['devise2'] . '(s)' . "</h2>
                    <h2>1 " . $_POST['devise2'] . " = " . $devises[$_POST['devise2']][$_POST['devise1']] . ' ' . $_POST['devise1'] . '(s)' . "</h2>
                    </div>";
                } else {
                    echo '<h1>Sélectionnez 2 devises différentes !</h1>';
                }
            } else {
                echo '<h1>Entrez un nombre strictement positif !</h1>';
            }
        }
        ?>
    </form>
</body>

</html>