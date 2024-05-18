<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "todo";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create
if (isset($_POST['task'])) {
    $task = $_POST['task'];
    $sql = "INSERT INTO todos (task) VALUES ('$task')";
    $conn->query($sql);
}

// Update 
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $isDone = isset($_POST['is_done']) ? 1 : 0;
    $sql = "UPDATE todos SET is_done=$isDone WHERE id=$id";
    $conn->query($sql);
}

// Delete
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM todos WHERE id=$id";
    $conn->query($sql);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Read
$sql = "SELECT * FROM todos";
$result = $conn->query($sql);

// Progress Tracker
$totalTasks = $result->num_rows;
$completedTasks = 0;
while ($row = $result->fetch_assoc()) {
    if ($row['is_done'] == 1) {
        $completedTasks++;
    }
}
$progress = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;

$result->data_seek(0); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
</head>

<body>
    <h2>ToDo List</h2>
    <form method="post">
        <input type="text" name="task" placeholder="Enter task">
        <button type="submit">Add</button>
    </form>
    <br>
    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <li>
                <form method="post" id="form_<?php echo $row['id']; ?>">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="checkbox" name="is_done" <?php if ($row['is_done']) echo "checked"; ?> onchange="submitForm(<?php echo $row['id']; ?>)">
                    <span style="text-decoration: <?php echo $row['is_done'] ? 'line-through' : 'none'; ?>"><?php echo $row['task']; ?></span>
                    <button type="submit" name="delete">Delete</button>
                    <input type="hidden" name="update" value="1">
                </form>
            </li>
        <?php endwhile; ?>
    </ul>
    <p>Progress: <?php echo $progress; ?>%</p>

    <script>
        function submitForm(id) {
            document.getElementById('form_' + id).submit();
        }
    </script>
</body>

</html>




