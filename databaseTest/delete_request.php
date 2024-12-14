<?php
// Include the database connection
include('db.php');

// Only handle GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if ID is passed
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Prepare the SQL query to delete the record
        $sql = "DELETE FROM animals WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Record deleted successfully"]);
        } else {
            echo json_encode(["error" => $conn->error]);
        }
    } else {
        echo json_encode(["error" => "ID parameter is required"]);
    }
}

$conn->close();
?>
