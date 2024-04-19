<?php
require_once 'vendor/autoload.php';
function getSomething($customer_name, $cost)
{
    $publicKey = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCUCCNjkYBYbd0GCQ2jt1L0Bcw4/8s0nR5i8Hh0gtNRO9oc2TTe2YZZnOuw7yJ8G8tV5FE9Gx7k58iawWP4fGSGsX8m+o7fq1FhulRuYe4NkXvGaXv0WFHKsp+ehXXjBBuYn8hLSbTBqBbhCTQ5+HazZVqKfgQVnhCeNRTGW+oYqwIDAQAB";
    $merchantKey = "vutndmp.a865GaPKdtLA93XoAHspYCuVJDQ";
    $projectName = "MUBRIDE";
    $merchantName = "Chan Myae Oo";
    $order_id = "order_" . uniqid();   

    $items_data = array(
        "name" => "Car Ticket",
        "amount" => $cost,
        "quantity" => "1"
    );

    $data_pay = json_encode(
        array(
            "clientId" => "f689d450-371d-34bc-b7ae-18e80bfb4b6a",
            "publicKey" => "$publicKey",
            "items" => json_encode(array($items_data)),
            "customerName" => $customer_name,
            "totalAmount" => $cost,
            "merchantOrderId" => $order_id,
            "merchantKey" => "$merchantKey",
            "projectName" => "$projectName",
            "merchantName" => "$merchantName"
        )
    );

    $public_key = '-----BEGIN PUBLIC KEY-----MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCFD4IL1suUt/TsJu6zScnvsEdLPuACgBdjX82QQf8NQlFHu2v/84dztaJEyljv3TGPuEgUftpC9OEOuEG29z7z1uOw7c9T/luRhgRrkH7AwOj4U1+eK3T1R+8LVYATtPCkqAAiomkTU+aC5Y2vfMInZMgjX0DdKMctUur8tQtvkwIDAQAB-----END PUBLIC KEY-----';

    $rsa = new \phpseclib\Crypt\RSA();

    extract($rsa->createKey(1024));
    $rsa->loadKey($public_key); // public key
    $rsa->setEncryptionMode(2);
    $ciphertext = $rsa->encrypt($data_pay);
    $value = base64_encode($ciphertext);

    $urlencode_value = urlencode($value);

    $encryptedHashValue = hash_hmac('sha256', $data_pay, 'b6a49a191e21156d537c98a0538cd41d');

    $redirect_url = "https://form.dinger.asia/?hashValue=$encryptedHashValue&payload=$urlencode_value";
    
    return $redirect_url;
}

// payment merchant callback key
// 4f45e5b7e768469d3ffbef16bf68c593