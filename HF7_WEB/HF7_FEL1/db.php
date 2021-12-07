<?php
$conn = new mysqli('localhost', 'root', '', 'fakestoredb');

if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}