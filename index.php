<?php
/**
 * Ean Daus
 * 2/11/2019
 * index.php
 * snow day PDO activity
 */
//php error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Connect to DB
require '/home/edausgre/config.php';

try{
    //instantiate a new database object
    $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
    echo 'Connected to Database!';

}catch(PDOException $e) {
    echo $e->getMessage();
}

//Define the query
$sql = "SELECT * FROM petOwners
        INNER JOIN pets ON pets.id = petOwners.petId";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the params
$id = 3;
$statement->bindParam(':id', $id, PDO::PARAM_STR);

//Execute
$statement->execute();

//Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

echo "<table>
        <tr>
            <th>First</th>
            <th>Last</th>
            <th>Pet Name</th>
            <th>Pet Type</th>
            <th>Pet Color</th>
        </tr>";

foreach($result as $row){
    echo $row['name'].", ".$row['type'].", ".$row['color'];
    echo "<tr>
                <td>{$row['first']}</td> 
                <td>{$row['last']}</td> 
                <td>{$row['name']}</td> 
                <td>{$row['type']}</td> 
                <td>{$row['color']}</td>  
            </tr>";
}
echo "</table>";


/*
//Define the query
$sql = "SELECT * FROM pets";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the params
$id = 3;
$statement->bindParam(':id', $id, PDO::PARAM_STR);

//Execute
$statement->execute();

//Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $row){
    echo $row['name'].", ".$row['type'].", ".$row['color'];
}
*/


/*
//Define the query
$sql = "DELETE FROM pets WHERE id = :id";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the params
$id = 1;
$statement->bindParam(':id', $id, PDO::PARAM_STR);

//Execute
$statement->execute();
*/


/*
//Define the query
$sql = "UPDATE pets SET color = :color
        WHERE name = :name";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the params
$color = 'brown';
$name = 'Oscar';
$statement->bindParam(':color', $color, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);

//Execute
$statement->execute();

*/


/*
//Define the query
$sql = "INSERT INTO pets(type, name, color)
        VALUES (:type, :name, :color)";

//Prepare the statement
$statement = $dbh->prepare($sql);

//Bind the params
$type = 'kangaroo';
$name = 'Joey';
$color = 'purple';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//Execute
$statement->execute();
$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully.</p>";

//Bind the params
$type = 'snake';
$name = 'Slitherin';
$color = 'green';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//Execute
$statement->execute();
$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully.</p>";
*/