<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ListofPharmaceuticalProductsController extends BaseController
{
  public function home()
  {
    return view("ListofPharmaceuticalProducts.home");
  }

  public function getMedicalList()
  {
    return response()->json([
      'name' => 'Abigail',
      'state' => 'CA'
    ]);
  }

}
