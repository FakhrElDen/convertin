<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with(['admin', 'user'])->get();
        return view('tasks', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::role('user')->get();
        $admins = User::role('admin')->get();
        return view('create_task', compact('users', 'admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin_role_id = Role::where('name', 'admin')->first()->id;
        $user_role_id = Role::where('name', 'user')->first()->id;
        $task = $request->validate([
            'assigned_by_id' => 'required|exists:model_has_roles,model_id,role_id,'.$admin_role_id,
            'assigned_to_id' => 'required|exists:model_has_roles,model_id,role_id,'.$user_role_id,
            'title' => 'required|max:255',
            'description' => 'required',
        ]);
        Task::create($task);
        User::where('id', $request->assigned_to_id)->increment('tasks_number');
        return redirect(route('tasks'));
    }

    public function statistics()
    {
        $users = User::role('user')
            ->where('tasks_number', '>', 0)
            ->orderBy('tasks_number', 'asc')
            ->with('userTasks')
            ->get();
        return view('statistics', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
