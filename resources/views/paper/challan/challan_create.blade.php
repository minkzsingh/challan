@extends('paper.masters.layout')

@section('content')
<div class="fluid">
    <div id="wrapper" class="wrap">
        <div class="row text-center font-weight-bolder">

            <div class="col-md-2 ch">
                <h4 for="item_name" class="font-weight-bolder">Challan ID</h4>
                <div class="challan_id">{{ $max_id }}</div>

            </div>
            <div class="col-md-7" style="padding-left: 70px;">
                <h3 for="item_name" class="font-weight-bolder">Select Company</h3>
                <select class="select2" id="sel_company" data-placeholder="Select Company">
                    <option></option>
                    @foreach(\App\Company::all() as $comp)
                    <option value="{{ $comp->id }}">{{ $comp->company_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mt-18">
                <button type="button" class="btn btn-raised btn-raised btn-primary pull-right" id="print">
                    <i class="fa fa-check-square-o"></i> Print
                </button>
            </div>
        </div>
        <form class="form text-center hide">
            <div id="multi-params">
                <div class="row mt-18 " style="border-bottom: 1px solid;">
                    <div class="col-md-1 form-group"></div>
                    <div class="col-md-4">Select Item</div>
                    <div class="col-md-1">Remaning Qty</div>
                    <div class="col-md-2 form-group">Quantity</div>
                    <div class="col-md-2 form-group">Rate</div>
                    <div class="col-md-2 form-group"><label>Amount</label></div>
                </div>

                <div class="row mt-18 copy_div" style="border-bottom: 1px solid;">
                    <div class="col-md-1 form-group">
                        <button type="button" id="minus" class="hide"><i class="fa fa-minus-circle fa-2x"
                                aria-hidden="true"></i></i></button>
                    </div>
                    <div class="col-md-4">
                        <select class="select2 selec" data-placeholder="Select Item">
                            <option></option>
                            @foreach(\App\Item::all() as $item)
                            <option value="{{ $item->quantity }}" data-item_id="{{ $item->id }}">{{ $item->item_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-1 form-group r_qty">0</div>
                    <div class="col-md-2 form-group"><input type="text" class="form-control" name="quantity"
                            value="0" /></div>
                    <div class="col-md-2 form-group"><input type="text" class="form-control" name="rate" value="0" />
                    </div>
                    <div class="col-md-2 form-group"><span id="amount">0</span></div>
                </div>
            </div>
            <button type="button" id="plus"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></i></button>

            <div class="copy_divv"></div>
            <div class="row mt-18">
                <div class="col-md-8 form-group"></div>
                <div class="col-md-2 form-group" style="font-weight: bolder;">Total Amount</div>
                <div class="col-md-2 form-group" id="total_amount">0</div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.select2').select2({
        width: '300px'
    });

    //Data Table
    var table = getTable({
        table_id: '#table_id',
        url: "api/item",
        data: { //user_id:12
        }
    });

    //Select Company
    $('#sel_company').on('select2:select', function() {
        $('form').removeClass('hide');
    });

    //Plus Rows
    $('#plus').on('click', function() {
        var html = $('.copy_div').first('div');
        html.find('.selec').select2('destroy');


        var cloned = html.clone(true);
        cloned.find('.r_qty').text(0);
        cloned.find("input[name='quantity']").val(0);
        cloned.find("input[name='rate']").val(0);

        $('#multi-params').append(cloned);
        $.each($('.selec'), function(a) {
            $(this).removeAttr('data-select2-id').select2({
                width: '300px'
            });
        });

        $('#multi-params .copy_div').find('#minus').removeClass('hide').last().addClass('hide');
    });

    //Delete row
    $('#minus').on('click', function() {
        $(this).parent().parent().remove();
    });

    //Set Remaing Quantity
    $('.selec').on('select2:select', function() {
        $(this).parent().next().text($(this).val());
    });

    $("input[name='quantity']").on('keyup', function() {
        if (!$.isNumeric(this.value) && this.value != '') {
            toastr.error('Please Enter Only Number in Quantity Column');
            return false;
        }

        var r_qty = parseInt($(this).parent().prev().text()) - this.value;
        if (r_qty <= 0) {
            toastr.error('Stock Not Available');
            return false;
        }
        $(this).parent().prev().text(r_qty);
        calculateRate(this);
    });

    $("input[name='rate']").on('keyup', function() {
        if (!$.isNumeric(this.value) && this.value != '') {
            toastr.error('Please Enter Only Number in Rate Column');
            return false;
        }
        calculateRate();
    });


    //Add
    $('#print').on('click', function() {
        var company_id = $('#sel_company').val();
        var item_arr = {};

        if (company_id == '') {
            toastr.error('Please Select Company');
            return false;
        }

        item_arr = $('#multi-params .copy_div').map(function(k, v) {
            $this = $(this);
            return {
                item_id: $this.find('.selec :selected').data('item_id'),
                quantity: $this.find('input[name="quantity"]').val(),
                price: $this.find('input[name="rate"]').val(),
                amount: $this.find('#amount').text()
            }
        }).get();

        if ($('#total_amount').text() == 0) {
            toastr.error('Please Enter Data In Item Section');
            return false;
        }

        var data = {
            model_id: $('.challan_id').text(),
            company_id: company_id,
            item_arr: item_arr,
            total_amount: $('#total_amount').text()
        };

        //Params == url, type(POST), request data, modal id to hide, table to reload
        saveData('api/challan', 'POST', data, 'pdf');
    });

    function calculateRate() {
        $('#multi-params .copy_div').each(function(k, v) {
            var qty = $(this).find("input[name='quantity']").val();
            var rate = $(this).find("input[name='rate']").val();

            $(this).find('#amount').text(qty * rate);
        });

        finalAmount();
    }

    function finalAmount() {
        var total = 0;
        $('#multi-params .copy_div').each(function(k, v) {
            total += parseInt($(this).find('#amount').text());
        });

        $('#total_amount').text(total);
    }
});
</script>
@endsection