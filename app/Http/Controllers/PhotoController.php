<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoCreateRequest;
use App\Http\Requests\PhotoUpdateRequest;

use App\Repositories\PhotoRepository;

use Illuminate\Http\Request;

class PhotoController extends Controller
{

    protected $photoRepository;

    protected $nbrPerPage = 4;

    public function __construct(PhotoRepository $photoRepository)
    {
        $this->photoRepository = $photoRepository;
    }

    public function index()
    {
        $photos = $this->photoRepository->getPaginate($this->nbrPerPage);
        $links = $photos->render();

        return view('index', compact('photos', 'links'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(PhotoCreateRequest $request)
    {
        $this->setAdmin($request);

        $photo = $this->photoRepository->store($request->all());

        return redirect('photo')->withOk("L'utilisateur " . $photo->name . " a été créé.");
    }

    public function show($id)
    {
        $photo = $this->photoRepository->getById($id);

        return view('show',  compact('photo'));
    }

    public function edit($id)
    {
        $photo = $this->photoRepository->getById($id);

        return view('edit',  compact('photo'));
    }

    public function update(PhotoUpdateRequest $request, $id)
    {
        $this->setAdmin($request);

        $this->photoRepository->update($id, $request->all());

        return redirect('photo')->withOk("L'utilisateur " . $request->input('name') . " a été modifié.");
    }

    public function destroy($id)
    {
        $this->photoRepository->destroy($id);

        return redirect()->back();
    }



}