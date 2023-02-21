<?php

use Illuminate\Http\UploadedFile;

class UserCanUploadFilesTest extends TestCase
{

    public function testIfTheFileExists()
    {
        $file = base_path() . '\storage\route1.gpx';

        $this->assertFileExists($file);
    }

    public function testIfUserCanUploadAGpxFileToTheDatabase()
    {
        $cuid = '29505f3a-b4e4-42b1-9f97-543450482d84';
        $content = file_get_contents(base_path() . '\storage\route1.gpx');

        $method = 'POST';
        $uri = '/api/routes/upload/' . $cuid;


        $files = [
            'route' => UploadedFile::fake()->createWithContent('route1.gpx', $content)
        ];

        $response = $this->call($method, $uri, [], [], $files);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
