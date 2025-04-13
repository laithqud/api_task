<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        return $request->user()->todos;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        return $request->user()->todos()->create($request->all());
    }

    public function update(Request $request, Todo $todo)
    {
        $this->authorize('update', $todo);

        $request->validate([
            'title' => 'string',
            'description' => 'nullable|string',
            'is_completed' => 'boolean',
        ]);

        $todo->update($request->all());
        return $todo;
    }

    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);
        $todo->delete();
        return response()->noContent();
    }
}