<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Yajra\Datatables\Datatables;
use App\User;

class UsersController extends Controller
{
    public function index()
	{
		return view('users.index');
	}

	public function create()
	{
		return view('users.create');
	}

	public function store(UserRequest $request)
	{
		$request['password'] = bcrypt($request['password']);
		$user = User::create($request->all());
		session()->flash('message', 'ok');
		return redirect()->route('users.index');
	}

	public function edit($id)
	{
		$user = User::find($id);
		return view('users.create', compact('user'));
	}

	public function update(UserRequest $request, $id)
	{
		$request['password'] = bcrypt($request['password']);
		$user = User::find($id)->update($request->all());
		session()->flash('message', 'ok');
		return redirect()->route('users.index');
	}

	public function delete($id)
	{
		User::find($id)->delete();

		session()->flash('message', 'ok');
		return redirect()->route('users.index');
	}

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function datatable(Datatables $datatables)
    {
        return $datatables->eloquent(User::select('id', 'name', 'email'))
                          ->make(true);
    }
}
