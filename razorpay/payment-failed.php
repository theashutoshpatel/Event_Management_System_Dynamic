<?php
if(isset($_GET)){
    // Check if payment is failed and display appropriate message
    if(isset($_GET['reason'])){
        $reason = $_GET['reason']; // Reason for failure from the Razorpay callback
        $paymentid = $_GET['paymentid']; // Payment ID
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
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
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        ._failed i {
            font-size: 55px;
            color: red;
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

        /* Optional: Add a red border and icon styling */
        ._failed {
            border-bottom: solid 4px red !important;
        }

        ._failed i {
            color: red !important;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <div class="message-box _failed">
            <i class="fa fa-times-circle" aria-hidden="true"></i>
            <h2> Your payment failed </h2>
            <p> Try again later. </p> 
            <p> Reason: <?php echo isset($reason) ? $reason : 'Unknown'; ?></p>
            <p> Payment ID: <?php echo isset($paymentid) ? $paymentid : 'N/A'; ?></p>
        </div> 
    </div> 
</body>
</html>
