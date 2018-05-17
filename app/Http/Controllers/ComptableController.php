<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComptableRequest;
use App\Http\Requests\UpdateComptableRequest;
use App\Repositories\ComptableRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use App\Models\Comptable;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ComptableController extends AppBaseController
{
    /** @var  ComptableRepository */
    private $comptableRepository;

    public function __construct(ComptableRepository $comptableRepo)
    {
        $this->comptableRepository = $comptableRepo;
    }

    /**
     * Display a listing of the Comptable.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $comptables = Comptable::all();

        return view('comptables.index',compact('comptables', $comptables));
    }

    /**
     * Show the form for creating a new Comptable.
     *
     * @return Response
     */
    public function create()
    {

        return view('comptables.create');
    }

    /**
     * Store a newly created Comptable in storage.
     *
     * @param CreateComptableRequest $request
     *
     * @return Response
     */
    public function store(CreateComptableRequest $request)
    {
        $this->validate($request, [
            'matricule' => 'required',
            'password' => 'required',
            'secret' => 'required'
        ]);
        
        $comptable = new Comptable();

        $comptable->matricule = $request['matricule'];
        $comptable->password = $request['password'];
        $comptable->secret = $request['secret'];
        $comptable->save();
      
        return $comptable;
    }

    /**
     * Display the specified Comptable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comptable = Comptable::find($id);
        var_dump('sh');
        return $comptable;
    }

    /**
     * Show the form for editing the specified Comptable.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $this->validate($request, [
            'matricule' => 'required',
        ]);

        $comptable = Comptable::find($id);
        $comptable->matricule = $request['matricule'];
        var_dump('ed');
        $comptable->save();

        return redirect(route('comptables.index'));
    }

    /**
     * Update the specified Comptable in storage.
     *
     * @param  int              $id
     * @param UpdateComptableRequest $request
     *
     * @return Response
     */
    public function update(UpdateComptableRequest $request, $id)
    {
        $this->validate($request, [
            'matricule' => 'required',
        ]);

        $comptable = Comptable::find($id);

        $comptable->matricule = $request['matricule'];
        var_dump('up');
        $comptable->save();
        return $request->matricule;
    }

    /**
     * Remove the specified Comptable from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comptable = Comptable::find($id);

        $comptable->delete();

        Flash::success('Comptable deleted successfully.');

        return redirect(route('comptables.index'));
    }
}
