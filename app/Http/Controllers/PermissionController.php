<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['roles']              = Role::noSuperAdmin()->where('status', 1)->get();
        $data['permissions']        = Permission::get();
        $data['role_permissions']   = $request->get('role_id') ? Role::find($request->get('role_id'))->permissions : [];
        return view('pages.permission.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required',
            'actions'        => 'required'
        ]);
        try {
            if (Permission::where('slug', Str::slug($request->name, '-'))->exists()) {
                flash()->addError("Module " . $request->name . " Already Exist");
                return redirect()->back();
            }
            $permission         = new Permission();
            $permission->name   = $request->name;
            $permission->slug   = $request->name;
            $permission->values = Permission::make_permission_array($permission->slug, explode(',', $request->actions));
            $permission->created_by = Auth::user()->id;
            $permission->save();

            flash()->addSuccess('Permission Added successfully');
            return redirect()->route('permissions.index');
        } catch (\Throwable $th) {
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
    public function edit(Permission $permission)
    {
        return view('pages.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'       => 'required',
            'actions'    => 'required',
        ]);
        try {
            $permission         = Permission::find($id);
            $permission->name   = $request->name;
            $permission->slug   = $request->name;
            $permission->values = Permission::make_permission_array($permission->slug, explode(',', $request->actions));
            $permission->created_by = Auth::user()->id;
            $permission->update();

            flash()->addSuccess('Permission Updated Successfully');
            return redirect()->route('permissions.index');
        } catch (\Throwable $th) {
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

    public function permissionSet(Request $request)
    {
        $request->validate([
            'roleid'    => 'required'
        ]);

        $permissions = Permission::get();
        $role_permission = [];
        foreach ($permissions as $permission) {
            if ($request->input($permission->slug)) {
                $role_permission[$permission->slug] = array_map(function ($value) {
                    return $value === '1' ? true : false;
                }, $request->input($permission->slug));
            }
        }
        try {
            $role = Role::find($request->roleid);
            $role->permissions = $role_permission;
            $role->update();
            flash()->addSuccess('Permission saved successfully');
        } catch (\Throwable $th) {
            flash()->addError($th->getMessage());
        }

        return redirect()->route('permissions.index', ['role_id' => $request->roleid]);
    }
}
