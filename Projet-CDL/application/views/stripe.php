<?php
require_once('/vendor/stripe/stripe-php/init.php');
\Stripe\Stripe::setApiKey('sk_test_51JHpHoG89vko2fx6LOAAOiW6g8NBU4dfXh8QbKULTHMs8b7UJwDQXkkS18RsyTk8JJ5mS3bP3KQ3WZ41Bz51YfWC00nEi4ookx');
$session =\Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'eur',
      'product_data' => [
        'name' => 'Don',
      ],
      'unit_amount' => 2000,
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => 'https://example.com/success',
  'cancel_url' => 'https://example.com/cancel',
  ]);
?>
<html>
<head>
  <title>buy cool new product</title>
  <script src="https://js.stripe.com/v3/"></script>
</head>
<body>
  <button id="checkout-button">Checkout</button>
  <script>
    var stripe = Stripe('pk_test_51JHpHoG89vko2fx6HqUIn0ktlO2HJJPYj97tiI8Fww881IVfrX9KzXVa9xc4UjijCuDQg2DfwJa31XPGJx1cA3rj00cKqQiClC');
    const btn = document.getElementById("checkout-button")
    btn.addEventListener('click', function(e){
      e.preventDefault();
    stripe.redirectToCheckout({
      sessionId:"<?php echo $session->id; ?>"
    });
    });
  </script>
</body>
</html>