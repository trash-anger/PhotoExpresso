<?php

namespace App\Http\Controllers;

use App\Http\Requests\FraisPortCreateRequest;
use App\Http\Requests\FraisPortUpdateRequest;

use App\Repositories\FraisPortRepository;

use Illuminate\Http\Request;

class FraisPortController extends Controller
{

    protected $fraisPortRepository;

    protected $nbrPerPage = 4;

    public function __construct(FraisPortRepository $fraisPortRepository)
    {
        $this->fraisPortRepository = $fraisPortRepository;
    }

    public function index()
    {
        $fraisPorts = $this->fraisPortRepository->getPaginate($this->nbrPerPage);
        $links = $fraisPorts->render();

        return view('index', compact('fraisPorts', 'links'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(FraisPortCreateRequest $request)
    {
        $this->setAdmin($request);

        $fraisPort = $this->fraisPortRepository->store($request->all());

        return redirect('fraisPort')->withOk("L'utilisateur " . $fraisPort->name . " a été créé.");
    }

    public function show($id)
    {
        $fraisPort = $this->fraisPortRepository->getById($id);

        return view('show',  compact('fraisPort'));
    }

    public function edit($id)
    {
        $fraisPort = $this->fraisPortRepository->getById($id);

        return view('edit',  compact('fraisPort'));
    }

    public function update(FraisPortUpdateRequest $request, $id)
    {
        $this->setAdmin($request);

        $this->fraisPortRepository->update($id, $request->all());

        return redirect('fraisPort')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }

    public function destroy($id)
    {
        $this->fraisPortRepository->destroy($id);

        return redirect()->back();
    }


}