@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">
        Create PR
    </div>

    <div class="card-body">
        <form action="{{ route("request.store") }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row justify-content-center mb-1">
                <div class="input-group input-group-sm col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Date: </span>
                    </div>
                    <input type="date" id="date" name="date" class="form-control bfh-datepicker" value="{{ old('date') }}"> 
                    @if($errors->has('date'))
                        <em class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </em>
                    @endif
                    {{-- <p class="helper-block">
                        {{ trans('cruds.order.fields.customer_name_helper') }}
                    </p> --}}
                </div>
                <div class="input-group input-group-sm col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">PR #: </span>
                    </div>
                    <input type="text" id="request_number" name="request_number" class="form-control" value="{{ old('request_number') }}">
                    @if($errors->has('request_number'))
                        <em class="invalid-feedback">
                            {{ $errors->first('request_number') }}
                        </em>
                    @endif
                    {{-- <p class="helper-block">
                        {{ trans('cruds.order.fields.customer_email_helper') }}
                    </p> --}}
                </div>
            </div>

            <div class="row justify-content-center mb-1">
                <div class="input-group input-group-sm col-md-6">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Department</label>
                    </div>
                    <select name="department" class="custom-select" id="inputGroupSelect01">
                      <option selected>Choose...</option>
                      <option value="1">IT</option>
                      <option value="2">Legal Affairs</option>
                      <option value="3">HR</option>
                    </select>
                </div>
                <div class="input-group input-group-sm col-md-6">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Project</label>
                      </div>
                      <select name="project" class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">asproject</option>
                        <option value="2">ncproject</option>
                        <option value="3">mproject</option>
                      </select>
                </div>
            </div>

            <div class="row justify-content-center mb-1">
                <div class="input-group input-group-sm col-md-6">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Site</label>
                      </div>
                      <select name="site" class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">Aswan</option>
                        <option value="2">New Capital</option>
                        <option value="3">Minya</option>
                      </select>
                </div>
                <div class="input-group input-group-sm col-md-6">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Group</label>
                      </div>
                      <select name="group" class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">Product</option>
                        <option value="2">Service</option>
                      </select>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Items
                </div>

                <div class="card-body">
                    <div class="table" id="items_table">
                        <div class="card-header">
                            <h6>
                                Item Details
                            </h6>
                        </div>
                        <div>
                            @foreach (old('items', ['']) as $index => $oldProduct)
                                <div class="input-group input-group-sm">
                                    <div id="item{{ $index }}">
                                        <div class="row mb-">
                                            <div class="col-md-3">
                                                <td>
                                                    <input type="text" name="items[]" placeholder="Item Name..." class="form-control">
                                                </td>
                                            </div>
                                            <div class="col-md-3">
                                                <td>
                                                    <input type="text" name="description[]" placeholder="description..." class="form-control"/>
                                                </td>
                                            </div>
                                            <div class="col-md-3">
                                                <td>
                                                    <input type="text" name="specification[]" placeholder="specification..." class="form-control"/>
                                                </td>
                                            </div>
                                            <div class="col-md-3">
                                                <td>
                                                    <input type="datetime-local" name="time[]" placeholder="Due Time..." class="form-control"/>
                                                </td>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div id="item{{ count(old('items', [''])) }}"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button id="add_row" class="btn btn-secondary pull-left">+ Add Row</button>
                            <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="Save">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
   $(document).ready(function(){
    let row_number = {{ count(old('items', [''])) }};
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      console.log(row_number);
      console.log(new_row_number);
      $('#item' + row_number).html($('#item' + new_row_number).html()).find('td:first-child');
      $('#items_table').append('<div id="item' + (row_number + 1) + '"></div>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#item" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
</script>
@endsection
