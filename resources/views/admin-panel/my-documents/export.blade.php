
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("مدارک راننده")}}</title>
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

        <th>{{__("صورة أمامية لسنوية السيارة")}}</th>
        <th>{{__("عکس پشت کارت ماشین")}}</th>
        <th>{{__("عکس روی گواهینامه")}}</th>
        <th>{{__("مستمسك اضافي")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $documents)
<tr>
<td style="text-align:center;font-weight:bold;">
@if($documents->on_car_card!=null)
{{'/pvfiles/'.$documents->on_car_card}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if($documents->back_car_card!=null)
{{'/pvfiles/'.$documents->back_car_card}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if($documents->on_certificate!=null)
{{'/pvfiles/'.$documents->on_certificate}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if($documents->additional_documents!=null)
{{'/pvfiles/'.$documents->additional_documents}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
