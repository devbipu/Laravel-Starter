<?php

use App\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Request;
use PhpParser\Node\Expr\Cast\Bool_;

/**
 * Custom helper file for app
 */


/**
 * Check the routes active or not by route name
 */
if (!function_exists('is_route_name_active')) {
  function is_route_name_active(...$routeNames): bool
  {
    return in_array(request()->route()->getName(), $routeNames);
  }
}

/**
 * Check route active or not by url/slug
 */
if (!function_exists('is_route_active')) {
  function is_route_active(...$routes): bool
  {
    return Request::is(...$routes);
  }
}


/**
 * Check the user have role and action permission or not by module and action name
 *
 * @param string $module_slug
 * @param string $action
 * @param integer $user_id
 * @return boolean
 */
if (!function_exists('user_have_permission')) {
  function user_have_permission($module_slug, $action, $user_id = null): bool
  {
    if (is_null($user_id)) {
      $user = Auth::user();
    } else {
      $user = User::find($user_id);
    }

    // Check if user is super admin
    if ($user->role && $user->role->super_admin) {
      return true;
    }

    // Check if user has role and permissions
    if (!$user->role || is_null($user->role->permissions)) {
      return false;
    }

    // Check if user has access to the module and action
    return isset($user->role->permissions[$module_slug][$action]) && $user->role->permissions[$module_slug][$action];
  }
}

if (!function_exists('authorize_user')) {

  function authorize_user(...$permissions)
  {
    return Gate::allows($permissions);
  }
}
