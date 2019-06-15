@php($lang = \Illuminate\Support\Facades\Session::get('language'))
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Event Checkout | Xi-Spain</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/bootstrapv3.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/agency.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!--favicon-->
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/png" sizes="16x16">

    <style>
        #checkout-container{padding: 60px 0; text-align: center;}
        .event-panel{margin-top: 60px; position: relative;}
        .event-panel>.img-container{align-self: center;}
        .btn-pay{padding: 10px 15px; font-size: 14px;}
        .eventdate{color: #cc0000db;}
        .event-img img{margin: 0 auto;}
        .event-panel h4{font-size: 16px; margin-top: 0}
        .event-panel p{font-size: 12px;}
        .event-panel .price{margin-top: 10px;}
        @media(min-width: 992px){
            .event-panel{display: flex}
        }
        @media(max-width: 991.99px){
            .event-img{margin-bottom: 15px}
        }
    </style>
</head>

<body>

<section id="checkout-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Event Checkout</h2>
            </div>
        </div>
        <div class="row event-panel">
            <div class="col-md-4 img-container">
                <div class="event-img">
                    <img src="{{asset('img/event/'.$data->image)}}" class="img-responsive" width="360" height="200" alt="{{$data->name}}">
                </div>
            </div>
            <div class="col-md-8">
                <h4>{{$data->name}}</h4>
                @php($short_description = 'short_description_'.$lang)
                <p>{{$data->$short_description}}</p>
                <div class="eventdate"><?php echo $data['date'] ?></div>
                <h3 class="price"><?php echo '€'.$data['price'] ?></h3>
                <p class="text-info">Pay Now using:</p>
                <div id="paypal-button-container"></div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="text-center"><a href="{{route('front.index')}}" class="btn btn-primary">Go back to Home Page</a></div>
    </div>
</section>

<!-- jQuery -->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
        env: 'production', // sandbox | production
        style: {
            layout: 'vertical',
            label: 'paypal',
            size:   'medium',    // medium | large | responsive
            shape:  'pill',      // pill | rect
            color:  'gold',       // gold | blue | silver | black
        },
        funding: {
            allowed: [ paypal.FUNDING.CARD ],
            disallowed: [ paypal.FUNDING.CREDIT ]
        },
        client: {
            // sandbox:    'AQsDh5YqOnjgPIC_TUMcPtcdnXMrifu0w-Fh5o9_fx8SDVfwPuMJnpzWbNJ_NQRRp8qQsfxFea0LNSXp',
            production: 'AdUQBsH3YYC4vkiWhxwoN29comUunu0DVu1GnutDgFN0N6Ezs2Abium5qoGCMolpgYqLeCJPlvHwRQDR'
        },
        payment: function(data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: '<?php echo $data['price'] ?>',
                        currency: 'EUR',
                    },
                    description: 'Payment for event: <?php echo $data['title'] ?>',
                }]
            });
        },
        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function(response) {
                if (response.state == 'approved' && response.transactions[0].amount.total == <?php echo $data['price'] ?>) {
                    var payer = response.payer.payer_info;

                    var name = payer.first_name + ' ' + payer.last_name;
                    var email = payer.email;
                    var price = response.transactions[0].amount.total;

                    $.ajax({
                        url:'/saveCheckout',
                        type:'post',
                        data:{'_method':'post','_token':'<?php echo csrf_token() ?>','event':<?php echo $data['id'] ?>, 'name':name, 'email':email, 'price':price},
                        success:function(response){
                            if (response) {
                                document.getElementById("payment-content").innerHTML = '<div class="success-box text-center"><div class="text-success tick-icon">&#10003;</div><h4 class="service-heading">Payment Completed</h4><div>Thank you for paying for the event. We will contact you soon.</div></div>';
                            }
                        }
                    });
                }else{
                    alert('Payment failed. Please try again.');
                }
            });
        }

    }, '#paypal-button-container');

</script>

</body>
</html>
