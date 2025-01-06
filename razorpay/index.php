<!DOCTYPE html>
<html>

<head>
    <title>How to Integrate Razorpay payment gateway in PHP | tutorialswebsite.com</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <style>
        body {
            background-color: #f4f7f6;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .row {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .col-xs-10,
        .col-md-10 {
            max-width: 500px;
            width: 100%;
        }

        .panel {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .panel-heading {
            background-color: #28a745;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .panel-title {
            font-size: 18px;
        }

        .panel-body {
            padding: 20px;
            background-color: #fff;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 12px;
            border-radius: 5px;
            width: 100%;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .panel-heading img {
            display: block;
            margin: 0 auto;
            /* Center the image horizontally */
            max-width: 200px;
            /* Adjust the maximum width */
            height: auto;
            /* Maintain aspect ratio */
            padding-bottom: 15px;
            /* Add some spacing below the image */
        }
    </style>
</head>

<body style="background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img src="./razorpay-logo.png" alt="Logo">
                        <!-- <h4 class="panel-title">Charge Rs.10 INR </h4> -->
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="billing_name" id="billing_name" placeholder="Enter name" required="" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="billing_email" id="billing_email" placeholder="Enter email" required="">
                        </div>

                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="number" class="form-control" name="billing_mobile" id="billing_mobile" min-length="10" max-length="10" placeholder="Enter Mobile Number" required="" autofocus="">
                        </div>

                        <div class="form-group">
                            <label>Payment Amount</label>
                            <input type="text" class="form-control" name="payAmount" id="payAmount" value="10" placeholder="Enter Amount" required="" autofocus="">
                        </div>

                        <!-- submit button -->
                        <button id="PayNow" class="btn btn-success btn-lg btn-block">Submit & Pay</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //Pay Amount
        jQuery(document).ready(function($) {

            jQuery('#PayNow').click(function(e) {

                var paymentOption = '';
                let billing_name = $('#billing_name').val();
                let billing_mobile = $('#billing_mobile').val();
                let billing_email = $('#billing_email').val();
                var shipping_name = $('#billing_name').val();
                var shipping_mobile = $('#billing_mobile').val();
                var shipping_email = $('#billing_email').val();
                var paymentOption = "netbanking";
                var payAmount = $('#payAmount').val();

                var request_url = "submitpayment.php";
                var formData = {
                    billing_name: billing_name,
                    billing_mobile: billing_mobile,
                    billing_email: billing_email,
                    shipping_name: shipping_name,
                    shipping_mobile: shipping_mobile,
                    shipping_email: shipping_email,
                    paymentOption: paymentOption,
                    payAmount: payAmount,
                    action: 'payOrder'
                }

                $.ajax({
                    type: 'POST',
                    url: request_url,
                    data: formData,
                    dataType: 'json',
                    encode: true,
                }).done(function(data) {

                    if (data.res == 'success') {
                        var orderID = data.order_number;
                        var orderNumber = data.order_number;
                        var options = {
                            "key": data.razorpay_key, // Enter the Key ID generated from the Dashboard
                            "amount": data.userData.amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": "INR",
                            "name": "Festiiv", //your business name
                            "description": data.userData.description,
                            "image": "Event_Management_System\admin\logo.png",
                            "order_id": data.userData.rpay_order_id, //This is a sample Order ID. Pass 
                            "handler": function(response) {

                                window.location.replace("payment-success.php?oid=" + orderID + "&rp_payment_id=" + response.razorpay_payment_id + "&rp_signature=" + response.razorpay_signature);

                            },
                            "modal": {
                                "ondismiss": function() {
                                    window.location.replace("payment-success.php?oid=" + orderID);
                                }
                            },
                            "prefill": { //We recommend using the prefill parameter to auto-fill customer's contact information especially their phone number
                                "name": data.userData.name, //your customer's name
                                "email": data.userData.email,
                                "contact": data.userData.mobile //Provide the customer's phone number for better conversion rates 
                            },
                            "notes": {
                                "address": "Festivv"
                            },
                            "config": {
                                "display": {
                                    "blocks": {
                                        "banks": {
                                            "name": 'Pay using ' + paymentOption,
                                            "instruments": [

                                                {
                                                    "method": paymentOption
                                                },
                                            ],
                                        },
                                    },
                                    "sequence": ['block.banks'],
                                    "preferences": {
                                        "show_default_blocks": true,
                                    },
                                },
                            },
                            "theme": {
                                "color": "#3399cc"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.on('payment.failed', function(response) {

                            window.location.replace("payment-failed.php?oid=" + orderID + "&reason=" + response.error.description + "&paymentid=" + response.error.metadata.payment_id);

                        });
                        rzp1.open();
                        e.preventDefault();
                    }

                });
            });
        });
    </script>
</body>

</html>