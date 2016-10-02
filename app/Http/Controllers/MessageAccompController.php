<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageAccompCreateRequest;
use App\Http\Requests\MessageAccompUpdateRequest;

use App\Repositories\MessageAccompRepository;

use Illuminate\Http\Request;

class MessageAccompController extends Controller
{

    protected $messageAccompRepository;

    protected $nbrPerPage = 4;

    public function __construct(MessageAccompRepository $messageAccompRepository)
    {
        $this->messageAccompRepository = $messageAccompRepository;
    }

    public function index()
    {
        $messageAccomps = $this->messageAccompRepository->getPaginate($this->nbrPerPage);
        $links = $messageAccomps->render();

        return view('index', compact('messageAccomps', 'links'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(MessageAccompCreateRequest $request)
    {
        $this->setAdmin($request);

        $messageAccomp = $this->messageAccompRepository->store($request->all());

        return redirect('messageAccomp')->withOk("L'utilisateur " . $messageAccomp->name . " a été créé.");
    }

    public function show($id)
    {
        $messageAccomp = $this->messageAccompRepository->getById($id);

        return view('show',  compact('messageAccomp'));
    }

    public function edit($id)
    {
        $messageAccomp = $this->messageAccompRepository->getById($id);

        return view('edit',  compact('messageAccomp'));
    }

    public function update(MessageAccompUpdateRequest $request, $id)
    {
        $this->setAdmin($request);

        $this->messageAccompRepository->update($id, $request->all());

        return redirect('messageAccomp')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }

    public function destroy($id)
    {
        $this->messageAccompRepository->destroy($id);

        return redirect()->back();
    }



}