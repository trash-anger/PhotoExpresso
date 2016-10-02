<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageCreateRequest;
use App\Http\Requests\MessageUpdateRequest;

use App\Repositories\MessageRepository;

use Illuminate\Http\Request;

class MessageController extends Controller
{

    protected $messageRepository;

    protected $nbrPerPage = 4;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function index()
    {
        $messages = $this->messageRepository->getPaginate($this->nbrPerPage);
        $links = $messages->render();

        return view('index', compact('messages', 'links'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(MessageCreateRequest $request)
    {
        $this->setAdmin($request);

        $message = $this->messageRepository->store($request->all());

        return redirect('message')->withOk("L'utilisateur " . $message->name . " a été créé.");
    }

    public function show($id)
    {
        $message = $this->messageRepository->getById($id);

        return view('show',  compact('message'));
    }

    public function edit($id)
    {
        $message = $this->messageRepository->getById($id);

        return view('edit',  compact('message'));
    }

    public function update(MessageUpdateRequest $request, $id)
    {
        $this->setAdmin($request);

        $this->messageRepository->update($id, $request->all());

        return redirect('message')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }

    public function destroy($id)
    {
        $this->messageRepository->destroy($id);

        return redirect()->back();
    }



}