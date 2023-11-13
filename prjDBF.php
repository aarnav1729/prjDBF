<!-- 
    Name: Aarnav Singh
    Email: chhabraa@csp.edu (or) aarnavsingh836@gmail.com
    Course: CSC235, Server Side Web Development
    Date: 2023-11-10
    File: prjDBF.php
    Purpose: This file displays data from a database using PHP and a HTML table.
    Project: Project 2, Display Data
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prjDBF</title>
</head>

<body>

    <form method="post">
        <label for="tableSelect">Select a Table:</label>

        <select name="tableSelect" id="tableSelect">
            <option value="invoice">Invoice Table</option>
            <option value="products">Products Table</option>
            <option value="customers">Customers Table</option>
        </select>

        <input type="submit" value="Show Table">
    </form>

    <?php

// databse credentials for connecting to the database (local host)
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'root');

// databse credentials for connecting to the database (remote host)
//define('DB_HOST', 'localhost');
//define('DB_USER', 'b7_35412778');
//define('DB_PASSWORD', 'Cucumbers');
//define('DB_NAME', 'b7_35412778_root');


// create a connection to the database using the credentials above
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// check the connection to the database
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // check if a table has been selected by the user
    if (isset($_POST["tableSelect"])) {
        $selectedTable = $_POST["tableSelect"];

        // switch statement to display data from the selected table
        switch ($selectedTable) {

            case "invoice":
                displayTable("Invoice", "InvoiceID", "CustomerID", "InvoiceDate", "TotalAmount");
                break;

            case "products":
                displayTable("Products", "ProductID", "ProductName", "Price");
                break;

            case "customers":
                displayTable("Customers", "CustomerID", "FirstName", "LastName", "Email");
                break;

            default:
                echo "<p>No table selected.</p>";
        }
    }
}

// function to display the selected table
function displayTable($tableName, ...$columns) {
    global $db;

    $sql = "SELECT * FROM $tableName";
    $result = $db->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<div id='{$tableName}Table' class='table-container'>";
        echo "<h2>{$tableName} Table</h2>";
        echo "<table border='1'>";
        echo "<tr>";

        foreach ($columns as $column) {
            echo "<th>$column</th>";
        }

        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";

            foreach ($columns as $column) {
                echo "<td>" . $row[$column] . "</td>";
            }

            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";

    } 

    else {
        echo "<p>No data found in the $tableName table.</p>";
    }
}

// closing connection to the database
$db->close();
?>

    <p>
        Development Stages:
    <ol>
        <li>Designed the database structure, ensuring 1NF and appropriate use of primary and foreign keys.</li>
        <li>Created the database in draw.io</li>
        <li>Implemented the database and tables in phpmyadmin, populating them with sample data.</li>
        <li>Created the PHP program to extract and display data from a selected table using HTML tables.</li>
        <li>Added a drop-down list to allow users to switch between different tables.</li>
        <li>Added the development stages to the bottom of the page.</li>
        <li>Added a comment block at the top of my code.</li>
        <li>Validated the HTML and database information.</li>
        <li>Added CSS to style the tables and the page.</li>
    </ol>
    </p>
</body>

</html>
