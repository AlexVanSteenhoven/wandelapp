<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

/**
 * Class HealthController
 * @package App\Http\Controllers
 */
class HealthController extends Controller
{
    /** @return JsonResponse */
    public function index(): JsonResponse
    {
        if(fsockopen(env('APP_URL' . '8000', 'localhost:8000'))) {
            $webserver = [
                'server' => 'Production Server',
                'status' => 'The webserver is OK!'
            ];

        } else {
            $webserver = [
                'server' => 'Production Server',
                'status' => 'The webserver is down!'
            ];

        }

        if(fsockopen(env('APP_URL' . '3306', 'localhost:3306'))) {
            $database = [
                'server' => 'Database Server',
                'status' => 'The database server is OK!'
            ];

        } else {
            $database = [
                'server' => 'Production Server',
                'status' => 'The database server is down!'
            ];

        }

//        if(fsockopen(env('APP_URL' . '8000', 'localhost:8000'))) {
//            $backup = [
//                'server' => 'Backup Server',
//                'status' => 'The backup server is OK!'
//            ];
//
//        } else {
//            $backup = [
//                'server' => 'Production Server',
//                'status' => 'The backup server is down!'
//            ];
//
//        }

        $data = [
            'servers' => [

            ]
        ];

        array_push($data['servers'], $webserver);
        array_push($data['servers'], $database);
//        array_push($data['servers'], $backup);


        return response()->json($data);

    }

}
