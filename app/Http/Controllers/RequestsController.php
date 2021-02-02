<?php

namespace App\Http\Controllers;
use App\PrRequest;
use App\RequestItem;
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
        return view('request.index', compact('prrequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $prrequest = PrRequest::create([
            'date' => $request->date,
            'request_number' => $request->request_number,
            'department' => $request->department,
            'project' => $request->project,
            'site' => $request->site,
            'group' => $request->group,
        ]);


        foreach ($request->items as $key => $item) {
            $prrequest->requestitems()->create([
                'item' => $item,
                'description' => $request->descriptions[$key],
                'specification' => $request->specifications[$key],
                'date' => $request->dates[$key],
                'qtreqtopur' => $request->qtreqtopurs[$key],
                'qtonstore' => $request->qtonstores[$key],
                'acqtreqtopur' => $request->acqtreqtopurs[$key],
                'budget' => $request->budgets[$key],
                'totalbudget' => $request->totalbudget,
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

        $indexCount =1;
        return view('resquest.show', compact('prrequest', 'requestitems','indexCount'));
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
    
