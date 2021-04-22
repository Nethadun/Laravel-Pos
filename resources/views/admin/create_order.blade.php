@extends('adminlte::page')

@section('title', 'Order')

@section('content_header')
<h1>Master File/Create Order</h1>

@stop

@section('content')

<form method="POST" action="{{ url('/admin/create_order') }}">
    {{csrf_field()}}
    <div class="modal-header">
        <h4 class="modal-title">Add Order</h4>
        @if(count($errors) > 0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
        @endforeach
        @endif
    </div>
    <div class="modal-body">

        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Customer Name</label>
                    <select class="form-select form-control"  aria-label="Default select example">
                        @if(count($customers) > 0)
                        @foreach($customers->all() as $customer)
                        <option value="{{ $customer->id }}" >{{ $customer->name }}</option>
                        @endforeach
                        @endif
                    </select>

                </div>
                <div class="form-group">
                    <label>Item Name</label>
                    <select class="form-select form-control" id="item_id" onchange="getComboA(this)">
                        @if(count($items) > 0)
                        @foreach($items->all() as $item)
                        <option value="{{ $item->id }}" >{{ $item->name }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="form-group" >
                    <label>Unit Price</label>
                    <input type="text" name="unit_price" id="unit_price" class="form-control item_id" disabled>
                </div>
                <div class="form-group" >
                    <label>Available QTY</label>
                    <input type="text" name="qty" id="qty" class="form-control" disabled>
                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Qty</label>
                            <input type="text" name="order_qty" id="order_qty" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2" >
                        <button type="button" class="btn btn-success " style="margin-top: auto" onclick="cartFun()">Cart</button>
                    </div>
                </div>

            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <div class="form-group">
                    <label>Order Date</label>
                    <input type="date" name="date" class="form-control">
                </div>
                <table class="table" id="cart_table">
                    <thead>
                    <tr>
                        <th scope="col" hidden>Item ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr class="<%= cycle('gridViewclickableRowDialog', 'gridViewAltclickableRowDialog') %>">

                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <label >Total Amount : </label><label id="total_amount"></label>
                </div>
            </div>
        </div>



    </div>
    <div class="modal-footer">
        <a href="{{ url('/admin/view_customer') }}" type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">Back</a>

        <input type="submit" class="btn btn-success" value="submit">
    </div>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script> console.log('Hi!'); </script>
<script>
function getComboA(selectObject) {
var id = selectObject.value;
console.log(id);
    jQuery.ajax({
        url: '/admin/get_item/'+id,
        type: "get",
        dataType: 'json',
        success: function (items_1) {
            console.log(items_1);
            $("#unit_price").val(items_1.unit_price);
            $("#qty").val(items_1.qty);
        }
    });
}
</script>


<script>
    var total_amount = 0;
    function cartFun() {


        var item_id = $('#item_id').val();
        var order_qty = $('#order_qty').val();
        var unit_price = $('#unit_price').val();

        var amount = unit_price* order_qty;
        var item_name = "";

        jQuery.ajax({
            url: '/admin/get_item/'+item_id,
            type: "get",
            dataType: 'json',
            success: function (items_1) {
                console.log(items_1.name);
                item_name = items_1.name;
                var newrow = '<tr><td hidden name="item_id">' + item_id + '</td><td>' + item_name + '</td><td>' + order_qty + '</td><td>' + unit_price + '</td><td>' + amount + '</td><td><button class="btn btn-danger remove" name="remove">-</button></td></tr>';
                $('#cart_table tr:last').after(newrow);
            }
        });


        total_amount+=amount;
        console.log(total_amount);
        $("#total_amount").html(total_amount);
    }

    $(document).on('click', '.remove', function(){
        count--;
        $(this).closest("tr").remove();
    });
</script>



@stop
