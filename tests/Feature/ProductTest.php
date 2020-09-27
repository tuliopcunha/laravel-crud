<?php

namespace Tests\Feature;

use App\Models\Products;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * @throws \Throwable
     */
    public function testClients(){
        $this->withoutExceptionHandling();
        $response = $this->get("api/product")->decodeResponseJson();
        $this->assertEquals(0, $response['total']);
    }

    public function testSaveProducts(){
        $this->withoutExceptionHandling();
        $data = $this->mountProductObject();
        $beforeInsert = count(Products::all());
        $this->post("api/product", $data);
        $afterInsert = count(Products::all());
        $this->assertEquals($beforeInsert+1, $afterInsert);
    }

    /**
     * @throws \Throwable
     */
    public function testEditProducts(){
        $this->withoutExceptionHandling();
        $data = $this->mountProductObject();
        $this->post("api/product", $data);
        $filter = ["price", 2.5];
        $response = $this->get("api/product", $filter)->decodeResponseJson();
        $data['id'] = $response['data'][0]['id'];
        $data['description'] = "Test Edition";
        $responseEdition = $this->put("/api/product", $data)->decodeResponseJson();
        $this->assertEquals("Test Edition", $responseEdition['description']);
    }

    /**
     * @throws \Throwable
     */
    public function testDestroyProducts(){
        $this->withoutExceptionHandling();
        $data = $this->mountProductObject();
        $response = $this->post("api/product", $data)->decodeResponseJson();
        $beforeExclusion = count(Products::all());
        $this->delete("/api/product/".$response['id']);
        $afterExclusion = count(Products::all());
        $this->assertEquals($beforeExclusion-1, $afterExclusion);

    }

    private function mountProductObject(){
        $data['description'] = "Product Test";
        $data['price'] = 2.5;
        $data['quantity_inventory'] = 100;
        return $data;
    }
}
