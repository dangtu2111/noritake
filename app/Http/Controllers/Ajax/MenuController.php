<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\MenuServiceInterface as MenuService;



class MenuController extends Controller
{
    
    protected $menuService;

    public function __construct(
        MenuService $menuService,
      
    ){
        $this->menuService = $menuService;
    }

  

   public function drag(Request $request){
    $json=json_decode($request->string('json'),TRUE);
   
    $flag=$this->menuService->dragUpdate($json);

   }

}