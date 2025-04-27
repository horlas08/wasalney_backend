
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("جزئیات سفارشات اثاث کشی")}}</title>
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
        <th>{{__("تعداد کارگر")}}</th>
        <th>{{__("قیمت هر کارگر")}}</th>
        <th>{{__("تعداد طبقات مبدا")}}</th>
        <th>{{__("تعداد طبقات مقصد")}}</th>
        <th>{{__("جابجایی با آسانسور مبدا")}}</th>
        <th>{{__("جابجایی با آسانسور در مقصد")}}</th>
        <th>{{__("تاریخ اسباب کشی")}}</th>
        <th>{{__("ساعت")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $moving_order_details)
<tr>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($orders=\App\Models\MyOrders::find($moving_order_details->order_id))
{{"$orders->code"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$moving_order_details->count_worker}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$moving_order_details->price_worker}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$moving_order_details->count_floors_origin}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$moving_order_details->count_floors_destination}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$moving_order_details->elevator_origin}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$moving_order_details->elevator_destination}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($moving_order_details->date)
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromCarbon(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $moving_order_details->date))->format('%A, %d %B %Y')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $moving_order_details->date)->format('M d Y')}}
@endif
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$moving_order_details->time}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
