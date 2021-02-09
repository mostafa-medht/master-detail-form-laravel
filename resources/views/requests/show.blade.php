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
                    <table class="table table-bordered table-striped table-hover justify-content-center text-center">
                        <thead>
                            <tr>
                                <th scope="col">
                                    Serial Number
                                </th>
                                <th scope="col">
                                    Item Name
                                </th>
                                <th scope="col">
                                    Item <br> Specification
                                </th>
                                <th scope="col">
                                    Quantity required to purchase
                                </th>
                                <th scope="col">
                                    Quantity on store
                                </th>
                                <th scope="col">
                                    Actual Qty to be purchased
                                </th>
                                <th scope="col">
                                    Priority
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
                                <td>
                                    {{$requestitem->item}}
                                </td>
                                <td>
                                    {{$requestitem->specification}}
                                </td>
                                <td>
                                    {{$requestitem->qtreqtopur}}
                                </td>
                                <td>
                                    {{$requestitem->qtonstore}}
                                </td>
                                <td>
                                    {{$requestitem->acqtreqtopur}}
                                </td>
                                <td>
                                    {{$requestitem->piroirty}}
                                </td>
                                <td>
                                    {{$requestitem->rowbudget}}
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <th>Total Budget : </th>
                                <td colspan="6"></td>
                                <th>
                                    @foreach ($requestitems as $item)
                                        {{$item->rowbudget}}
                                    @endforeach
                                    {{-- {{$totalrowbudget}} --}}
                                </th>
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