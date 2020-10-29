<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;


class UserService
{   
    private $repository;
    private $validator;

    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function store($data)
    {
        try
        {
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $usuario = $this->repository->create($data);

            return 
            [
                'success' => true,
                'messages' => "Usuário cadastrado",
                'data' => $usuario,
            ];
        }
        catch(\Exception $e)
        {
            switch(get_class($e))
            {
                case QueryException::class : return $e->getMessage();
                case ValidatorException::class : return $e->getMessageBag();
                case Exception::class : return $e->getMessage();
                default;
            }
            return 
            [
            'success' => false,
            'messages' =>$e->getMessageBag(),
        ];
        }
    }
    
    public function update()
    {

    }
    public function delete()
    {

    }

}