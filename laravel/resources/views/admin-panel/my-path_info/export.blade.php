
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("اطلاعات مسیر")}}</title>
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

        <th>{{__("نام و نام خانوادگی")}}</th>
        <th>{{__("lat")}}</th>
        <th>{{__("long")}}</th>
        <th>{{__("آدرس")}}</th>
        <th>{{__("توضیحات")}}</th>
        <th>{{__("شماره تلفن")}}</th>
        <th>{{__("پلاک")}}</th>
        <th>{{__("واحد")}}</th>
        <th>{{__("نوع")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $path_info)
<tr>
<td style="text-align:center;font-weight:bold;">
{{$path_info->name}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$path_info->lat}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$path_info->long}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$path_info->address}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$path_info->description}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$path_info->phone}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$path_info->house_number}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$path_info->unit}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$path_info->type}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
