<?php

$dbhost = 'localhost';
$dbname = 'testdb';
$dbuser = 'user';
$dbpass = 'changeme1x2x3x4';

$find = $_GET['lastname'] ?? '';

// One could, in addition to the prepared statement below, do further filtering on this input var using a regex
// such as /^[A-Za-z %\-]*$/ -- this would make sure the search term makes sense while also allowing the use of %
// to work with the LIKE operator in the query.
// One could also prevent % from existing in the input string so that we can add it in in exactly the way we want;
// for instance, we could insert it at the end and only look for names that start with the input string,
// which is the most performant way of querying with a wildcard, or we could put % on both ends so that we return
// any names that contain the input.

try {
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    
    $stmt = $db->prepare("SELECT firstname, lastname FROM customers WHERE lastname LIKE :find ORDER BY lastname");
    $result = $stmt->execute(['find' => $find])->fetchAll();
} catch (Exception $e) {
    // replace the actual exception with a new, more vague one to hide any sensitive details in production
    throw new RuntimeException('DB connection or query error!');
}
?>

<h1>You searched for: "<?= htmlspecialchars($find) ?>"</h1>

<h2>Results:</h2>

<table>
    <tr><th>First Name</th><th>Last name</th></tr>
    <?php foreach ($result as $row) {
        // Not using htmlspecialchars() for output here because I'm assuming db data was already
        // filtered/validated, as it should be.
        echo '<tr><td>' . ($row['lastname'] ?? '') . '</td><td>' . ($row['firstname'] ?? '') . '</td></tr>';
    } ?>
</table>
