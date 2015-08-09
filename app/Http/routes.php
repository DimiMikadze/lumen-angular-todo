<?php

use App\Todos;
use Illuminate\Http\Request;

/**
* Render main view
*/
$app->get('/', function() 
{
    return view('todos.index');
});

/**
* Get all todos
*/
$app->get('todos', function()
{
    $todos = Todos::orderBy('created_at', 'DESC')->paginate(5)->toArray();
    $remaining = Todos::where('completed', 0)->count();

    return ['todos' => $todos, 'remaining' => $remaining];

});

/**
* Create todo
*/
$app->post('add-todo', function(Request $request)
{
    Todos::create($request->all());
});

/**
* Delete todo
*/
$app->post('todos/delete/{id}', function($id)
{
    Todos::destroy($id);
});

/**
* Complete todo
*/
$app->post('todos/complete/{id}/{completed}', function($id, $completed)
{
    Todos::where('id', $id)->update(['completed' => $completed]);
});

/**
* Update todo
*/
$app->post('update/{id}', function(Request $request, $id)
{
    Todos::where('id', $id)->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'completed' => $request->input('completed')
    ]);
});

/**
* Render add todo
*/
$app->get('add-form', function()
{
    return view('todos.templates.add_form');
});

/**
* Render update todo
*/
$app->get('edit-form', function()
{
    return view('todos.templates.edit_form');
});

/**
* Todos table
*/
$app->get('todos-table', function()
{
    return view('todos.templates.todos_table');
});