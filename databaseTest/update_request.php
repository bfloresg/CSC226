<?php
// Include the database connection
include('db.php');

// Only handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON data from the request body
    $data = json_decode(file_get_contents("php://input"), true);

    // Check if the required fields are present
    if (isset($data['id']) && isset($data['name']) && isset($data['breed'])) {
        $id = $data['id'];
        $name = $data['name'];
        $breed = $data['breed'];

        // Prepare the SQL query to update the record
        $sql = "UPDATE users SET name='$name', breed='$breed' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Record updated successfully"]);
        } else {
            echo json_encode(["error" => $conn->error]);
        }
    } else {
        echo json_encode(["error" => "Invalid input data"]);
    }
}

$conn->close();
?>
