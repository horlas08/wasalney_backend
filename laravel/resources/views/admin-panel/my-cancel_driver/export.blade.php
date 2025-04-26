
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("الطلبات الملغية من قبل السائق")}}</title>
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
        <th>{{__("تاریخ و ساعت لغو")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $cancel_driver)
<tr>
<td style="text-align:center;font-weight:bold;">
@if($orders=\App\Models\MyOrders::find($cancel_driver->order))
{{"$orders->price"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($cancel_driver->created_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $cancel_driver->created_at)->format('M d Y H:i')}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
