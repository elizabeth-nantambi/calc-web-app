<?php
$cookie_name1="num";
$cookie_value1="";
$cookie_name2="operation";
$cookie_value2="";

if(isset($_POST['num']))
{
    $num=$_POST['input'].$_POST['num'] ;
}
else{
    $num="";
}
if(isset($_POST['operation']))
{
    $cookie_value1=$_POST['input'];
    setcookie($cookie_name1,$cookie_value1,time()+(86400*30), "/");
    
    $cookie_value2 = $_POST['operation'];
    setcookie($cookie_name2,$cookie_value2,time()+(86400*30), "/");
    $num="";

}
if(isset($_POST['equal']))
{
   $num=$_POST['input'];
   switch($_COOKIE['operation']){
    case "+":
        $result=$_COOKIE['num']+$num;
        break;
        case "-":
            $result=$_COOKIE['num']-$num;
            break;
            case "*":
                $result=$_COOKIE['num']*$num;
                break;
                case "/":
                    $result=$_COOKIE['num']/$num;
                    break;      
   }
   $num=$result;
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web calculator</title> 
    <link rel="stylesheet" type="text/css" href="simple.css">
</head>
<body>
   
    <div class="calc">
    <form action="" method="post">
    <br>
    <input type="text" class="txt_button" name="input" value=" <?php echo @$num; ?>" > <br> <br>
    

    <input type="submit" class="c" name="operation"  value="C">
    <input type="submit" class="brace" name="operation"  value="()">
    <input type="submit" class="percent" name="num"  value="%">
    <input type="submit" class="calc_button" name="operation" value="/"><br>
    <input type="submit" class="num_button" name="num" value="7">
    <input type="submit" class="num_button" name="num" value="8">
    <input type="submit" class="num_button" name="num" value="9">
    <input type="submit" class="calc_button" name="operation" value="*"> <br>
    <input type="submit" class="num_button" name="num" value= "4">
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
    <input type="submit" class="equal" name="operation" value="=">
    </form>
</div>
</body>
</html>