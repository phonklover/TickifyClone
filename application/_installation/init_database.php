
<?php
require_once __DIR__ . '/../core/Environment.php';
require_once __DIR__ . '/../core/DatabaseFactory.php';
require_once __DIR__ . '/../core/Config.php';

function executeSQLFile($filePath) {
    try {
        // For the first file (database creation), connect without database name
        if (strpos($filePath, '01-create-database.sql') !== false) {
            $dsn = Config::get('DB_TYPE') . ':host=' . Config::get('DB_HOST') . ';port=' . Config::get('DB_PORT');
            $db = new PDO($dsn, Config::get('DB_USER'), Config::get('DB_PASS'));
        } else {
            $db = DatabaseFactory::getFactory()->getConnection();
        }
        
        $sql = file_get_contents($filePath);A
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
