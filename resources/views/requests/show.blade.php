@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Show Purchase Request : {{$prrequest->request_number}}</h3>
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table style="width: 40%" class="table table-bordered table-striped table-sm p-3">
                <tbody>
                    <tr>
                        <th scope="col">
                            Request Number
                        </th>
                        <th scope="col">
                            {{ $prrequest->request_number }}
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Date
                        </th>
                        <th>
                            {{ $prrequest->date }}
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Department  
                        </th>
                        <th>
                            {{ $prrequest->department }}
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Project  
                        </th>
                        <th>
                            {{ $prrequest->project }}
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Site  
                        </th>
                        <th>
                            {{ $prrequest->site }}
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Group  
                        </th>
                        <th>
                            {{ $prrequest->group }}
                        </th>
                    </tr>
                </tbody>
            </table>
            <div class="card">
                <div class="card-header">
                    <h5>Items Table</h5>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">
                                    Item_#
                                </th>
                                <th scope="col">
                                    Item Name
                                </th>
                                <th scope="col">
                                    quantty_req_to_pur
                                </th>
                                <th scope="col">
                                    quantity_on_store
                                </th>
                                <th scope="col">
                                    actual_qt_req_to_pur
                                </th>
                                <th scope="col">
                                    Due Time
                                </th>
                                <th scope="col">
                                    Budget 
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($requestitems as $requestitem)
                            <tr>
                                <th>
                                    {{-- {{$requestitem->id}} --}}
                                    {{ $indexCount++}}
                                </th>
                                <th>
                                    {{$requestitem->item}}
                                </th>
                                <th>
                                    {{$requestitem->qtreqtopur}}
                                </th>
                                <th>
                                    {{$requestitem->qtonstore}}
                                </th>
                                <th>
                                    {{$requestitem->acqtreqtopur}}
                                </th>
                                <th>
                                    {{$requestitem->date}}
                                </th>
                                <th>
                                    {{$requestitem->budget}}
                                </th>
                            </tr>
                        @endforeach
                            <tr>
                                <th>Total Budget : </th>
                                <td colspan="5"></td>
                                <th>{{$requestitems[0]->totalbudget}}</th>
                            </tr>    
                        </tbody>    
                    </table>    
                </div>    
                </div>
            </div>
            <a class="btn btn-secondary mt-3" href="{{ url()->previous() }}">
                Back To List
            </a>
        </div>


    </div>
</div>
@endsection