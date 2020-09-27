<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    protected $repository;
    protected $service;

    /**
     * ProductsController constructor.
     * @param ProductRepository $repository
     * @param ProductService $service
     */
    public function __construct(ProductRepository $repository, ProductService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function findBy(Request $request){
        return $this->service->findBy($request->all());
    }

    public function save(Request $request){
        return $this->service->save($request->all());
    }

    public function update(Request $request){
        return $this->service->update($request->all());
    }

    public function destroy($id){
        return $this->service->destroy($id);
    }
}
