<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <style>
        body {
            background-image: url('/images/todo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="text-gray-900 mx-4">
    <div class="container mx-auto py-8 px-4 max-w-2xl bg-white bg-opacity-20 rounded shadow mt-8">
        <h1 class="text-4xl font-bold text-center mb-6">Todos</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-4 rounded shadow mb-6">
            @csrf
            <div class="mb-4">
                <input type="text" name="title" placeholder="Task Title" required
                       class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:ring-blue-300">
            </div>
            <div class="mb-4">
                <textarea name="description" placeholder="Task Description" rows="3"
                          class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:ring focus:ring-blue-300"></textarea>
            </div>
            <button type="submit"
                    class="w-full bg-gray-800 text-white py-2 rounded hover:bg-gray-600 hover:opacity-90 hover:shadow-lg transition duration-300 ease-in-out">
                Add Task
            </button>
        </form>
        <ul class="space-y-4">
            @foreach ($tasks as $task)
                <li class="bg-white p-4 rounded shadow flex justify-between items-center">
                    <div>
                        <strong class="text-lg">{{ $task->title }}</strong>
                        <p class="text-gray-600">{{ $task->description }}</p>
                    </div>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-red-500 hover:text-red-700 hover:opacity-80 transition duration-300 ease-in-out font-bold">
                            Delete
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
