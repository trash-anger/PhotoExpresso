<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommandeCreateRequest;
use App\Http\Requests\CommandeUpdateRequest;

use App\Repositories\CommandeRepository;

use Illuminate\Http\Request;

class CommandeController extends Controller
{

    protected $commandeRepository;

    protected $nbrPerPage = 4;

    public function __construct(CommandeRepository $commandeRepository)
    {
        $this->commandeRepository = $commandeRepository;
    }

    public function index()
    {
        $commandes = $this->commandeRepository->getPaginate($this->nbrPerPage);
        $links = $commandes->render();

        return view('index', compact('commandes', 'links'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(CommandeCreateRequest $request)
    {
        $this->setAdmin($request);

        $commande = $this->commandeRepository->store($request->all());

        return redirect('commande')->withOk("L'utilisateur " . $commande->name . " a été créé.");
    }

    public function show($id)
    {
        $commande = $this->commandeRepository->getById($id);

        return view('show',  compact('commande'));
    }

    public function edit($id)
    {
        $commande = $this->commandeRepository->getById($id);

        return view('edit',  compact('commande'));
    }

    public function update(CommandeUpdateRequest $request, $id)
    {
        $this->setAdmin($request);

        $this->commandeRepository->update($id, $request->all());

        return redirect('commande')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }

    public function destroy($id)
    {
        $this->commandeRepository->destroy($id);

        return redirect()->back();
    }


}