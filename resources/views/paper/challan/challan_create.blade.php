@extends('paper.masters.layout')

@section('content')
<div class="fluid">
    <div id="wrapper" class="wrap">
        <div class="row text-center font-weight-bolder">
            <div class="col-md-9" style="padding-left: 70px;">
                <h3 for="item_name" class="font-weight-bolder">Select Company</h3>
                <select class="select2" data-placeholder="Select Company">
                    <option></option>
                    @foreach(\App\Company::pluck('company_name') as $comp)
                    <option value="{{$comp}}">{{ $comp }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mt-18">
                <button type="submit" class="ml-2 btn btn-raised btn-raised btn-primary pull-right" id="save">
                    <i class="fa fa-check-square-o"></i> Save
                </button>
                <button type="submit" class="btn btn-raised btn-raised btn-primary pull-right" id="save">
                    <i class="fa fa-check-square-o"></i> Print
                </button>
            </div>
        </div>
        <form class="form text-center">
            <div class="row mt-18 " style="border-bottom: 1px solid;">
                <div class="col-md-1 form-group"></div>
                <div class="col-md-1 form-group">Challan ID</div>
                <div class="col-md-3">Select Item</div>
                <div class="col-md-1">Remaning Qty</div>
                <div class="col-md-2 form-group">Quantity</div>
                <div class="col-md-2 form-group">Rate</div>
                <div class="col-md-2 form-group"><label>Amount</label></div>
            </div>
            <div class="row copy_div mt-18 " style="border-bottom: 1px solid;">
                <div class="col-md-1 form-group">
                    <button type="button" id="plus"><i class="fa fa-plus-circle fa-2x"
                            aria-hidden="true"></i></i></button>
                </div>
                <div class="col-md-1 form-group">1</div>
                <div class="col-md-3">
                    <select class="select2" data-placeholder="Select Item">
                        <option></option>
                        @foreach(\App\Item::pluck('item_name') as $item)
                        <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1 form-group">10</div>
                <div class="col-md-2 form-group"><input type="text" id="quantity" class="form-control"
                        name="quantity" /></div>
                <div class="col-md-2 form-group"><input type="text" id="rate" class="form-control" name="rate" /></div>
                <div class="col-md-2 form-group"><span id="amount">0</span></div>
            </div>
            <div class="copy_divv"></div>
            <div class="row mt-18">
                <div class="col-md-8 form-group"></div>
                <div class="col-md-2 form-group" style="font-weight: bolder;">Total Amount</div>
                <div class="col-md-2 form-group">100</div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.select2').select2({
        width: '200px'
    });

    //Data Table
    var table = getTable({
        table_id: '#table_id',
        url: "api/item",
        data: { //user_id:12
        }
    });

    //Add
    $('#plus').on('click', function() {
        console.log('here');
        console.log($('.copy_div').first().clone());

        $('.copy_divv').after($('.copy_div').first().clone(true));
    });
});
</script>
@endsection