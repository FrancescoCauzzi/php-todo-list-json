<?php

// This reads the entire contents of the todos.json file into a variable called $entireFileString
$entireFileString = file_get_contents('todos.json');

// This decodes the JSON data in $entireFileSting into a PHP object or array called $todos
$todos = json_decode($entireFileString);

// This sets the response header to indicate that the content being returned is in JSON format
header('Content-type: application/json');

// This encodes the $todos variable back into a JSON string and prints it to the output.
echo json_encode($todos);
