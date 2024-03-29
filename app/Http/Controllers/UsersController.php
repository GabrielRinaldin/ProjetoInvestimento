<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Bridges\UserService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UsersController extends Controller
{

    protected $repository;
    public function __construct(UserRepository $repository, UserService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        $users = $this->repository->all()->sortBy("name");
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $users,
            ]);
        }

        return view('user.index', compact('users'));
    }

    public function store(UserCreateRequest $request)
    {
        $request = $this->service->store($request->all());
        $usuario = $request['success'] ? $request['data'] : null;

        session()->flash(
            'success',
            [
                'success'  => $request['success'],
                'messages' => $request['messages'],
            ]
        );

        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $user,
            ]);
        }

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->repository->find($id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $request = $this->service->update($request->all(), $id);
        $usuario = $request['success'] ? $request['data'] : null;

        session()->flash(
            'success',
            [
                'success'  => $request['success'],
                'messages' => $request['messages'],
            ]
        );

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        $request = $this->service->destroy($id);


        session()->flash(
            'success',
            [
                'success'  => $request['success'],
                'messages' => $request['messages'],
            ]
        );

        return redirect()->route('user.index');
    }
}
