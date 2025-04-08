<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProviceRepositoriesInterface as ProviceRepositories;
use App\Http\Requests\StoreUserRequest;
class UserController extends Controller
{
    protected $userService;
    protected $proviceRepositories;
    public function __construct(UserService $userService, ProviceRepositories $proviceRepositories) {
        $this->userService = $userService;
        $this->proviceRepositories = $proviceRepositories;
    }
    public function index(){
        $users = $this->userService->paginate();
        // $users = User::paginate(15);
       
        $config=[
            'js'=>[
                'backend/js/plugins/switchery/switchery.js'
            ],
            'css'=>[
                'backend/css/plugins/switchery/switchery.css'
            ],
        ];
        $config['seo'] = config('apps.user');
        $template = 'backend.user.index';
        return view('backend.dashboard.layout',compact(
            'template',
            'config',
            'users'
        ));
    }
    public function create(){
        $provinces = $this->proviceRepositories->all();
        
        $config=[
            'js'=>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js",
            ],
            'css'=>[
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
                'backend/library/location.js',
                "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
            ],
        ];
        $config['seo'] = config('apps.user');
        $template = 'backend.user.create';
        return view('backend.dashboard.layout',compact(
           'template',  
           'config',
           'provinces',
       ));
    }

    public function store(StoreUserRequest $request){
        if($this->userService->create($request)){
            return redirect()->route('user.index')->with('success','Thêm mới thành công');
        }else{
            return redirect()->route('user.index')->with('error','Thêm mới không thành công');
        }
    }

}
