<?php
// Include the database connection
include('db.php');

// Only handle GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // If specific ID is passed, filter by ID
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM animals WHERE id = '$id'";
    } else {
        // Fetch all users if no ID is provided
        $sql = "SELECT * FROM animals";
    }

    $result = $conn->query($sql);

    // Check if any records were found
    if ($result->num_rows > 0) {
        $animals = [];
        while ($row = $result->fetch_assoc()) {
            $animals[] = $row;
        }
        echo json_encode($animals);
    } else {
        echo json_encode(["message" => "No records found"]);
    }
}

$conn->close();
?>
