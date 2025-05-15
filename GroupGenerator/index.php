<?php
session_start();

// Initialize arrays only once
if (!isset($_SESSION['array1'])) {
    $_SESSION['array1'] = ['A1', 'A2', 'A3'];
    $_SESSION['array2'] = ['B1', 'B2', 'B3'];
    $_SESSION['array3'] = ['C1', 'C2', 'C3'];
    $_SESSION['rows'] = []; // to store generated rows
}

// On button click (form submit)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_SESSION['array1']) && !empty($_SESSION['array2']) && !empty($_SESSION['array3'])) {
        // Get one random value from each array
        $val1 = array_splice($_SESSION['array1'], array_rand($_SESSION['array1']), 1)[0];
        $val2 = array_splice($_SESSION['array2'], array_rand($_SESSION['array2']), 1)[0];
        $val3 = array_splice($_SESSION['array3'], array_rand($_SESSION['array3']), 1)[0];

        // Store the row
        $_SESSION['rows'][] = [$val1, $val2, $val3];
    }
}

// Optional: Reset session for testing
if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Random Row Generator</title>
</head>
<body>
    <h2>Generated Rows:</h2>
    <table border="1" cellpadding="8">
        <tr>
            <th>From Array 1</th>
            <th>From Array 2</th>
            <th>From Array 3</th>
        </tr>
        <?php foreach ($_SESSION['rows'] as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row[0]) ?></td>
                <td><?= htmlspecialchars($row[1]) ?></td>
                <td><?= htmlspecialchars($row[2]) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>

    <?php if (!empty($_SESSION['array1']) && !empty($_SESSION['array2']) && !empty($_SESSION['array3'])): ?>
        <form method="post">
            <button type="submit">Add Row</button>
        </form>
    <?php else: ?>
        <p><strong>All arrays are empty. No more rows can be added.</strong></p>
    <?php endif; ?>

    <br>
    <a href="?reset=true">Reset All</a>
</body>
</html>
