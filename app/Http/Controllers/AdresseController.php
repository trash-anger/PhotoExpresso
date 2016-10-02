<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdresseCreateRequest;
use App\Http\Requests\AdresseUpdateRequest;

use App\Repositories\AdresseRepository;

use Illuminate\Http\Request;

class AdresseController extends Controller
{

    protected $adresseRepository;

    protected $nbrPerPage = 4;

    public function __construct(AdresseRepository $adresseRepository)
    {
        $this->adresseRepository = $adresseRepository;
    }

    public function index()
    {
        $adresses = $this->adresseRepository->getPaginate($this->nbrPerPage);
        $links = $adresses->render();

        return view('index', compact('adresses', 'links'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(AdresseCreateRequest $request)
    {
        $this->setAdmin($request);

        $adresse = $this->adresseRepository->store($request->all());

        return redirect('adresse')->withOk("L'utilisateur " . $adresse->name . " a été créé.");
    }

    public function show($id)
    {
        $adresse = $this->adresseRepository->getById($id);

        return view('show',  compact('adresse'));
    }

    public function edit($id)
    {
        $adresse = $this->adresseRepository->getById($id);

        return view('edit',  compact('adresse'));
    }

    public function update(AdresseUpdateRequest $request, $id)
    {
        $this->setAdmin($request);

        $this->adresseRepository->update($id, $request->all());

        return redirect('adresse')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }

    public function destroy($id)
    {
        $this->adresseRepository->destroy($id);

        return redirect()->back();
    }


}