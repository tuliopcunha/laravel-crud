<?php

namespace Tests\Feature;

use App\Models\Clients;
use Tests\TestCase;

class ClientTest extends TestCase
{

    /**
     * @throws \Throwable
     */
    public function testClients(){
        $this->withoutExceptionHandling();
        $response = $this->get("api/client")->decodeResponseJson();
        $this->assertEquals(0, $response['total']);
    }

    public function testSaveClients(){
        $this->withoutExceptionHandling();
        $data = $this->mountClientObject();
        $beforeInsert = count(Clients::all());
        $this->post("api/client", $data);
        $afterInsert = count(Clients::all());
        $this->assertEquals($beforeInsert+1, $afterInsert);
    }

    /**
     * @throws \Throwable
     */
    public function testEditClients(){
        $this->withoutExceptionHandling();
        $data = $this->mountClientObject();
        $this->post("api/client", $data);
        $filter = ["cpf", "123"];
        $response = $this->get("api/client", $filter)->decodeResponseJson();
        $data['id'] = $response['data'][0]['id'];
        $data['name'] = "Test Edition";
        $responseEdition = $this->put("/api/client", $data)->decodeResponseJson();
        $this->assertEquals("Test Edition", $responseEdition['name']);
    }

    /**
     * @throws \Throwable
     */
    public function testDestroyClients(){
        $this->withoutExceptionHandling();
        $data = $this->mountClientObject();
        $response = $this->post("api/client", $data)->decodeResponseJson();
        $beforeExclusion = count(Clients::all());
        $this->delete("/api/client/".$response['id']);
        $afterExclusion = count(Clients::all());
        $this->assertEquals($beforeExclusion-1, $afterExclusion);

    }

    private function mountClientObject(){
        $data['name'] = "Client Test";
        $data['cpf'] = "123";
        $data['telephone'] = "123456798";
        return $data;
    }
}
