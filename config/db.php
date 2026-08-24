<?php

// Check if running on Render (Production)
if (getenv('DATABASE_URL')) {
    // Parse the Aiven PostgreSQL connection string
    $dbopts = parse_url(getenv('DATABASE_URL'));
    
    return [
        'class' => 'yii\db\Connection',
        'dsn' => "pgsql:host={$dbopts['host']};port={$dbopts['port']};dbname=" . ltrim($dbopts['path'], '/'),
        'username' => $dbopts['user'],
        'password' => $dbopts['pass'],
        'charset' => 'utf8',
        'enableSchemaCache' => true,
        'schemaCacheDuration' => 3600,
    ];
}

// Fallback to your local SQLite configuration
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlite:' . __DIR__ . '/../data/todo.db',
];
