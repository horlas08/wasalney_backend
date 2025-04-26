
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("رسالة الادمن للسائق")}}</title>
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

        <th>{{__("رانندگان")}}</th>
        <th>{{__("الرسالة")}}</th>
        <th>{{__("تاریخ")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $admin_message)
<tr>
<td style="text-align:center;font-weight:bold;width:auto;">
@php($multiValues=\App\Models\MyAdmin_MessageDrivers::where('admin_message_id',$admin_message->id)->get())
@foreach($multiValues as $value)
@php($drivers=\App\Models\MyDrivers::find($value->drivers_id))
<div style="text-align: center">{{"($drivers->mobile) $drivers->name"}}</div>@endforeach
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$admin_message->message}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($admin_message->created_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $admin_message->created_at)->format('M d Y H:i')}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
