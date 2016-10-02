<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormatCreateRequest;
use App\Http\Requests\FormatUpdateRequest;

use App\Repositories\FormatRepository;

use Illuminate\Http\Request;

class FormatController extends Controller
{

    protected $formatRepository;

    protected $nbrPerPage = 4;

    public function __construct(FormatRepository $formatRepository)
    {
        $this->formatRepository = $formatRepository;
    }

    public function index()
    {
        $formats = $this->formatRepository->getPaginate($this->nbrPerPage);
        $links = $formats->render();

        return view('index', compact('formats', 'links'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(FormatCreateRequest $request)
    {
        $this->setAdmin($request);

        $format = $this->formatRepository->store($request->all());

        return redirect('format')->withOk("L'utilisateur " . $format->name . " a été créé.");
    }

    public function show($id)
    {
        $format = $this->formatRepository->getById($id);

        return view('show',  compact('format'));
    }

    public function edit($id)
    {
        $format = $this->formatRepository->getById($id);

        return view('edit',  compact('format'));
    }

    public function update(FormatUpdateRequest $request, $id)
    {
        $this->setAdmin($request);

        $this->formatRepository->update($id, $request->all());

        return redirect('format')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }

    public function destroy($id)
    {
        $this->formatRepository->destroy($id);

        return redirect()->back();
    }



}