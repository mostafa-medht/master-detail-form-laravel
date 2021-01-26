@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">
        <h5>Create Purchase Request</h5>
    </div>

    <div class="card-body">
        <form action="{{ route("requests.store") }}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row justify-content-center mb-1">
                <div class="input-group input-group-sm col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Date: </span>
                    </div>
                    <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}"> 
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
                    <select name="department" class="custom-select" id="inputGroupSelect01" value="{{ old('department') }}">
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
                    
                            <h6 class="card-title">
                                Item Details
                            </h6>
                        <div id="items_table">
                            @foreach (old('items', ['']) as $index => $oldProduct)
                                    <div id="item{{ $index }}" class="tr">
                                        <div class="row mb-1">
                                            <div class="col-md-3">
                                                <input type="text" name="items[]" placeholder="Item Name..." class="form-control" value="{{ old('items.' . $index) ?? '' }}">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="descriptions[]" placeholder="description..." class="form-control" value="{{ old('descriptions.' . $index) ?? '' }}"/>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="specifications[]" placeholder="specification..." class="form-control" value="{{ old('specifications.' . $index) ?? '' }}"/>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" name="dates[]" placeholder="Due Time..." class="form-control" value="{{ old('dates.' . $index) ?? '' }} "/>
                                            </div>
                                        </div>
                                        <div class="row mb-1" >
                                            <div class="col-md-3">
                                                <input type="number" name="qtreqtopurs[]" placeholder="Qt required to purchase..." class="form-control qrtp" value="{{ old('qtreqtopurs.' . $index) ?? '' }}"/>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" name="qtonstores[]" placeholder="Qt On Store..." class="form-control qos" value="{{ old('qtonstores.' . $index) ?? '' }}"/>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" name="acqtreqtopurs[]" placeholder="Actually Qt required to purchase..." class="form-control aqrtp" value="{{ old('acqtreqtopurs.' . $index) ?? '' }}"/>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" name="budgets[]" placeholder="Budget..." class="form-control budget" value="{{ old('budgets.' . $index) ?? '' }}"/>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                
                            @endforeach
                            <div id="item{{ count(old('items', [''])) }}" class="tr"></div>
                        </div>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control mb-2 right totalbudget" placeholder="Total budget" name="totalbudget" id="totalbudget">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button id="add_row" class="btn btn-sm btn-secondary pull-left">+ Add Row</button>
                            <button id='delete_row' class="pull-right btn btn-danger btn-sm">- Delete Row</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="Save">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
   $(document).ready(function(){
    let row_number = {{ count(old('items', [''])) }};
    console.log(row_number);
    
    if (row_number<=1) {
        $("#delete_row").hide(); 
    }

    $("#add_row").click(function(e){
       e.preventDefault();

      let new_row_number = row_number - 1;
      console.log(row_number);
      console.log(new_row_number);
      $('#item' + row_number).html($('#item' + new_row_number).html());
      $('#items_table').append('<div id="item' + (row_number + 1) + '" class="tr"></div>');
      row_number++;
    
      if (row_number>=2) {
        $("#delete_row").show(); 
        }
    });

    $("#delete_row").click(function(e){
      e.preventDefault();
      console.log(row_number);
      if(row_number > 1){
        $("#item" + (row_number - 1)).html('');
        row_number--;
      }
      if (row_number<=1) {
        $("#delete_row").hide(); 
        }
    });
  
    // $(".qrtp, .qos").on("keydown keyup", function(event) {
    //     $(".aqrtp").val(Math.abs(Number($(".qrtp").val()) - Number($(".qos").val())));

    // });
  
    // Sbstraction 2 values to get actual quantity to purchase    
    $('#items_table').on('keydown keyup','.tr', function(){
        let qrtp = $(this).find('.qrtp').val();
        let qos =  $(this).find('.qos').val();

        let subtract = Math.abs(qrtp-qos);
        $(this).find('.aqrtp').val(subtract);

        // Total budget
        if (!isNaN($(this).find('.budget').val())) {
            let totalbudget = 0;
            $('.budget').each(function(){
                let sumtotalvalue = Number($(this).val());
                totalbudget += isNaN(sumtotalvalue) ? 0 : sumtotalvalue;
            });
            $('.totalbudget').val(totalbudget);
        }
    });
    

  });
</script>
@endsection
