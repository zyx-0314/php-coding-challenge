<?php
$inputFile = 'sample-log.txt';
$outputFile = 'output.txt';

$lines = file($inputFile, FILE_IGNORE_NEW_LINES);

$pipeOutput = [];
$allIDs = [];
$uniqueUsers = [];

echo "<div style='display: flex; justify-content: center; align-items: start;'>";
echo "<div>";
echo "Processing file: $inputFile <br>";
if ($lines === false) {
    die("Error: Unable to read the file $inputFile\n");
}
if (empty($lines)) {
    die("Error: The file $inputFile is empty\n");
}
if (count($lines) < 2) {
    die("Error: The file $inputFile does not contain enough data\n");
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>ID</th><th>User ID</th><th>Bytes TX</th><th>Bytes RX</th><th>Default Format(Date & Time)</th><th>New Format(Date & Time)</th></tr>";

foreach ($lines as $line) {
    $userID = trim(substr($line, 12, 6));
    $bytesTX = number_format((int)trim(substr($line, 18, 8)));
    $bytesRX = number_format((int)trim(substr($line, 26, 8)));
    $rawDate = trim(substr($line, 34, 17));
    $id = trim(substr($line, 0, 12));

    echo "<tr>";
    echo "<td>$id</td>";
    echo "<td>$userID</td>";
    echo "<td>$bytesTX</td>";
    echo "<td>$bytesRX</td>";
    echo "<td>$rawDate</td>";
    
    $dateObj = DateTime::createFromFormat('Y-m-d H:i', $rawDate);
    $formattedDate = $dateObj ? $dateObj->format('D, d F Y H:i:s') : 'Invalid Date';
    echo "<td>$formattedDate</td>";
    echo "</tr>";

    $pipeOutput[] = "$userID|$bytesTX|$bytesRX|$formattedDate|$id";
    $allIDs[] = $id;
    $uniqueUsers[$userID] = true;
}
echo "</table>";
echo "</div>";

file_put_contents($outputFile, implode(PHP_EOL, $pipeOutput) . PHP_EOL);

echo "<div style='margin-left: 20px;'>";
echo "Unsorted Id's:";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Index</th><th>ID</th></tr>";
foreach ($allIDs as $index => $id) {
    echo "<tr>";
    echo "<td>" . ($index + 1) . "</td>";
    echo "<td>$id</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";

natcasesort($allIDs);

file_put_contents($outputFile, PHP_EOL . "Sorted IDs:" . PHP_EOL, FILE_APPEND);


echo "<div style='margin-left: 20px;'>";
echo "Sorted ID's:";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Index</th><th>ID</th></tr>";
foreach ($allIDs as $index => $id) {
    echo "<tr>";
    echo "<td>" . ($index + 1) . "</td>";
    echo "<td>$id</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
foreach ($allIDs as $id) {
    file_put_contents($outputFile, $id . PHP_EOL, FILE_APPEND);
}


echo "<div style='margin-left: 20px;'>";
echo "Sorted Unique ID's:";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Index</th><th>User ID</th></tr>";

$uniqueUserList = array_keys($uniqueUsers);

sort($uniqueUserList);

file_put_contents($outputFile, PHP_EOL . "Unique Users:" . PHP_EOL, FILE_APPEND);

foreach ($uniqueUserList as $index => $user) {
    file_put_contents($outputFile, "[" . ($index + 1) . "] $user" . PHP_EOL, FILE_APPEND);

    echo "<tr>";
    echo "<td>" . ($index + 1) . "</td>";
    echo "<td>$user</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
echo "</div>";

?>
