<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = DB::table('tasks')
            ->select('tasks.*', 'users.username')
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->get();

        $users = User::all();
        
        return view('pages.task.index', compact('tasks', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('title', 'content', 'status', 'user_id');
        
        if (!Task::create($data)) {
            return redirect()->back()->withInput()->with('alert', trans('messages.alert.create_error'));
        }

        return redirect()->back()->withInput()->with('alert', trans('messages.alert.create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $users = User::all();

        return view('pages.task.edit', compact('task', 'users')); 
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
        $task = Task::find($id);
        $data = $request->only('title', 'content', 'status', 'user_id');

        if (!$task->update($data)) {
            return redirect()->back()->withInput()->with('alert', trans('messiges.alert.update_error'));
        }

        return redirect()->back()->withInput()->with('alert', trans('messiges.alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($task)
    {
        $task = Task::find($task);

        if (!$task->delete()) {
            return redirect()->back()->withInput()->with('error', trans('messages.alert.delete_error'));
        }

        return redirect()->back()->withInput()->with('alert', trans('messages.alert.delete_success'));
    }
}
