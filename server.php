<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newTodo'])) {

    // get the json
    $todosJSON = file_get_contents('todos.json');

    // we convert the file into a php array
    $todos = json_decode($todosJSON);

    // Create a new todo object with 'text' and 'done' properties
    $newTodo = array(
        'text' => $_POST['newTodo'],
        'done' => false
    );

    // push old
    //$todos[] = $_POST['newTodo'];

    // Add the new todo object to the end of the $todos array
    $todos[] = $newTodo;

    // convert the file into json format
    $newTodoJSON = json_encode($todos);

    // we save it in the json file
    file_put_contents('todos.json', $newTodoJSON);
    //
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'updateTodos') {
    // Get the updated todos JSON string from the POST data
    $updatedTodosJSON = $_POST['newTodos'];

    // Decode the JSON string into a PHP array
    $updatedTodos = json_decode($updatedTodosJSON, true);

    // Remove the content from the of the JSON file
    file_put_contents('todos.json', '');

    // Save the updated todo list to the empty JSON file
    file_put_contents('todos.json', json_encode($updatedTodos));

    // Set the response header to indicate that the content being returned is in JSON format
    header('Content-Type: application/json');

    // Encode the $updatedTodos variable back into a JSON string and print it to the output.
    echo json_encode($updatedTodos);
} else {


    // This reads the entire contents of the todos.json file into a variable called $entireFileString
    $entireFileString = file_get_contents('todos.json');


    // This decodes the JSON data in $entireFileSting into a PHP object or array called $todos
    $todos = json_decode($entireFileString);

    // This sets the response header to indicate that the content being returned is in JSON format
    header('Content-type: application/json');

    // This encodes the $todos variable back into a JSON string and prints it to the output.

    echo json_encode($todos);
};
