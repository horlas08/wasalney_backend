
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("وسایل سنگین")}}</title>
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

        <th>{{__("آیکن")}}</th>
        <th>{{__("نام")}}</th>
        <th>{{__("توضیحات")}}</th>
        <th>{{__("قیمت")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $heavy_equipment)
<tr>
<td style="text-align:center;font-weight:bold;">
@if($heavy_equipment->icon!=null)
{{'/files/'.$heavy_equipment->icon}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$heavy_equipment->name}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$heavy_equipment->description}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$heavy_equipment->price}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
