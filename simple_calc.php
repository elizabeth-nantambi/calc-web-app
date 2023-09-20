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
