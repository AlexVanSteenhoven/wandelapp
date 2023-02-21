<?php

class UserCanGenerateCuidTest extends TestCase
{
    public function testGetCuid()
    {
        $this->get('/api/cuid');

        $data = $this->get('/api/cuid')->response->getContent();
        $obj = json_decode($data);

        if (preg_match('/^[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}$/i', $obj->unique_identifier)) {
            $this->seeJsonEquals([
                'status' => 'Success',
                'unique_identifier' => $obj->unique_identifier
            ])->seeStatusCode(200);
        }
    }
}
