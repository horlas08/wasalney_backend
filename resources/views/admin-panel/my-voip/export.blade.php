
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("تنظیمات voip")}}</title>
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

        <th>{{__("IP")}}</th>
        <th>{{__("نام کاربری")}}</th>
        <th>{{__("رمز")}}</th>
        <th>{{__("نام ترانک")}}</th>
        <th>{{__("پیش شماره گیت وی")}}</th>
        <th>{{__("پیش شماره ترانک")}}</th>
        <th>{{__("پورت")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $voip)
<tr>
<td style="text-align:center;font-weight:bold;">
{{$voip->ip}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$voip->user_name}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$voip->pass}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$voip->trank}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$voip->gateway}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$voip->pre_trank}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$voip->port}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
