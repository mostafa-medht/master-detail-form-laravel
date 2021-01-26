@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h3>Show Purchase Request : {{$prrequest->request_number}}</h3>
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table style="width: 40%" class="table table-bordered table-striped table-sm p-2">
                <tbody>
                    <tr>
                        <th style="padding: 5px">
                            Request Number
                        </th>
                        <th>
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
                                <th>
                                    Item_#
                                </th>
                                <th>
                                    Item
                                </th>
                                <th>
                                    quantty_req_to_pur
                                </th>
                                <th>
                                    quantity_on_store
                                </th>
                                <th>
                                    actual_qt_req_to_pur
                                </th>
                                <th>
                                    Due Time
                                </th>
                                <th>
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