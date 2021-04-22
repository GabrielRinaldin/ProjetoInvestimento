<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\InstituitionCreateRequest;
use App\Http\Requests\InstituitionUpdateRequest;
use App\Repositories\InstituitionRepository;
use App\Validators\InstituitionValidator;
use App\Bridges\InstituitionService;

/**
 * Class InstituitionsController.
 *
 * @package namespace App\Http\Controllers;
 */
class InstituitionsController extends Controller
{
    protected $repository;
    protected $validator;

    public function __construct(InstituitionRepository $repository, InstituitionValidator $validator, InstituitionService $service)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
    }

    public function index()
    {
        
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $instituitions = $this->repository->all()->sortBy("name");

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $instituitions,
            ]);
        }

        return view('instituitions.index', compact('instituitions'));
    }

    public function store(InstituitionCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $instituition = $request['success'] ? $request['data'] : null;

        session()->flash(
            'success',
            [
                'success'  => $request['success'],
                'messages' => $request['messages'],
            ]
        );

        return redirect()->route('instituition.index');
    }

    public function show($id)
    {
        
        $instituition = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $instituition,
            ]);
        }

        return view('instituitions.show', compact('instituition'));
    }

    public function edit($id)
    {
        $instituition = $this->repository->find($id);

        return view('instituitions.edit', compact('instituition'));
    }

    public function update(Request $request, $id)
    {
        $request = $this->service->update($request->all(), $id);
        $instituition = $request['success'] ? $request['data'] : null;

        session()->flash(
            'success',
            [
                'success'  => $request['success'],
                'messages' => $request['messages'],
            ]
        );

        return redirect()->route('instituition.index');
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->route('instituition.index');
    }
}
