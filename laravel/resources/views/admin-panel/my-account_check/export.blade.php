
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("التحقق من حسابات السائقين")}}</title>
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

        <th>{{__("رقم البطاقة")}}</th>
        <th>{{__("مستخدم")}}</th>
        <th>{{__("عنوان")}}</th>
        <th>{{__("سعر")}}</th>
        <th>{{__("التاريخ")}}</th>
        <th>{{__("حالة")}}</th>
        <th>{{__("شماره شبا کارت")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $account_check)
<tr>
<td style="text-align:center;font-weight:bold;">
{{$account_check->card_number}}
</td>
<td style="text-align:center;font-weight:bold;">
@if($users=\App\Models\MyUsers::find($account_check->user))
{{"( $users->mobile)$users->name"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$account_check->title}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$account_check->price}}
</td>
<td style="text-align:center;font-weight:bold;">
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($account_check->created_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $account_check->created_at)->format('M d Y H:i')}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if($state_driver=\App\Models\MyState_Driver::find($account_check->state))
{{"$state_driver->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$account_check->shaba}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
