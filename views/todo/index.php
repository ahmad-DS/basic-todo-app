<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>

    <style>
        body {
            font-family: Arial;
            max-width: 600px;
            margin: 50px auto;
        }

        input {
            padding: 10px;
            width: 70%;
        }

        button {
            padding: 10px;
            cursor: pointer;
        }

        li {
            margin: 15px 0;
        }

        .completed {
            text-decoration: line-through;
        }
    </style>
</head>

<body>

<h1>Todo App</h1>

<input id="title" placeholder="Enter todo">
<button onclick="createTodo()">Add</button>

<ul id="todos"></ul>

<script>

const baseUrl = '/index.php?r=todo/';

// Load todos
async function loadTodos() {

    const response = await fetch(baseUrl + 'index');
    const todos = await response.json();

    const list = document.getElementById('todos');

    list.innerHTML = '';

    todos.forEach(todo => {

        const li = document.createElement('li');

        li.innerHTML = `
            <span class="${todo.completed ? 'completed' : ''}">
                ${todo.title}
            </span>

            <button onclick="toggleTodo(${todo.id}, ${todo.completed})">
                ${todo.completed ? 'Undo' : 'Complete'}
            </button>

            <button onclick="deleteTodo(${todo.id})">
                Delete
            </button>
        `;

        list.appendChild(li);
    });
}


// Create
async function createTodo() {

    const title = document.getElementById('title').value;

    if (!title) return;

    await fetch(baseUrl + 'create', {
        method: 'POST',

        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },

        body: `title=${encodeURIComponent(title)}`
    });

    document.getElementById('title').value = '';

    loadTodos();
}


// Update
async function toggleTodo(id, completed) {

    await fetch(baseUrl + `update&id=${id}`, {

        method: 'PATCH',

        headers: {
            'Content-Type': 'application/json'
        },

        body: JSON.stringify({
            completed: !completed
        })
    });

    loadTodos();
}


// Delete
async function deleteTodo(id) {

    await fetch(baseUrl + `delete&id=${id}`, {
        method: 'DELETE'
    });

    loadTodos();
}


loadTodos();

</script>

</body>
</html>