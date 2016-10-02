<?php

namespace App\Http\Controllers;

use App\Http\Requests\CodeReductionCreateRequest;
use App\Http\Requests\CodeReductionUpdateRequest;

use App\Repositories\CodeReductionRepository;

use Illuminate\Http\Request;

class CodeReductionController extends Controller
{

    protected $codeReductionRepository;

    protected $nbrPerPage = 4;

    public function __construct(CodeReductionRepository $codeReductionRepository)
    {
        $this->codeReductionRepository = $codeReductionRepository;
    }

    public function index()
    {
        $codeReductions = $this->codeReductionRepository->getPaginate($this->nbrPerPage);
        $links = $codeReductions->render();

        return view('index', compact('codeReductions', 'links'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(CodeReductionCreateRequest $request)
    {
        $this->setAdmin($request);

        $codeReduction = $this->codeReductionRepository->store($request->all());

        return redirect('codeReduction')->withOk("L'utilisateur " . $codeReduction->name . " a été créé.");
    }

    public function show($id)
    {
        $codeReduction = $this->codeReductionRepository->getById($id);

        return view('show',  compact('codeReduction'));
    }

    public function edit($id)
    {
        $codeReduction = $this->codeReductionRepository->getById($id);

        return view('edit',  compact('codeReduction'));
    }

    public function update(CodeReductionUpdateRequest $request, $id)
    {
        $this->setAdmin($request);

        $this->codeReductionRepository->update($id, $request->all());

        return redirect('codeReduction')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }

    public function destroy($id)
    {
        $this->codeReductionRepository->destroy($id);

        return redirect()->back();
    }



}