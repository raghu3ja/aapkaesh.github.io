<?php  
session_start();
error_reporting(0);
// include 'includes/conn.php';
// $csd=$_SESSION['shop_uniq'];
if(isset($_POST['method']) && isset($_POST['id']))
{
    $cart_session = $_SESSION["cart"];
    // if(!isset($cart_session['total_amt']))
    //     $cart_session['total_amt'] = 0;
       
    //array([32] => ['name' => 'Name', 'qty' => 2, 'amount' => 100], [33] => ['name' => 'Name1', 'qty' => 1, 'amount' => 10])
    $pid = $_POST['id'];
    if($_POST['method']=='add') {
        $qty = $_POST['qty'];
        // $amount = $_POST['price'];
        // $name = $_POST['name'];
        
        
        if(isset($cart_session[$pid])) {
            $cart_session[$pid]['qty']+=$qty;
        } else {
            $cart_session[$pid] = ['id' => $pid ,'qty' => $qty];
        }
        //$cart_session['total_amt'] += ($qty*$amount);
      
      //  echo $url_id;
        
    } else if($_POST['method']=='remove' && isset($cart_session[$pid])) {
        //$cart_session['total_amt'] -= ($cart_session[$pid]['qty']*$cart_session[$pid]['price']);
        unset($cart_session[$pid]);
    } else if($_POST['method']=='update' && isset($cart_session[$pid]) && isset($_POST['action'])) {
        if(($_POST['action'])==0){
            if($cart_session[$pid]['qty']==1){
                //$cart_session['total_amt'] -= ($cart_session[$pid]['qty']*$cart_session[$pid]['price']);
                unset($cart_session[$pid]);
            } else {
                $cart_session[$pid]['qty']-=1;
                //$cart_session['total_amt'] -= (1*$cart_session[$pid]['price']);
            }
        }else{
            $cart_session[$pid]['qty']+=1;
            //$cart_session['total_amt'] += (1*$cart_session[$pid]['price']);

        }
    }
    // $cart_session['demo_id']  = $url_id;
    $_SESSION["cart"] = $cart_session;
}
// print_r( $_SESSION["cart"]['id']);
?>