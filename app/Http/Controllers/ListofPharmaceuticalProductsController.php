<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\MedicalList;
use App\User;

class ListofPharmaceuticalProductsController extends BaseController
{
  public function home()
  {
    return view("ListofPharmaceuticalProducts.home");
  }

  public function getMedicalList(Request $request)
  {
    $sortname = $request->input('sort[0][field]','name');

    $sortdir = $request->input('sort[0][dir]','asc');

    if(strtolower($sortname) == 'medicine_name')
      $sortname = 'name';


    $querySet = \App\MedicalList::where([
        ['reimbursible','<>',''],
        ['reimbursible','<>','REJECTED']
      ])
        ->orderBy($sortname, $sortdir)
        ->get();

      $items = array();

    foreach ($querySet as $item) {
      $items[] = [
            'ID'=> $item->id,
            'MEDICINE_NAME'=> $item->name,
            'COMPOSITION'=> $item->composition,
            'APP_DATE'=> $item->updated_at->format('d/m/Y'),
            'LINK'=> $item->link,
            'REIMBURSIBLE'=> $item->reimbursible,
            'COMMENTS'=> $item->comments,
            'USAGE'=> $item->usage
      ];
    }

    $response = [
            'total'=> $querySet->count(),
            'results'=> $items
        ];

    return response()->json($response);
  }

  public function getMedicalListDoctor(Request $request)
  {

    $sortname = $request->input('sort[0][field]','name');

    $sortdir = $request->input('sort[0][dir]','asc');

    if(strtolower($sortname) == 'medicine_name')
      $sortname = 'name';

    $querySet = \App\MedicalList::where(function ($query) {
      $query->where('reimbursible', '=', '')
        ->orWhereNull('reimbursible');
      })
      ->orderBy($sortname, $sortdir)
      ->get();

    $items = array();

    foreach ($querySet as $item) {
      $items[] = [
        'ID'=> $item->id,
        'MEDICINE_NAME'=> $item->name,
        'COMPOSITION'=> $item->composition,
        'APP_DATE'=> $item->created_at->format('d/m/Y'),
        'LINK'=> $item->link,
        'REIMBURSIBLE'=> $item->reimbursible,
        'COMMENTS'=> $item->comments,
        'USAGE'=> $item->usage,
        'REQUESTED_BY'=>  $item->user->first_name.' '.$item->user->last_name
      ];
    }

    $response = [
      'total'=> $querySet->count(),
      'results'=> $items
    ];

    return response()->json($response);
  }

  public function UpdateMedicalList(Request $request){
    $response = [
      'ERROR'=> FALSE,
      'TEXT'=> 'success'
    ];

    $_id = $request->input('ID',0);

    $obj = \App\MedicalList::findOrFail($_id);

    $name = $request->input('MEDICINE_NAME', '');
    $usage = $request->input('USAGE', '');
    $composition = $request->input('COMPOSITION', '');
    $comments = $request->input('COMMENTS', '');
    $link = $request->input('LINK', '');
    $reimbursible = $request->input('REIMBURSIBLE', '');

    $obj->name = $name;
    $obj->usage = $usage;
    $obj->composition = $composition;
    $obj->comments = $comments;
    $obj->link = $link;
    $obj->reimbursible = $reimbursible;
    $obj->save();

    return response()->json($response);

  }

  public function CreateMedicalList(Request $request){
    $response = [
      'ERROR'=> FALSE,
      'TEXT'=> 'success'
    ];

    $obj = new MedicalList;

    $name = $request->input('MEDICINE_NAME', '');
    $usage = $request->input('USAGE', '');
    $composition = $request->input('COMPOSITION', '');
    $comments = $request->input('COMMENTS', '');
    $link = $request->input('LINK', '');
    $reimbursible = '';

    $obj->name = $name;
    $obj->usage = $usage;
    $obj->composition = $composition;
    $obj->comments = $comments;
    $obj->link = $link;
    $obj->reimbursible = $reimbursible;
    $obj->requested_by = Auth::user()->id;
    $obj->save();

    return response()->json($response);

  }

}
