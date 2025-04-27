
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("معلومات رمز الرصید السائق")}}</title>
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

        <th>{{__("کد")}}</th>
        <th>{{__("القيمة")}}</th>
        <th>{{__("تم الاستخدام")}}</th>
        <th>{{__("السائق")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $info_code_driver)
<tr>
<td style="text-align:center;font-weight:bold;">
{{$info_code_driver->code}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$info_code_driver->price}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$info_code_driver->used}}
</td>
<td style="text-align:center;font-weight:bold;">
@if($drivers=\App\Models\MyDrivers::find($info_code_driver->driver))
{{"$drivers->name $drivers->mobile"}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
