
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("آیتم های صفحه انتظار سرویس")}}</title>
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

        <th>{{__("تصویر")}}</th>
        <th>{{__("توضیحات")}}</th>
        <th>{{__("نام سرویس")}}</th>
        <th>{{__("تصویر صفحه انتظار")}}</th>
        <th>{{__("توضیحات صفحه انتظار")}}</th>
        <th>{{__("عنوان صفحه انتظار")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $wait_service)
<tr>
<td style="text-align:center;font-weight:bold;">
@if($wait_service->image!=null)
{{'/files/'.$wait_service->image}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$wait_service->description}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$wait_service->name}}
</td>
<td style="text-align:center;font-weight:bold;">
@if($wait_service->image_waiting!=null)
{{'/files/'.$wait_service->image_waiting}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$wait_service->description_waiting}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$wait_service->title_waiting}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
