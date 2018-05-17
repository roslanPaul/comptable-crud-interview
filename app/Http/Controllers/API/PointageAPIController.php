<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePointageAPIRequest;
use App\Http\Requests\API\UpdatePointageAPIRequest;
use App\Models\Pointage;
use App\Repositories\PointageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PointageController
 * @package App\Http\Controllers\API
 */

class PointageAPIController extends AppBaseController
{
    /** @var  PointageRepository */
    private $pointageRepository;

    public function __construct(PointageRepository $pointageRepo)
    {
        $this->pointageRepository = $pointageRepo;
    }

    /**
     * Display a listing of the Pointage.
     * GET|HEAD /pointages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pointageRepository->pushCriteria(new RequestCriteria($request));
        $this->pointageRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pointages = $this->pointageRepository->all();

        return $this->sendResponse($pointages->toArray(), 'Pointages retrieved successfully');
    }

    /**
     * Store a newly created Pointage in storage.
     * POST /pointages
     *
     * @param CreatePointageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePointageAPIRequest $request)
    {
        $input = $request->all();

        $pointages = $this->pointageRepository->create($input);

        return $this->sendResponse($pointages->toArray(), 'Pointage saved successfully');
    }

    /**
     * Display the specified Pointage.
     * GET|HEAD /pointages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pointage $pointage */
        $pointage = $this->pointageRepository->findWithoutFail($id);

        if (empty($pointage)) {
            return $this->sendError('Pointage not found');
        }

        return $this->sendResponse($pointage->toArray(), 'Pointage retrieved successfully');
    }

    /**
     * Update the specified Pointage in storage.
     * PUT/PATCH /pointages/{id}
     *
     * @param  int $id
     * @param UpdatePointageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePointageAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pointage $pointage */
        $pointage = $this->pointageRepository->findWithoutFail($id);

        if (empty($pointage)) {
            return $this->sendError('Pointage not found');
        }

        $pointage = $this->pointageRepository->update($input, $id);

        return $this->sendResponse($pointage->toArray(), 'Pointage updated successfully');
    }

    /**
     * Remove the specified Pointage from storage.
     * DELETE /pointages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pointage $pointage */
        $pointage = $this->pointageRepository->findWithoutFail($id);

        if (empty($pointage)) {
            return $this->sendError('Pointage not found');
        }

        $pointage->delete();

        return $this->sendResponse($id, 'Pointage deleted successfully');
    }
}
