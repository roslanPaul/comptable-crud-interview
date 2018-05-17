<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateComptableAPIRequest;
use App\Http\Requests\API\UpdateComptableAPIRequest;
use App\Models\Comptable;
use App\Repositories\ComptableRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ComptableController
 * @package App\Http\Controllers\API
 */

class ComptableAPIController extends AppBaseController
{
    /** @var  ComptableRepository */
    private $comptableRepository;

    public function __construct(ComptableRepository $comptableRepo)
    {
        $this->comptableRepository = $comptableRepo;
    }

    /**
     * Display a listing of the Comptable.
     * GET|HEAD /comptables
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->comptableRepository->pushCriteria(new RequestCriteria($request));
        $this->comptableRepository->pushCriteria(new LimitOffsetCriteria($request));
        $comptables = $this->comptableRepository->all();

        return $this->sendResponse($comptables->toArray(), 'Comptables retrieved successfully');
    }

    /**
     * Store a newly created Comptable in storage.
     * POST /comptables
     *
     * @param CreateComptableAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateComptableAPIRequest $request)
    {
        $input = $request->all();

        $comptables = $this->comptableRepository->create($input);

        return $this->sendResponse($comptables->toArray(), 'Comptable saved successfully');
    }

    /**
     * Display the specified Comptable.
     * GET|HEAD /comptables/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Comptable $comptable */
        $comptable = $this->comptableRepository->findWithoutFail($id);

        if (empty($comptable)) {
            return $this->sendError('Comptable not found');
        }

        return $this->sendResponse($comptable->toArray(), 'Comptable retrieved successfully');
    }

    /**
     * Update the specified Comptable in storage.
     * PUT/PATCH /comptables/{id}
     *
     * @param  int $id
     * @param UpdateComptableAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateComptableAPIRequest $request)
    {
        $input = $request->all();

        /** @var Comptable $comptable */
        $comptable = $this->comptableRepository->findWithoutFail($id);

        if (empty($comptable)) {
            return $this->sendError('Comptable not found');
        }

        $comptable = $this->comptableRepository->update($input, $id);

        return $this->sendResponse($comptable->toArray(), 'Comptable updated successfully');
    }

    /**
     * Remove the specified Comptable from storage.
     * DELETE /comptables/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Comptable $comptable */
        $comptable = $this->comptableRepository->findWithoutFail($id);

        if (empty($comptable)) {
            return $this->sendError('Comptable not found');
        }

        $comptable->delete();

        return $this->sendResponse($id, 'Comptable deleted successfully');
    }
}
