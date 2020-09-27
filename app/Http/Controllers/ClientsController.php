<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ClientRepository;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    protected $repository;
    protected $service;

    /**
     * ClientsController constructor.
     * @param ClientRepository $repository
     * @param ClientService $service
     */
    public function __construct(ClientRepository $repository, ClientService $service)
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
