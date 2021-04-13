<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\GroupCreateRequest;
use App\Http\Requests\GroupUpdateRequest;
use App\Repositories\GroupRepository;
use App\Repositories\InstituitionRepository;
use App\Repositories\UserRepository;
use App\Validators\GroupValidator;
use App\Bridges\GroupService;
use App\Entities\Group;

/**
 * Class GroupsController.
 *
 * @package namespace App\Http\Controllers;
 */
class GroupsController extends Controller
{
    protected $repository;
    protected $validator;
    protected $service;
    protected $instituitionRepository;
    protected $userRepository;

    public function __construct(GroupRepository $repository, GroupValidator $validator, GroupService $service, InstituitionRepository $instituitionRepository, UserRepository $userRepository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->service  = $service;
        $this->instituitionRepository  = $instituitionRepository;
        $this->userRepository  = $userRepository;
    }

    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $groups = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $groups,
            ]);
        }

        $user_list = $this->userRepository->selectBoxList();
        $instituition_list = $this->instituitionRepository->selectBoxList();
        return view(
            'groups.index',
            compact('groups'),
            [
                'user_list' => $user_list,
                'instituition_list' => $instituition_list,
            ]
        );
    }

    public function store(GroupCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $group = $request['success'] ? $request['data'] : null;

        session()->flash(
            'success',
            [
                'success'  => $request['success'],
                'messages' => $request['messages'],
            ]
        );

        return redirect()->route('group.index');
    }

    public function userStore(Request $request, $group_id)
    {
        $request = $this->service->userStore($group_id, $request->all());

        session()->flash(
            'success',
            [
                'success'  => $request['success'],
                'messages' => $request['messages'],
            ]
        );

        return redirect()->route('group.show', [$group_id]);
    }

    public function show($id)
    {   
        $group = $this->repository->find($id);
        $user_list = $this->userRepository->selectBoxList();

        return view(
            'groups.show',
            compact('group'),
            ['user_list' => $user_list]
        );
    }

    public function edit($id)
    {
        $group = Group::find($id);
        $user_list = $this->userRepository->selectBoxList();
        $instituition_list = $this->instituitionRepository->selectBoxList();

        return view(
            'groups.edit',
            compact('group'),
            [
                'user_list' => $user_list,
                'instituition_list' => $instituition_list
            ]
        );
    }

    public function update(Request $request, $group_id)
    {
        $request = $this->service->update((int)$group_id, $request->all());

        session()->flash(
            'success',
            [
                'success'  => $request['success'],
                'messages' => $request['messages'],
            ]
        );

        return redirect()->route('group.index');
    }

    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);
        return redirect()->route('group.index');
    }
}
