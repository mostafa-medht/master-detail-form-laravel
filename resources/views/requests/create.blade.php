@extends('layouts.app')


@section('content')
<div class="card">
    <div class="card-header">
        <h5>Create Purchase Request</h5>
    </div>

    <div class="card-body">
        <form action="{{ route("requests.store") }}" class="form request-form" autocomplete="on" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row justify-content-center mb-1">
                <div class="input-group input-group-sm col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="">Date: </span>
                    </div>
                    <input type="date" id="date" name="date" class="form-control" readonly> 
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
                        <span class="input-group-text" id="">User Name </span>
                    </div>
                    <h5 id="request_number" class="form-control" readonly>{{ $getuser->name }}</h5>
                    <input type="hidden" name="user_id" value="{{$getuser->id}}">
                    <input type="hidden" name="user_location" value="{{$getuser->location}}">
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
                      <label class="input-group-text" for="department">Department</label>
                    </div>
                    <select name="department" class="custom-select" id="department" value="{{ old('department') }}">
                      <option  value="-1" selected hidden disabled>Choose...</option>
                      <option value="IT">IT</option>
                      <option value="Legal Affairs">Legal Affairs</option>
                      <option value="HR">HR</option>
                    </select>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="input-group input-group-sm col-md-6">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Project</label>
                      </div>
                      <select name="project" class="custom-select" id="inputGroupSelect01">
                        <option value="-1" selected hidden disabled>Choose...</option>
                        <option value="Aswan Project">aswan_project</option>
                        <option value="New Capital Project">new_capital_cproject</option>
                        <option value="Minya">minya_project</option>
                      </select>
                </div>
            </div>

            <div class="row justify-content-center mb-1">
                <div class="input-group input-group-sm col-md-6">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Site</label>
                      </div>
                      <select name="site" class="custom-select" id="inputGroupSelect01">
                        <option value="-1" selected hidden disabled>Choose...</option>
                        <option value="Aswan">Aswan</option>
                        <option value="New Capital">New Capital</option>
                        <option value="Minya">Minya</option>
                      </select>
                </div>
                <div class="input-group input-group-sm col-md-6">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Group</label>
                      </div>
                      <select name="group" class="custom-select" id="inputGroupSelect01">
                        <option value="-1" selected hidden disabled>Choose...</option>
                        <option value="IT">IT</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Constraction">Constraction</option>
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
                        <div id="items_table" class="table">
                            @foreach (old('items', ['']) as $index => $oldProduct)
                                    <div id="item" class="tr">
                                        {{-- <div class="row"> --}}
                                            {{-- <div class="col-md-11"> --}} 
                                                <div class="form-row m-1">
                                                    <div class="col-md-4">
                                                        <select name="subgroups[]" class="form-control" id="subgroups" value="{{ old('department') }}">
                                                            <option  value="-1" selected hidden disabled>SubGroup...</option>
                                                            <option value="Equipment">Equipment</option>
                                                            <option value="Tools">Tool</option>
                                                            <option value="Material">Material</option>
                                                        </select>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="items[]" class="form-control" id="item" value="{{ old('item') }}">
                                                            <option  value="-1" selected hidden disabled>Item...</option>
                                                            <option value="Desktop">Desktop</option>
                                                            <option value="Hardesk">Hardesk</option>
                                                            <option value="Laptop">Laptop</option>
                                                        </select>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="number" name="qtreqtopurs[]" placeholder="Qt required to purchase..." class="form-control qrtp" id="qrtp" value="{{ old('qtreqtopurs.' . $index) ?? '' }}"/>
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                </div>
                                                <div class="form-row mx-0" >
                                                    <div class="col-md-4 no-gutters">
                                                        <div class="col-md-12">
                                                            <textarea type="text" name="specifications[]" placeholder="Specifications/Comments..." class="form-control" id="specification" value="{{ old('specifications.' . $index) ?? '' }}" rows="3" cols="10"></textarea>
                                                            <div class="invalid-feedback">Please fill out this field.</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 no-gutters">
                                                        <div class="form-row mb-1 no-gutters">
                                                            <div class="col-md-4">
                                                                <input type="number" name="qtonstores[]" placeholder="Qt On Store..." class="form-control qos" value="{{ old('qtonstores.' . $index) ?? '' }}"/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <input type="number" name="acqtreqtopurs[]" placeholder="Actually Qt required to purchase..." class="form-control aqrtp" value="{{ old('acqtreqtopurs.' . $index) ?? '' }}" readonly/>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <select name="units[]" class="form-control unit" id="unit">
                                                                    <option>Chosse unit...</option>
                                                                    <option value="unit">Unit</option>
                                                                    <option value="&#13199;">&#13199;</option>
                                                                    <option value="&#13217;">&#13217;</option>
                                                                    <option value="&#13221;">&#13221;</option>
                                                                    <option value="L^3">L^3</option>
                                                                </select>
                                                            </div>
                                                        </div>     
                                                        <div class="form-row">
                                                            <div class="col-md-6"> 
                                                                <select name="piroirtys[]" class="form-control piroirty" id="piroirty" placeholder="Chosse Currncy">
                                                                    <option>Pirority...</option>
                                                                    <option value="low">Low (more than 1 week)</option>
                                                                    <option value="medium">Medium (within 7 days)</option>
                                                                    <option value="high">High (within 3 days)</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <button type="button" id='delete_row' class="rounded-pill btn btn-danger btn-sm">Delete</button>
                                                            </div>
                                                        </div>   
                                                    </div>
                                                    
                                                    {{-- <div class="col-md-2"> 
                                                        <select name="currencys[]" class="form-control currency" id="currency" placeholder="Chosse Currncy">
                                                            <option>currency...</option>
                                                            <option value="EGP">EGP</option>
                                                            <option value="$ ">$</option>
                                                            <option value="&pound; ">&pound;</option>
                                                            <option data-locale="european" value="&euro; ">&euro; </option>
                                                        </select>
                                                    </div>   
                                                    <div class="col-md-2">
                                                        <input type="number" name="budgets[]" placeholder="Budget For Piece..." class="form-control budgetforpiece" value="{{ old('budgets.' . $index) ?? '' }}"/>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="text" name="rowbudgets[]" placeholder="Total Budget..." class="form-control rowbudget" value="{{ old('budgets.' . $index) ?? '' }}" readonly/>
                                                    </div>       --}}
                                                </div>
                                            {{-- </div> --}}
                                            {{-- <div class="col-md-1 mb-3"> --}}
                                            {{-- </div> --}}
                                        {{-- </div> --}}
                                        <hr>
                                    </div>
                                
                            @endforeach
                            {{-- <div id="item{{ count(old('items', [''])) }}" class="tr"></div> --}}
                        </div>
                    
                    {{-- <div class="row mb-3">
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col-md-4">
                            <input type="text" class="form-control sumrowbudget" placeholder="Total budget" id="totalbudget" readonly>
                        </div>
                        <div class="col-md-1"></div>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" id="add_row" class="btn btn-sm btn-dark pull-left">+ Add Row</button>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="Save Request">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')
<script>
   $(document).ready(function(){
    // let row_number = {{ count(old('items', [''])) }};
    // console.log(row_number);
    
    Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
    });
    // test =1;
    // $('.request-form').on('submit', function(e) {
        
    //     const requestForm = $(this);
    //     const department = requestForm.find('.department');
    //     // $('.tr').each(function () {
    //         // test++;
    //         // console.log(test);
    //     const itemField = $(requestForm).find('.itemname'); 
    //     const qrtpField = $(requestForm).find('.qrtp'); 
    //     const descriptionField = $(requestForm).find('.description');
    //     const specificationField = $(requestForm).find('.specification');
        
    //     const formErrors = validate({
    //         department:department.val(),
    //         itemname:itemField.val(),
    //         qrtp:qrtpField.val(),
    //         description:descriptionField.val(),
    //         specification:specificationField.val(),
    //     });

    //     const initialErrors = {
    //         department:null,
    //         itemname:null,
    //         qrtp:null,
    //         description:null,
    //         specification:null,
    //     }

    //     if(formErrors?.error){
    //         const {details} = formErrors.error;
    //         // console.log('Details', details);
    //         details.map((detail) => {
    //             initialErrors[detail.context.key] = detail.message;
    //         })
    //     }

    //     console.log(initialErrors);
    //     // Write Error to the UI
    //     Object.keys(initialErrors).map(errorName =>{
    //         if (initialErrors[errorName] !== null) {
    //             // if the error exist
    //             $(`#${errorName}`).removeClass("is-valid").addClass("is-invalid");
    //             // Invalid Feedback element
    //             $(`#${errorName}`).next("invalid-feedback").text(initialErrors[errorName]);
    //         }
    //         else{
    //             $(`#${errorName}`).removeClass("is-invalid").addClass("is-valid");
    //         }
    //     });

    //     // to Submit 
    //     let isFormValid = Object.values(initialErrors).every((value) => value === null);
    //     if (isFormValid)  {
    //         // $(responseMessage).addClass("show");
    //         $(this).find('.tr')
    //         .find(".is-valid, .is-invalid")
    //         .removeClass("is-valid is-invalid");
    //     }
    //     else {
    //         e.preventDefault();
    //         alert("Please Complete The Required Field");
    //     }
    //     // });

    // });

    if ($(".tr").length <=1 ){
        $('#delete_row').hide(); 
    }

    // Print Dynamic Date
    $('#date').val(new Date().toDateInputValue());

    // Add Event Listner to Add row button
    $("#add_row").click(function(e){
       e.preventDefault();
       $('#delete_row').show();
    //   let new_row_number = row_number - 1;
    //   console.log(row_number);
    //   console.log(new_row_number);
    //   $('#item' + row_number).html($('#item' + new_row_number).html());
    //   $('#items_table').append('<div id="item' + (row_number + 1) + '" class="tr"></div>');
    //   row_number++;
    
    //   if (row_number>=2) {
    //     $("#delete_row").show(); 
    //     }

    
    let $table = $('.table');
    console.log($table);
    let $top= $table.find('div.tr').first();
    console.log($top);
    let $new = $top.clone(true);
    console.log($new);
    // $new.jAutoCalc('destroy');
    // $new.insertAfter($top);
    $table.append($new);
    $new.find('input[type=text]').val('');
    $new.find('input[type=number]').val(''); 
    $new.find(".is-valid, .is-invalid").removeClass("is-valid is-invalid");
    });

    $("#delete_row").click(function(e){
        e.preventDefault();
        $('#delete_row').show();
        $(this).parents('.tr').remove();
        if ($(".tr").length <=1 ){
            $('#delete_row').hide(); 
        }
    //   if(row_number > 1){
    //     $("#item" + (row_number - 1)).html('');
    //     row_number--;
    //   }
    //   if (row_number<=1) {
    //     $("#delete_row").hide(); 
    //     }
         
        // });
    });
  
  
    // Sbstraction 2 values to get actual quantity to purchase    
    $('#items_table').on('keydown keyup','.tr', function(){
        let qrtp = $(this).find('.qrtp').val();
        let qos =  $(this).find('.qos').val();
        let aqrtp = $(this).find('.aqrtp');
        let subtract = Math.abs(qrtp-qos);
        
        aqrtp.val(subtract);

        // Total budget
        // if (!isNaN($(this).find('.budget').val())) {
        //     let totalbudget = 0;
        //     $('.budget').each(function(){
        //         let sumtotalvalue = Number($(this).val());
        //         totalbudget += isNaN(sumtotalvalue) ? 0 : sumtotalvalue;
        //     });
        //     $('.totalbudget').val(totalbudget);
        // }

        // Total Row budget 
        if (!isNaN($(this).find('.budgetforpiece').val())) {
            // let rowbudget = 1;
            $('.budgetforpiece').each(function(){
                let budgetforpiece = Number($(this).val());
                let aqrtp = $(this).parents('.tr').find('.aqrtp').val();
                let currencysymbol = $(this).parents('.tr').find('.currency').val();
                console.log(budgetforpiece);
                console.log(aqrtp);
                console.log(currencysymbol);
                let totalrowbudget = aqrtp * budgetforpiece ;
                console.log(totalrowbudget);
                // console.log(new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(totalrowbudget));

                let rowbudget = $(this).parents('.tr').find('.rowbudget');
                $(rowbudget).val(totalrowbudget + ' ' + currencysymbol);
                // $(rowbudget).val(totalrowbudget);

                // Sum of Total Budget
                // Total budget
                // if (!isNaN($(this).find('.rowbudget').val())) {
                    let sumrowbudget = '';
                    $('.rowbudget').each(function(){
                        let sumrowbudgetvalue = $(this).val();
                        sumrowbudget += sumrowbudgetvalue + '+';
                        console.log(sumrowbudget);
                    });
                    
                    $('.sumrowbudget').val(sumrowbudget);
                // }
            });
            
        }
    });
    
    // Form Client Side Validateion
    const schema = joi.object({
        department:joi.string().label('Department').required(),
        itemname:joi.string().min(1).max(30).required(),
        qrtp:joi.string().min(1).required(),
        description:joi.string().min(1).max(30).required(),
        specification:joi.string().min(1).max(30).required(),
    });

    function validate(dataObject) {
        // dataObject = Department,   
        const result = schema.validate({
            ...dataObject,
        },{abortEarly:false});

        return result;
        } 
    
  });

  

</script>
@endsection
