<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Models\Permission;

class CheckRoleHasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
        public function handle($request, Closure $next, $permissionofrole, $guard = null)

    {
        // // dd(Auth::user()->getPermissionsViaRoles());
        // $idpermission=Permission::get('id');
        // // dd($idpermission->toArray());
        // $flag=false;
        // $rolepermission=Auth::user()->getPermissionsViaRoles();
        // foreach($rolepermission as $roleperm){
        //     echo "<pre>";
        //     print_r($roleperm->toArray());
        //     if($idpermission->has($roleperm->id)){
        //         $flag=true;
        //         break;
        //     }
        // }
        // // die;
        // if(! $flag){
        //     return redirect()->route('norole');
        // }
        // return $next($request);

        $authGuard = Auth::guard($guard);

        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $permissionofroles = is_array($permissionofrole)
            ? $permissionofrole
            : explode('|', $permissionofrole);

            // if (! $authGuard->user()->hasAnyRole($roles)) {
            // throw UnauthorizedException::forRoles($roles);
            // }
            foreach ($permissionofroles as $permission) {
                if ($authGuard->user()->can($permission)) {
                    return $next($request);
                }
            }
        throw UnauthorizedException::forPermissions($permissionofroles);

        // return $next($request);
    }
}
