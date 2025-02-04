
<?php
require_once __DIR__ . '/../core/Environment.php';
require_once __DIR__ . '/../core/DatabaseFactory.php';
require_once __DIR__ . '/../core/Config.php';

function executeSQLFile($filePath) {
    $db = DatabaseFactory::getFactory()->getConnection();
    
    try {
        $sql = file_get_contents($filePath);
        $db->exec($sql);
        echo "Executed SQL file: " . $filePath . "\n";
    } catch (PDOException $e) {
        echo "Error executing " . $filePath . ": " . $e->getMessage() . "\n";
    }
}

// Execute SQL files in order
$sqlFiles = [
    __DIR__ . '/01-create-database.sql',
    __DIR__ . '/02-create-table-users.sql',
    __DIR__ . '/03-create-table-notes.sql',
    __DIR__ . '/04-changes-in-db.sql',
    __DIR__ . '/05-create-initial-accounts.sql'
];

foreach ($sqlFiles as $file) {
    executeSQLFile($file);
}

echo "Database initialization complete!\n";
