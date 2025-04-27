
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("تخفیف")}}</title>
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

        <th>{{__("کد تخفیف")}}</th>
        <th>{{__("درصد تخفیف")}}</th>
        <th>{{__("تاریخ اعتبار")}}</th>
        <th>{{__("سرویس")}}</th>
        <th>{{__("تعداد استفاده")}}</th>
        <th>{{__("حداقل مبلغ سفارش")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $gift_cart)
<tr>
<td style="text-align:center;font-weight:bold;">
{{$gift_cart->gift_code}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$gift_cart->percent}}
</td>
<td style="text-align:center;font-weight:bold;">
@if($gift_cart->expire_date)
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromCarbon(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $gift_cart->expire_date))->format('Y-m-d')}}
@else
{{ $gift_cart->expire_date}}
@endif
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@php($multiValues=\App\Models\MyGift_CartDeliveries::where('gift_cart_id',$gift_cart->id)->get())
@foreach($multiValues as $value)
@php($deliveries=\App\Models\MyDeliveries::find($value->deliveries_id))
<div style="text-align: center">{{"$deliveries->title"}}</div>@endforeach
</td>
<td style="text-align:center;font-weight:bold;">
{{$gift_cart->count}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$gift_cart->min_price}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
