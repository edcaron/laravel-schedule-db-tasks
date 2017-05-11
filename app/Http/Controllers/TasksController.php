<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use Yajra\Datatables\Datatables;
use App\Task;

class TasksController extends Controller
{
    public function index()
	{
		return view('tasks.index');
	}

	public function create()
	{
		return view('tasks.create');
	}

	public function store(TaskRequest $request)
	{
		$task = Task::create($request->all());
		session()->flash('message', 'ok');
		return redirect()->route('tasks.index');
	}

	public function edit($id)
	{
		$task = Task::find($id);
		return view('tasks.create', compact('task'));
	}

	public function update(TaskRequest $request, $id)
	{

		$task = Task::find($id)->update($request->all());
		session()->flash('message', 'ok');
		return redirect()->route('tasks.index');
	}

	public function delete($id)
	{
		Task::find($id)->delete();

		session()->flash('message', 'ok');
		return redirect()->route('tasks.index');
	}

	    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatable(Datatables $datatables)
    {
        return $datatables->eloquent(Task::select('id', 'name', 'command', 'active'))
                          ->make(true);
    }
}
