<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users']  = User::with('role')->latest()->paginate(20);
        return view('pages.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['roles'] = Role::active()->get();
        //
        return view('pages.users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'role_id'       => 'required',
            'email'         => 'required|email',
            'password'      => 'required',
            'phone_number'  => 'nullable',
            'dob'           => 'nullable',
            'employee_id'   => 'required|integer',
        ]);

        try {
            $inputs = $request->except('_token');
            User::create($inputs);
            flash()->addSuccess('User Added successfully');
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            //throw $th;
            flash()->addError($th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = User::findOrFail($id);
        $data['roles'] = Role::active()->get();
        return view('pages.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'role_id'       => 'required',
            'email'         => 'required|email',
            'password'      => 'nullable',
            'phone_number'  => 'nullable',
            'dob'           => 'nullable',
            'employee_id'   => 'required|unique:users,employee_id,' . $id,
        ]);
        try {
            $inputs = array_filter($request->except('_token'));

            \Log::info($inputs);
            $user  = User::find($id);

            $user->update($inputs);
            flash()->addSuccess('User Updated successfully');
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            //throw $th;
            flash()->addError($th->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
