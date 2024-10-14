<?php
include "config.php";


$sql = "SELECT id, description, status, timestamp FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='card'>";
    echo "<div class='card-body'>";
    echo "<table class='table table-dark table-hover'>";
    echo "<thead><tr><th>ID</th><th>Description</th><th>Status</th><th>Action</th></tr></thead><tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "<td>
                <button class='btn btn-success btn-sm' onclick=\"updateStatus(" . $row['id'] . ", 'completed')\">Complete</button>
                <button class='btn btn-warning btn-sm' onclick=\"updateStatus(" . $row['id'] . ", 'pending')\">Pending</button>
                <button class='btn btn-danger btn-sm' onclick=\"deleteTask(" . $row['id'] . ")\">Delete</button>
              </td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
    echo "</div>"; 
    echo "</div>"; 
} else {
    echo "<div class='card'><div class='card-body'>0 results</div></div>";
}

$conn->close();
?>
