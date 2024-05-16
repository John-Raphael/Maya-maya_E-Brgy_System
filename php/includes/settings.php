<?php
$settings = [
    "platform" => "windows",
    "devmode" => true,
    "name" => "BDRS",
    "version" => "1.0",
    "logo" => "/public/img/logo.png",
    "database" => [
        "type" => "mysql", // mysql, pgsql or sqlite3
        "host" => "localhost",
        "username" => "root",
        "password" => "",
        "database" => "maya-maya_e_brgy_system"
    ],
    "storage" => "/public/storage", // where the file uploaded save
    "image" => "/public/img",
    "host" => "http://localhost/Maya-maya_E-Brgy_System",
    /*
    Paymongo is payment gateway to enable e-wallets payment
    in your application. You can get the secret key and secret key from paymongo dashboard.
    */
    "paymongo" => [
        "enabled" => false,
        "secret_key" => "", // Must Base 64 encoded API key
    ],
    /*
    Pisopay is payment gateway to enable e-wallets and direct banking
    payments in your application.You can get the secret key from pisopay dashboard.
    */
    "pisopay" => [
        "enabled" => false,
        "secret_key" => "",
    ],
    /*
    Mailer is used to send emails to users.
    You can get the host, port, username and password from
    your email provider.
    */
    "mailer" => [
        "name" => "BDORS",
        "host" => "bdrs.toobigapp.com", //mail.barangayrequestsystem.com
        "port" => "465", // 465 ssl - 587 non ssl ;
        "username" => "noreply@bdrs.toobigapp.com",//support@barangayrequestsystem.com
        "password" => "WHDS1~uAfI=)",
    ],
    /*
    Semaphore is used to send sms to users.
    You can get the email, password, sender name and api key from
    your semaphore dashboard.
    */
    "semaphore" => [
        "sender_name" => "BDRS",
        "api_key" => "5f31ce710a070c94e6df2a0622564d04",
    ],
    /*
    reCAPTCHA is used to verify user is human or bot.
    You can get the secret key from reCAPTCHA dashboard.
    */
    "recaptcha" => [
        "enabled" => false,
        "site_key" => "6Ld14WIpAAAAAHhCvZF8D66TQ-5mhkLLIx4ptOec",
        "secret_key" => "6Ld14WIpAAAAAPRxKJUhxIz56znnIw5qVu2h1tO0",
    ]
];



$project_devmode = $settings["devmode"];


$project_name = $settings["name"];
$project_host = $settings["host"];
$project_logo = $settings["host"].$settings["logo"];
$project_storage = $settings["host"].$settings["storage"];
$project_image_folder = $settings["host"] . $settings["image"];
$project_public_folder = $settings["host"] . "/public";

$reCAPTCHA_enabled = $settings["recaptcha"]["enabled"];
$reCAPTCHA_secret_key = $settings["recaptcha"]["secret_key"];
$reCAPTCHA_site_key = $settings["recaptcha"]["site_key"];


$db = new mysqli(
    $settings["database"]["host"],
    $settings["database"]["username"],
    $settings["database"]["password"],
    $settings["database"]["database"]
);