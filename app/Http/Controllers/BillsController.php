<?php

namespace ApiContas\Http\Controllers;

use ApiContas\Criteria\OrderByFieldCriteria;
use Illuminate\Http\Request;

use ApiContas\Http\Requests\BillsCreateRequest;
use ApiContas\Http\Requests\BillsUpdateRequest;
use ApiContas\Repositories\BillsRepository;
use ApiContas\Validators\BillsValidator;


class BillsController extends Controller
{

    /**
     * @var BillsRepository
     */
    protected $repository;

    /**
     * @var BillsValidator
     */
    protected $validator;

    public function __construct(BillsRepository $repository, BillsValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(new OrderByFieldCriteria('id', 'asc'));
        $bills = $this->repository->paginate(5);
        return response()->json([
            'data' => $bills,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BillsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $bill = $this->repository->create($request->all());

        return response()->json([
            'data' => 'Operação realizada com sucesso'
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = $this->repository->find($id);
        return response()->json([
            'data' => $bill,
        ]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = $this->repository->find($id);
        return response()->json([
            'data' => $bill,
        ]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BillsUpdateRequest $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $bill = $this->repository->update($request->all(), $id);
            return response()->json([
                'message' => 'Bills updated.',
                'data' => $request->all()
            ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        return response()->json([
            'message' => 'Bills deleted.',
        ]);

    }
}
