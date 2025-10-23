<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "databaseuser301", "temp4now", "ECT301databasechuckseuroparts");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$IDCustomer = mysqli_real_escape_string($link, $_REQUEST['IDCustomer']);
$Title = mysqli_real_escape_string($link, $_REQUEST['Title']);
$FirstName = mysqli_real_escape_string($link, $_REQUEST['FirstName']);
$LastName = mysqli_real_escape_string($link, $_REQUEST['LastName']);
$DelivStreetAddress = mysqli_real_escape_string($link, $_REQUEST['DelivStreetAddress']);
$DelivCityAddress = mysqli_real_escape_string($link, $_REQUEST['DelivCityAddress']);
$DelivZipcodeAddress = mysqli_real_escape_string($link, $_REQUEST['DelivZipcodeAddress']);
$DelivStateAddress = mysqli_real_escape_string($link, $_REQUEST['DelivStateAddress']);
$PhoneNumber = mysqli_real_escape_string($link, $_REQUEST['PhoneNumber']);
$Email = mysqli_real_escape_string($link, $_REQUEST['Email']);
$CreditCard = mysqli_real_escape_string($link, $_REQUEST['CreditCard']);
$CreditCard3Num = mysqli_real_escape_string($link, $_REQUEST['CreditCard3Num']);
$BillStreetAddress = mysqli_real_escape_string($link, $_REQUEST['BillStreetAddress']);
$BillCityAddress = mysqli_real_escape_string($link, $_REQUEST['BillCityAddress']);
$BillZipcodeAddress = mysqli_real_escape_string($link, $_REQUEST['BillZipcodeAddress']);
$BillStateAddress = mysqli_real_escape_string($link, $_REQUEST['BillStateAddress']);
$Username = mysqli_real_escape_string($link, $_REQUEST['Username']);
$Password = mysqli_real_escape_string($link, $_REQUEST['Password']);
$OrderPartNumber = mysqli_real_escape_string($link, $_REQUEST['OrderPartNumber']);
 
// attempt insert query execution
$sql = "INSERT INTO Customer Account (IDCustomer, Title, FirstName, LastName, DelivStreetAddress, DelivCityAddress, DelivZipcodeAddress, DelivStateAddress, PhoneNumber, Email, CreditCard, CreditCard3Num, BillStreetAddress, BillCityAddress, BillZipcodeAddress, BillStateAddress, Username, Password, OrderPartNumber) VALUES ('$IDCustomer', '$Title', '$FirstName' '$LastName', '$DelivStreetAddress', '$DelivCityAddress', '$DelivZipcodeAddress', '$DelivStateAddress', '$PhoneNumber', '$Email', '$CreditCard', '$CreditCard3Num', '$BillStreetAddress', '$BillCityAddress', '$BillZipcodeAddress', '$BillStateAddress', '$Username', '$Password', '$OrderPartNumber')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// close connection
mysqli_close($link);
?>