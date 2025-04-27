
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("سفارشات تخفیفی")}}</title>
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

        <th>{{__("کاربر")}}</th>
        <th>{{__("سفارش")}}</th>
        <th>{{__("تاریخ استفاده")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $discount_order)
<tr>
<td style="text-align:center;font-weight:bold;">
@if($users=\App\Models\MyUsers::find($discount_order->user))
{{"($users->mobile) $users->name"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if($orders=\App\Models\MyOrders::find($discount_order->order))
{{"$orders->code"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($discount_order->created_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $discount_order->created_at)->format('M d Y H:i')}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
