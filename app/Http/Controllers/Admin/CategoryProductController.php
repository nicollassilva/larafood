<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function permissions($idProfile)
    {
        $profile = $this->profile->with('permissions')->find($idProfile);

        if(!$profile)
            return redirect()->back();

        $permissions = $profile->permissions;

        return view('admin.pages.profiles.permissions.index', [
            'profile' => $profile,
            'permissions' => $permissions
        ]);
    }

    public function profiles($idPermission)
    {
        if(!$permission = $this->permission->find($idPermission))
            return redirect()->back();

        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profiles.index', [
            'permission' => $permission,
            'profiles' => $profiles
        ]);
    }

    public function permissionsAvailable(Request $request, $idProfile)
    {
        if(!$profile = $this->profile->find($idProfile))
            return redirect()->back();
        
        $filters = $request->except('_token');

        $permissions = $profile->permissionsAvailable($request->filter);

        return view('admin.pages.profiles.permissions.available', [
            'profile' => $profile,
            'permissions' => $permissions,
            'filters' => $filters
        ]);
    }

    public function attachPermissionsProfile(Request $request, $idProfile)
    {
        if(!$profile = $this->profile->find($idProfile))
            return redirect()->back();

        if (!$request->permissions || count($request->permissions) == 0)
            return redirect()
                        ->back()
                        ->with('error', 'Necessário pelo menos 1 campo preenchido.');

        $profile->permissions()->attach($request->permissions);
        
        return redirect()->route('profiles.permissions', $profile->id);
    }

    public function detachPermissionsProfile($idProfile, $idPermission)
    {
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if(!$profile || !$permission)
            return redirect()->back();

        $profile->permissions()->detach($permission);

        return redirect()->route('profiles.permissions', $profile->id);
    }
}
