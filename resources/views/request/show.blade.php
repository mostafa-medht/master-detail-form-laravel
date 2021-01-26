@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h3>Show Purchase Request : {{$prrequest->request_number}}</h3>
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Request Number
                        </th>
                        <td>
                            {{ $prrequest->request_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date
                        </th>
                        <td>
                            {{ $prrequest->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                          Department  
                        </th>
                        <td>
                            {{ $prrequest->department }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                          Project  
                        </th>
                        <td>
                            {{ $prrequest->project }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                          Site  
                        </th>
                        <td>
                            {{ $prrequest->site }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                          Group  
                        </th>
                        <td>
                            {{ $prrequest->group }}
                        </td>
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
                                    qtreqtopur
                                </th>
                                <th>
                                    qtonstore
                                </th>
                                <th>
                                    acqtreqtopur
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
                            </tr>
                        @endforeach    
                        </tbody>    
                    </table>    
                </div>    
                </div>
            </div>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection