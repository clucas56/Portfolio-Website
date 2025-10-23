<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "databaseuser301", "temp4now", "ECT301databasechuckseuroparts");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM Customer Account";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>IDCustomer</th>";
                echo "<th>Title</th>";
                echo "<th>FirstName</th>";
                echo "<th>LastName</th>";
                echo "<th>DelivStreetAddress</th>";
                echo "<th>DelivCityAddress</th>";
                echo "<th>DelivZipcodeAddress</th>";
                echo "<th>DelivStateAddress</th>";
                echo "<th>PhoneNumber</th>";
                echo "<th>Email</th>";
                echo "<th>CreditCard</th>";
                echo "<th>CreditCard3Num</th>";
                echo "<th>BillStreetAddress</th>";
                echo "<th>BillCityAddress</th>";
                echo "<th>BillZipcodeAddress</th>";
                echo "<th>BillStateAddress</th>";
                echo "<th>DelivStreetAddress</th>";
                echo "<th>DelivCityAddress</th>";
                echo "<th>Username</th>";
                echo "<th>Password</th>";
                echo "<th>OrderPartNumber</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['IDCustomer'] . "</td>";
                echo "<td>" . $row['Title'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['DelivStreetAddress'] . "</td>";
                echo "<td>" . $row['DelivCityAddress'] . "</td>";
                echo "<td>" . $row['DelivZipcodeAddress'] . "</td>";
                echo "<td>" . $row['DelivStateAddress'] . "</td>";
                echo "<td>" . $row['PhoneNumber'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['CreditCard'] . "</td>";
                echo "<td>" . $row['CreditCard3Num'] . "</td>";
                echo "<td>" . $row['CreditCard'] . "</td>";
                echo "<td>" . $row['BillStreetAddress'] . "</td>";
                echo "<td>" . $row['BillCityAddress'] . "</td>";
                echo "<td>" . $row['BillZipcodeAddress'] . "</td>";
                echo "<td>" . $row['BillStateAddress'] . "</td>";
                echo "<td>" . $row['Username'] . "</td>";
                echo "<td>" . $row['Password'] . "</td>";
                echo "<td>" . $row['OrderPartNumber'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>