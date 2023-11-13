<?php
// Database credentials for localhost server
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'root');

// Create a database connection
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check the connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Display data from the Invoice table
$sql = "SELECT * FROM Invoice";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    echo "<h2>Invoice Table</h2>";
    echo "<table border='1'>";
    echo "<tr><th>InvoiceID</th><th>CustomerID</th><th>InvoiceDate</th><th>TotalAmount</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['InvoiceID'] . "</td>";
        echo "<td>" . $row['CustomerID'] . "</td>";
        echo "<td>" . $row['InvoiceDate'] . "</td>";
        echo "<td>" . $row['TotalAmount'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No data found in the Invoice table.</p>";
}

// Display data from the Products table
$sql = "SELECT * FROM Products";
$result = $db->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<h2>Products Table</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ProductID</th><th>ProductName</th><th>Price</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['ProductID'] . "</td>";
        echo "<td>" . $row['ProductName'] . "</td>";
        echo "<td>" . $row['Price'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No data found in the Products table.</p>";
}

// Display data from the Customers table
$sql = "SELECT * FROM Customers";
$result = $db->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<h2>Customers Table</h2>";
    echo "<table border='1'>";
    echo "<tr><th>CustomerID</th><th>FirstName</th><th>LastName</th><th>Email</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['CustomerID'] . "</td>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No data found in the Customers table.</p>";
}

// Close the database connection
$db->close();
?>