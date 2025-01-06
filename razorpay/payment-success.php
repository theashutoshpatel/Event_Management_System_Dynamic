<?php
if(isset($_GET)){
    // Check if payment is successful and display appropriate message
    if(isset($_GET['rp_payment_id'])){
        $payment_id = $_GET['rp_payment_id']; // Payment ID from Razorpay response
        $order_id = $_GET['oid']; // Order ID from Razorpay response
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        /* Center the message in a box */
        .message-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .message-box {
            box-shadow: 0 15px 25px #00000019;
            padding: 45px;
            width: 100%;
            max-width: 500px;
            text-align: center;
            border-radius: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        ._success i {
            font-size: 55px;
            color: #28a745;
        }

        .message-box h2 {
            margin-bottom: 12px;
            font-size: 40px;
            font-weight: 500;
            line-height: 1.2;
            margin-top: 10px;
        }

        .message-box p {
            margin-bottom: 0px;
            font-size: 18px;
            color: #495057;
            font-weight: 500;
        }

        /* Optional: Add a green border and icon styling */
        ._success {
            border-bottom: solid 4px #28a745 !important;
        }

        ._success i {
            color: #28a745 !important;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <div class="message-box _success">
            <i class="fa fa-check-circle" aria-hidden="true"></i>
            <h2> Your payment was successful </h2>
            <p> Thank you for your payment! </p> 
            <p> Payment ID: <?php echo isset($payment_id) ? $payment_id : 'N/A'; ?></p>
            <p> Order ID: <?php echo isset($order_id) ? $order_id : 'N/A'; ?></p>
        </div> 
    </div> 
</body>
</html>
