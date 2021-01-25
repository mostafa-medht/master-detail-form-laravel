@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">
        <h5>Create PR</h5>
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
                    <h5>
                        Items
                    </h5>
                </div>

                <div class="card-body">
                    <table class="table" id="products_table">
                        
                            Product Detail
                        <tbody>
                            @foreach (old('products', ['']) as $index => $oldProduct)
                                <tr id="product{{ $index }}">
                                    <td>
                                        <input type="number" name="quantities[]" placeholder="Qt required to purchase..." class="form-control qrtp">
                                    </td>
                                    <td>   
                                        <input type="number" name="qtonstore[]" placeholder="Qt On Store..." class="form-control qos"/>
                                    </td>
                                    <td>
                                        <input type="number" name="acqt[]" placeholder="Actually Qt required to purchase..." class="form-control aqrtp"/>
                                    </td>
                                    <td>
                                       <input type="number" name="budget[]" placeholder="Budget..." class="form-control"/>
                                    </td>
                                </div>
                                </tr>
                            @endforeach
                            <tr id="product{{ count(old('products', [''])) }}"></tr>
                        </tbody>
                    </table>

                    <div class="row">
                        <div class="col-md-12">
                            <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                            <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    let row_number = {{ count(old('products', [''])) }};
    $("#add_row").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:last-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });

    $('tbody').on('keydown keyup','tr', function(){
        let qrtp = $(this).find('.qrtp').val();
        let qos =  $(this).find('.qos').val();

        let subtract = Math.abs(qrtp-qos);
        $(this).find('.aqrtp').val(subtract);
    }); 
  });
</script>
@endsection
