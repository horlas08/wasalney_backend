
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("جزئیات سفارشات موتور باکس")}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        @if($lang=='fa')
        body {
            font-family: irsn;
        }
        @endif

        @page {
            header: page-header;
            footer: page-footer;
        }

        table.content th, table.content td {
            padding: 5px 5px 5px 5px;
            font-size: 20px;
        }

        table.content th {
            border-bottom: 2px solid #00a652;
            text-align: right;
            font-size: 20px;
        }

        table.content tr td:first-child {
            text-align: center;
        }
    </style>

</head>
<body>
<table >
    <thead>
    <tr>

        <th>{{__("سفارش")}}</th>
        <th>{{__("نوع مرسوله")}}</th>
        <th>{{__("ارزش مرسوله")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $order_motor_details)
<tr>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($orders=\App\Models\MyOrders::find($order_motor_details->order_id))
{{"$orders->price"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($type_parcel=\App\Models\MyType_Parcel::find($order_motor_details->type_parcel))
{{"$type_parcel->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($price_parcel=\App\Models\MyPrice_Parcel::find($order_motor_details->price_parcel))
{{"$price_parcel->title"}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
