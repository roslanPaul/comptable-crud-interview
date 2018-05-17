<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePointageRequest;
use App\Http\Requests\UpdatePointageRequest;
use App\Repositories\PointageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Comptable;
use App\Models\Pointage;

class PointageController extends AppBaseController
{
    /** @var  PointageRepository */
    private $pointageRepository;

    public function __construct(PointageRepository $pointageRepo)
    {
        $this->pointageRepository = $pointageRepo;
    }

    /**
     * Display a listing of the Pointage.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pointages = Pointage::all();
        return view('pointages.index',compact('pointages'));
    }

    /**
     * Show the form for creating a new Pointage.
     *
     * @return Response
     */
    public function create()
    {
        $comptables = Comptable::all();
        return view('pointages.create',compact('comptables'));
    }

    /**
     * Store a newly created Pointage in storage.
     *
     * @param CreatePointageRequest $request
     *
     * @return Response
     */
    public function store(CreatePointageRequest $request)
    {
         $this->validate($request, [
            'matricule' => 'required',
            'heure' => 'required',
            'modifier' => 'required',
        ]);
        
        $pointage = new Pointage();

        $pointage->matricule = $request['matricule'];
        $pointage->heure = $request['heure'];
        $pointage->modifier = $request['modifier'];
        $pointage->save();
      
        return redirect(route('pointages.index'));
    }


    /**
     * Display the specified Pointage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pointage = $this->pointageRepository->findWithoutFail($id);

        if (empty($pointage)) {
            Flash::error('Pointage not found');

            return redirect(route('pointages.index'));
        }

        return view('pointages.show')->with('pointage', $pointage);
    }

    /**
     * Show the form for editing the specified Pointage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pointage = $this->pointageRepository->findWithoutFail($id);

        if (empty($pointage)) {
            Flash::error('Pointage not found');

            return redirect(route('pointages.index'));
        }

        return view('pointages.edit')->with('pointage', $pointage);
    }

    /**
     * Update the specified Pointage in storage.
     *
     * @param  int              $id
     * @param UpdatePointageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePointageRequest $request)
    {
        $pointage = $this->pointageRepository->findWithoutFail($id);

        if (empty($pointage)) {
            Flash::error('Pointage not found');

            return redirect(route('pointages.index'));
        }

        $pointage = $this->pointageRepository->update($request->all(), $id);

        Flash::success('Pointage updated successfully.');

        return redirect(route('pointages.index'));
    }

    /**
     * Remove the specified Pointage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pointage = $this->pointageRepository->findWithoutFail($id);

        if (empty($pointage)) {
            Flash::error('Pointage not found');

            return redirect(route('pointages.index'));
        }

        $this->pointageRepository->delete($id);

        Flash::success('Pointage deleted successfully.');

        return redirect(route('pointages.index'));
    }
}
