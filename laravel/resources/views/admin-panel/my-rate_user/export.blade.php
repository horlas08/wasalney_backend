
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("امتیاز کاربر")}}</title>
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

        <th>{{__("نوع")}}</th>
        <th>{{__("تعداد")}}</th>
        <th>{{__("تاریخ ثبت")}}</th>
        <th>{{__("ارزش")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $rate_user)
<tr>
<td style="text-align:center;font-weight:bold;">
@if($transaction_types=\App\Models\MyTransaction_Types::find($rate_user->type))
{{"$transaction_types->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$rate_user->count}}
</td>
<td style="text-align:center;font-weight:bold;">
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($rate_user->created_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $rate_user->created_at)->format('M d Y H:i')}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$rate_user->cost}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
