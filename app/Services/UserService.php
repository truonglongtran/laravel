<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoriesInterface as UserRepositories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

    /**
     *Class UserService 
     * @package App\Services
     */
class UserService implements UserServiceInterface
{
    protected  $usersRepository;
   public function __construct(userRepositories $usersRepository) {
        $this->usersRepository = $usersRepository;

   }
   public function paginate(){
        $users = $this->usersRepository->getAllPaginate();
        return $users; 
   }

   public function create($request){
     DB::beginTransaction();
            try {
               $payload = $request->except('_token','send','re-password'); ;
               $carbonDate = Carbon::createFromFormat('Y-m-d', $payload['birthday']);
               $payload['birthday'] = $carbonDate->format('Y-m-d H:i:s');
               $payload['password'] = Hash::make($payload['password']);
               $user = $this->usersRepository->create($payload);
               DB::commit();
               return $user;
            } catch (\Exception $e) {
               DB::rollBack();
               throw $e;
            }
   }
}
