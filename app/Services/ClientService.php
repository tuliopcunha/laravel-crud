<?php


namespace App\Services;


use App\Models\Clients;
use App\Repositories\Contracts\ClientRepository;

class ClientService
{
    protected $clientRepository;


    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function findBy(array $data)
    {
        return $this->clientRepository->findBy($data);
    }

    public function save(array $data)
    {
        return $this->clientRepository->save($data);
    }

    public function update(array $data)
    {
        $client = Clients::findOrFail($data['id']);
        return $this->clientRepository->update($client, $data);
    }

    public function destroy($id)
    {
        $client = Clients::findOrFail($id);
        return $this->clientRepository->delete($client);
    }
}
