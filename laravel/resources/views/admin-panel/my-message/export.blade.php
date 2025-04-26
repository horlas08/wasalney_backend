
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("پیام ها")}}</title>
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

        <th>{{__("راننده")}}</th>
        <th>{{__("کاربر")}}</th>
        <th>{{__("پیام")}}</th>
        <th>{{__("ارسال کننده کاربر")}}</th>
        <th>{{__("ارسال کننده راننده")}}</th>
        <th>{{__("تاریخ ایجاد")}}</th>
        <th>{{__("تاریخ ویرایش")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $message)
<tr>
<td style="text-align:center;font-weight:bold;">
@if($drivers=\App\Models\MyDrivers::find($message->driver))
{{"($drivers->mobile) $drivers->name"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if($users=\App\Models\MyUsers::find($message->user))
{{"($users->mobile) $users->name"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$message->messsage}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$message->user_sent}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$message->driver_sent}}
</td>
<td style="text-align:center;font-weight:bold;">
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($message->created_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $message->created_at)->format('M d Y H:i')}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($message->updated_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $message->updated_at)->format('M d Y H:i')}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
