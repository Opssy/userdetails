<?php
include_once '../model/User.php';
include_once '../model/Agent.php';

function acceptApplication() {
    $tradeName = isset($_POST['trade_name']) ? $_POST['trade_name'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";
    $state = isset($_POST['state']) ? $_POST['state'] : "";
    $city = isset($_POST['city']) ? $_POST['city'] : "";
    $postalCode = isset($_POST['postal_code']) ? $_POST['postal_code'] : "";
    $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : "";
    $website = isset($_POST['website']) ? $_POST['website'] : "";
    $bookingNumber = isset($_POST['booking_number']) ? $_POST['booking_number'] : "";
    $companyNumber = isset($_POST['company_number']) ? $_POST['company_number'] : "";
    $iataNumber = isset($_POST['iata_number']) ? $_POST['iata_number'] : "";
    //handle validation
    $agency = new Agent([
        'trade_name' => $tradeName,
        'address' => $address,
        'state' => $state,
        'city' => $city,
        'postal_code' => $postalCode,
        'telephone' => $telephone,
        'website' => $website,
        'booking_number' => $bookingNumber,
        'company_number' => $companyNumber,
        'iata_number' => $iataNumber
    ]);
    $response = $agency->save();
    if ($response['success']) {
        $_SESSION['message'] = "Your application has been received and is being processed.";
    } else {
        $_SESSION['error'] = "We could not process your application at this point. Please try later.";
    }
    header("location: /application-successful.html");
}

if (isset($_POST) && !empty($_POST)) {
    acceptApplication();
} else {
    header('location: /apply.php');
}