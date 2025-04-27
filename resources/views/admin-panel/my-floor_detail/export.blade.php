
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("جزئیات طبقات")}}</title>
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

        <th>{{__("تعداد طبقات")}}</th>
        <th>{{__("قیمت هر طبقه")}}</th>
        <th>{{__("حمل با آسانسور")}}</th>
        <th>{{__("محل")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $floor_detail)
<tr>
<td style="text-align:center;font-weight:bold;">
{{$floor_detail->count}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$floor_detail->price}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$floor_detail->elevator}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$floor_detail->place}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
