@extends('app');

@section('content');

<form action="/create_payment" data-bitcoin="true" method="POST">
    <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
            data-image="/square-image.png"
            data-name="Demo Site"
            data-description="2 widgets ($20.00)"
            data-amount="2000"
            data-currency="usd"
            data-bitcoin="true">
    </script>
</form>
   @endsection
