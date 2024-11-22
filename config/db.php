<?php

$dbPath = __DIR__ . '/database.db';



if(!file_exists($dbPath)) {

    try {
        $db = new PDO('sqlite:' . $dbPath);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create Admins table
    $db->exec('CREATE TABLE IF NOT EXISTS Admins (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL,
        full_name TEXT,
        image TEXT,
        role TEXT NOT NULL CHECK(role IN ("Exam Officer", "Senior Master", "Principal")),
        status INTEGERER DEFAULT 1,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    )');
    
    // Create Teachers table
    $db->exec('CREATE TABLE IF NOT EXISTS Teachers (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL,
        full_name TEXT,
        image TEXT,
        subject TEXT NOT NULL,
        status INTEGERER DEFAULT 1,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    )');
    
    // Create Students table
    $db->exec('CREATE TABLE IF NOT EXISTS Students (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        first_name TEXT NOT NULL,
        last_name TEXT NOT NULL,
        class TEXT NOT NULL,
        address TEXT,
        image TEXT,
        phone TEXT,
        email TEXT,
        country TEXT,
        state TEXT,
        lga TEXT,
        dob DATE,
        religion TEXT,
        tribe TEXT,
        blood TEXT,
        genotype TEXT,
        disability TEXT,
        gender TEXT NOT NULL CHECK(gender IN ("Male", "Female")),
        reg_number TEXT UNIQUE,
        password TEXT NOT NULL,
        status INTEGERER DEFAULT 1,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    )');
    
    // Create Scores table
    $db->exec('CREATE TABLE IF NOT EXISTS Scores (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        student_id INTEGER NOT NULL,
        class TEXT NOT NULL,
        score INTEGER NOT NULL,
        session TEXT NOT NULL,
        term TEXT NOT NULL,
        performance TEXT NOT NULL,
        status INTEGERER DEFAULT 1,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (student_id) REFERENCES Students(id)
    )');

    $name = "shuraih99";
    $password = password_hash(1234, PASSWORD_DEFAULT);
    $db->exec('INSERT INTO Admins (username, password, role, full_name) VALUES ("'.$name.'", "'.$password.'", "Principal", "Shuraihu Usman")');
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

}