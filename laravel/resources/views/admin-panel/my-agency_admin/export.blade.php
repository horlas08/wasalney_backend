
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("مدیریت آژانس")}}</title>
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

        <th>{{__("نام کاربری")}}</th>
        <th>{{__("نام")}}</th>
        <th>{{__("سرویس ها")}}</th>
        <th>{{__("درصد کمیسیون")}}</th>
        <th>{{__("آدرس")}}</th>
        <th>{{__("عنوان آژانس")}}</th>
        <th>{{__("لوگو")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $agency_admin)
<tr>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$agency_admin->username}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$agency_admin->name}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@php($multiValues=\App\Models\MyAgency_AdminDeliveries::where('agency_admin_id',$agency_admin->id)->get())
@foreach($multiValues as $value)
@php($deliveries=\App\Models\MyDeliveries::find($value->deliveries_id))
<div style="text-align: center">{{"$deliveries->title"}}</div>@endforeach
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$agency_admin->commission}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$agency_admin->address}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$agency_admin->title}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($agency_admin->image!=null)
{{'/files/'.$agency_admin->image}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
