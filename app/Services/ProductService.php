<?php


namespace App\Services;


use App\Models\Clients;
use App\Models\Products;
use App\Repositories\Contracts\ProductRepository;

class ProductService
{
    protected $productRepository;


    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function findBy(array $data)
    {
        return $this->productRepository->findBy($data);
    }

    public function save(array $data)
    {
        return $this->productRepository->save($data);
    }

    public function update(array $data)
    {
        $client = Products::findOrFail($data['id']);
        return $this->productRepository->update($client, $data);
    }

    public function destroy($id)
    {
        $client = Products::findOrFail($id);
        return $this->productRepository->delete($client);
    }
}
