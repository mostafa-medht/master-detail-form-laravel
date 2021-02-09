<?php

namespace App\Http\Controllers;

use App\PrRequest;
use App\RequestItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Auth;
use App\User;


use Illuminate\Http\Request;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prrequests = PrRequest::with('requestitems')->get();
        // dd($prrequests);
        // $totalBudget = PrRequest::prrequest()->requestitems->totalbudget;
        return view('requests.index', compact('prrequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getuser = Auth::user();
        // $user = User::find($getuserid);
        // $location = Auth::user()->location;
        // dd($location);
        return view('requests.create', compact('getuser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $location = Auth::user()->location;

        $getuser = User::find($request->user_id);
        
        $countprrequestlocation =  PrRequest::where('user_location',$request->user_location)->get();
        // dd($getuserid);
        // $countprrequestlocation = DB::select('select count(location) from users where(select )');

        // $countprrequestlocation =  PrRequest::where('user_location', function($query){
        //     $query->select('location')
        //     ->from(with(new User)->getTable())
        //     // ->whereIn('category_id', ['223', '15'])
        //     ->where('id','$request->user_id');
        // })->get();
        // $countprrequestlocation = PrRequest::where('user_id', $request->user_id)->get();

        // $prrequestforlocation = PrRequest::where($location)->get();
        // dd($countprrequestlocation);
        // dd(count($countprrequestlocation));
        $newRow = count($countprrequestlocation)+1;

        if ($newRow < 10) {
            $requestnumber = $request->user_location.'-'.date('Y').'-'."00".$newRow;
        }
        elseif ($newRow >= 10 && $newRow <=99) {
            $requestnumber = $request->user_location.'-'.date('Y').'-'."0".$newRow;
        }elseif ($newRow<=100) {
            $requestnumber = $request->user_location.'-'.date('Y').'-'.$newRow;
        }
        
        $prrequest = PrRequest::create([
            'date' => $request->date,
            'request_number' => $requestnumber,
            'department' => $request->department,
            'project' => $request->project,
            'site' => $request->site,
            'group' => $request->group,
            'user_location' => $request->user_location,
            'user_id' => Auth::id(),
        ]);


        foreach ($request->items as $key => $item) {
            $prrequest->requestitems()->create([
                'subgroup' => $request->subgroups[$key],
                'item' => $item,
                'specification' => $request->specifications[$key],
                'piroirty' => $request->piroirtys[$key],
                'qtreqtopur' => $request->qtreqtopurs[$key],
                'qtonstore' => $request->qtonstores[$key],
                'acqtreqtopur' => $request->acqtreqtopurs[$key],
                'currency' => $request->currencys[$key],
                'unit' => $request->units[$key],
                'budget' => $request->budgets[$key],
                'rowbudget' => $request->rowbudgets[$key],
                // 'sumoftotalrowbudget' => $request->sumoftotalrowbudget,
                // 'request_id' => $prrequest->id,
            ]);
        }
        
        return redirect()->route('requests.index')->with('message', 'Request created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prrequest = PrRequest::find($id);

        $requestitems = $prrequest->requestitems()->get();

        // dd($requestitems);        
        // $rowbudget = prrequest()->requestitems()->find(''); 
        $indexCount =1;
        
        return view('requests.show', compact('prrequest', 'requestitems','indexCount', 'totalrowbudget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}    
    
