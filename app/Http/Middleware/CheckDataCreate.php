<?php

namespace App\Http\Middleware;

use App\Models\Guru;
use App\Models\Perusahaan;
use App\Models\Siswa;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckDataCreate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $a = Siswa::where('user_id', Auth::user()->id)->get();
        $b = Guru::where('user_id', Auth::user()->id)->get();
        $c = Perusahaan::where('user_id', Auth::user()->id)->get();
        // dd($);

        if ($a->count() > 0 || $b->count() > 0 || $c->count() > 0) {
            abort(403);
        }
        return $next($request);
    }
}
