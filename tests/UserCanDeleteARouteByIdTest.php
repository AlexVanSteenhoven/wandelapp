<?php

use App\Models\Route;
use Illuminate\Support\Facades\DB;

class UserCanDeleteARouteByIdTest extends TestCase
{
    public function testIfUserCanDeleteARouteById()
    {
        $id = 1;
        $cuid ='29505f3a-b4e4-42b1-9f97-543450482d84';

        $routesByCuid = Route::where([
            ['id', '=', $id],
            ['cuid', '=', $cuid]
        ]);

        if ($routesByCuid->delete()) {
            $response = $this->delete('/api/routes/delete/' . $id . '/' . $cuid);
            $response->assertResponseOk();
            DB::statement('ALTER TABLE routes AUTO_INCREMENT=1;');
        }
    }
}
