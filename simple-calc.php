
<?php
$cookie_name1 = "num";
$cookie_name2 = "operation";

if (isset($_COOKIE[$cookie_name1])) {
    $num = $_COOKIE[$cookie_name1];
} else {
    $num = "";
}

if (isset($_POST['num'])) {
    $num .= $_POST['num'];
    setcookie($cookie_name1, $num, time() + (86400 * 30), "/");
} elseif (isset($_POST['operation'])) {
    if ($_POST['operation'] == 'C') {
        $num = "";
        setcookie($cookie_name1, $num, time() + (86400 * 30), "/");
        setcookie($cookie_name2, "", time() + (86400 * 30), "/");
    } elseif ($_POST['operation'] == '()') {
        // Check if the last character in the expression is a closing parenthesis
        $lastChar = substr($num, -1);
        if ($lastChar == ')') {
            // Append the clicked number within the parentheses
            $num = substr($num, 0, -1); // Remove the closing parenthesis
            $num .= $_POST['num']; // Append the number
            $num .= ')'; // Re-append the closing parenthesis
        } else {
            // Append an opening parenthesis followed by the clicked number and a closing parenthesis
            $num .= '(';
            $num .= $_POST['num'];
            $num .= ')';
        }
        // Update the 'num' cookie with the updated expression
        setcookie($cookie_name1, $num, time() + (86400 * 30), "/");
        // Update the 'operation' cookie to indicate the parentheses button was pressed
        setcookie($cookie_name2, $_POST['operation'], time() + (86400 * 30), "/");
    } 
    else {
        $num .= $_POST['operation'];
        setcookie($cookie_name1, $num, time() + (86400 * 30), "/");
        setcookie($cookie_name2, $_POST['operation'], time() + (86400 * 30), "/");
    }
}



if (isset($_POST['equal'])) {
    $num = eval('return ' . $num . ';');
    setcookie($cookie_name1, $num, time() + (86400 * 30), "/");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web calculator</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <div class="calc">
        <form action="" method="post">
            <br>
            <input type="text" class="txt_button" name="input" value="<?php echo htmlspecialchars($num); ?>"> <br> <br>
            <input type="submit" class="c" name="operation" value="C">
            <input type="submit" class="brace" name="operation" value="()">
            <input type="submit" class="percent" name="num" value="%">
            <input type="submit" class="calc_button" name="operation" value="/"><br>
            <input type="submit" class="num_button" name="num" value="7">
            <input type="submit" class="num_button" name="num" value="8">
            <input type="submit" class="num_button" name="num" value="9">
            <input type="submit" class="calc_button" name="operation" value="*"> <br>
            <input type="submit" class="num_button" name="num" value="4">
            <input type="submit" class="num_button" name="num" value="5">
            <input type="submit" class="num_button" name="num" value="6">
            <input type="submit" class="calc_button" name="operation" value="-"><br>
            <input type="submit" class="num_button" name="num" value="1">
            <input type="submit" class="num_button" name="num" value="2">
            <input type="submit" class="num_button" name="num" value="3">
            <input type="submit" class="calc_button" name="operation" value="+"><br>
            <input type="submit" class="del" name="num" value="d">
            <input type="submit" class="num_button" name="num" value="0">
            <input type="submit" class="stop" name="num" value=".">
            <input type="submit" class="equal" name="equal" value="=">
        </form>
    </div>
</body>

</html>