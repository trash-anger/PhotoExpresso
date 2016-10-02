<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\ClientUpdateRequest;

use App\Repositories\ClientRepository;

use Illuminate\Http\Request;

class ClientController extends Controller
{

    protected $clientRepository;

    protected $nbrPerPage = 4;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        $clients = $this->clientRepository->getPaginate($this->nbrPerPage);
        $links = $clients->render();

        return view('index', compact('clients', 'links'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(ClientCreateRequest $request)
    {
        $this->setAdmin($request);

        $client = $this->clientRepository->store($request->all());

        return redirect('client')->withOk("L'utilisateur " . $client->name . " a été créé.");
    }

    public function show($id)
    {
        $client = $this->clientRepository->getById($id);

        return view('show',  compact('client'));
    }

    public function edit($id)
    {
        $client = $this->clientRepository->getById($id);

        return view('edit',  compact('client'));
    }

    public function update(ClientUpdateRequest $request, $id)
    {
        $this->setAdmin($request);

        $this->clientRepository->update($id, $request->all());

        return redirect('client')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }



}