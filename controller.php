<?php
    if(session_id() == null){
        session_start();
    }

    $errors = [];
    $messages = [];

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['orderNow'])){
        $fullname = htmlspecialchars($_POST['fullname']);
        $phone = htmlspecialchars($_POST['phone']);
        $altPhone = htmlspecialchars($_POST['altPhone']);
        $city = htmlspecialchars($_POST['city']);
        $fullAddress = htmlspecialchars($_POST['address']);
        $quantityAndPrice = htmlspecialchars($_POST['quantityAndPrice']);

        $htmlMessage = "
        <html>
            <body>
                <h3>A new order</h3>
                <p>Order Details:</p>
                <p><strong>Fullname</strong>: {$fullname}</p>
                <p><strong>Phone Number</strong>: {$phone}</p>
                <p><strong>Alternative Phone Number</strong>: {$altPhone}</p>
                <p><strong>City</strong>: {$city}</p>
                <p><strong>fullAddress</strong>: {$fullAddress}</p>
                <p><strong>Quantity/Price</strong>: {$quantityAndPrice}</p>
            </body>
        </html>
        ";
        
        $toAddress = "anendahpromise@gmail.com";
        $subject = "A New Order";
        $headers = "From: noreply@lapeezastore.shop\r\n";
        $response = mail($toAddress, $subject, $htmlMessage, $headers);
        if($response === true){
            $messages[] = "<p style='color: green'>Order Received</p>";
        }else{
            $errors[] = "<p style='color: red'>Sorry, your order could not be completed. Please try again.</p>";
        }
    }
?>