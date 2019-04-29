<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {        
        if (Auth::user()->hasPermissionTo('Administer roles & permissions')) //If user has this //permission
    {
            return $next($request);
        }

        if ($request->is('posts/create'))//If user is creating a post
         {
            if (!Auth::user()->hasPermissionTo('Create Post'))
         {
                abort('401');
            } 
         else {
                return $next($request);
            }
        }

        if ($request->is('posts/*/edit')) //If user is editing a post
         {
            if (!Auth::user()->hasPermissionTo('Edit Post')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
         {
            if (!Auth::user()->hasPermissionTo('Delete Post')) {
                abort('401');
            } 
         else 
         {
                return $next($request);
            }
        }
        if ($request->is('sectors/create'))//If user is creating a sector
         {
            if (!Auth::user()->hasPermissionTo('Create Sector'))
         {
                abort('401');
            } 
         else {
                return $next($request);
            }
        }
        if ($request->is('sectors/*/edit')) //If user is editing a sector
         {
            if (!Auth::user()->hasPermissionTo('Edit Sector')) {
                abort('401');
            } else {
                return $next($request);
            }
        }
        if ($request->isMethod('Delete')) //If user is deleting a sector
         {
            if (!Auth::user()->hasPermissionTo('Delete Sector')) {
                abort('401');
            } 
         else 
         {
                return $next($request);
            }
        }
        if ($request->is('activity/create'))//If user is creating a activity
         {
            if (!Auth::user()->hasPermissionTo('Create Activity'))
         {
                abort('401');
            } 
         else {
                return $next($request);
            }
        }
        if ($request->is('activity/*/edit'))//If user is editing a activity
         {
            if (!Auth::user()->hasPermissionTo('Edit Activity'))
         {
                abort('401');
            } 
         else {
                return $next($request);
            }
        }
        if ($request->isMethod('Delete')) //If user is deleting a activity
         {
            if (!Auth::user()->hasPermissionTo('Delete Activity')) {
                abort('401');
            } 
         else 
         {
                return $next($request);
            }
        }
        if ($request->is('tasks/create'))//If user is creating task
         {
            if (!Auth::user()->hasPermissionTo('Create Task'))
         {
                abort('401');
            } 
         else {
                return $next($request);
            }
        }
        if ($request->is('tasks/*/edit')) //if user is editing a task
        {
            if (!Auth::user()->hasPermissionTo('Edit Task'))
            {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }
        if ($request->isMethod('Delete')) //if user is deleting a task
        {
            if (!Auth::user()->hasPermissionTo('Delete Task'))
            {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }
        if ($request->is('contractors/create')) //if user is creating a contractor
        {
            if (!Auth::user()->hasPermissionTo('Create Contractor'))
            {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }
        if ($request->is('contractors/*/edit')) //if user is editing a contractor
        {
            if (!Auth::user()->hasPermissionTo('Edit Contractor'))
            {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }
        if ($request->isMethod('Delete')) //if user is deleting a contractor
        {
            if (!Auth::user()->hasPermissionTo('Delete Contractor'))
            {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }

        return $next($request);
    }
}