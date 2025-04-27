
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("کیف پول ادمین")}}</title>
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

        <th>{{__("مبلغ")}}</th>
        <th>{{__("نوع عملیات")}}</th>
        <th>{{__("تاریخ ایجاد")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $wallet_admin)
<tr>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$wallet_admin->price}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($transaction_types=\App\Models\MyTransaction_Types::find($wallet_admin->type))
{{"$transaction_types->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($wallet_admin->updated_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $wallet_admin->updated_at)->format('M d Y H:i')}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
