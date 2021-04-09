<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\Empresa;

class SetEmpresaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $slug = preg_replace('/^http(s)?\:\/\/([a-zA-Z0-9\-\_]{1,})\.(.*)/', '$2', url());

        $company = Empresa::where('slug', $slug)->first();

        if (!$company) {
            $website = preg_replace('/^http(s)?\:\/\/([a-zA-Z0-9\-\_\.]{1,})\/?(.*)?/', '$2', url());
            $company = Empresa::where('website', $website)->first();
        }

        return response(['message' => 'Empresa não encontrada!'], 404);

        $request->company = $company;

        return $next($request);
    }
}
