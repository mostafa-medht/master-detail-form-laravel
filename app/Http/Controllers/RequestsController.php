<?php

namespace App\Http\Controllers;
use App\PrRequest;
use App\RequestItem;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class RequestsController extends Controller
{
    public function create()
    {
        // abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $products = Product::all();
        return view('request.create');
    }

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
                // 'request_id' => $prrequest->id,
            ]);
        }

        return redirect()->back()->with('message', 'Order created Successfully');

    }
}
