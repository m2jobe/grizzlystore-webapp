<?php
require_once('stripe/init.php');

$stripe = array(
  "secret_key"      => "sk_test_qP7S4WxR7ug7fpBhGnfFyewc",
  "publishable_key" => "pk_test_f2bzKl91rUbufV5pInrv9XBY"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>