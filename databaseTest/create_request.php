<?php
// Include the database connection
include('db.php');

// Only handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if the required fields are present
    if (isset($data['name']) && isset($data['breed'])) {
        $name = $data['name'];
        $breed = $data['breed'];

        // Prepare the SQL query to insert the record
        $sql = "INSERT INTO animals (name, breed) VALUES ('$name', '$breed')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "New record created successfully"]);
        } else {
            echo json_encode(["error" => $conn->error]);
        }
    } else {
        echo json_encode(["error" => "Invalid input data"]);
    }
}

$conn->close();
?>
