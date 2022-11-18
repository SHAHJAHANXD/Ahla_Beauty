<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $segment = $request->segment(1);
        if ($segment == 'administrator') {
            return route('admin.login');
        }
        $segment = $request->segment(1);
        if ($segment == 'api') {
            abort(response()->json(
                [
                    'status' => false,
                    'message' => 'Login To Your account!',
                ],
                401
            ));
        }

        if (!$request->expectsJson()) {
            return route('user.login');
        }

    }

}
