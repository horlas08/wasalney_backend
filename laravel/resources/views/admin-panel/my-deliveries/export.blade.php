
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("سرویس ها")}}</title>
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

        <th>{{__("عکس سرویس")}}</th>
        <th>{{__("نام سرویس")}}</th>
        <th>{{__("قیمت پایه")}}</th>
        <th>{{__("ضریب قیمت")}}</th>
        <th>{{__("درصد قیمت عجله دارم")}}</th>
        <th>{{__("تصویر صفحه انتظار")}}</th>
        <th>{{__("عنوان صفحه انتظار")}}</th>
        <th>{{__("توضیح صفحه انتظار")}}</th>
        <th>{{__("نسبة العودة")}}</th>
        <th>{{__("نوع سرویس")}}</th>
        <th>{{__("درصد کاهش قیمت سرویس اقتصادی")}}</th>
        <th>{{__("آیکن سرویس اقتصادی")}}</th>
        <th>{{__("تكلفة الدقيقة (دینار)")}}</th>
        <th>{{__("سرویس مرتبط")}}</th>
        <th>{{__("نمایش در صفحه اصلی")}}</th>
        <th>{{__("دارای سرویس اقتصادی")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $deliveries)
<tr>
<td style="text-align:center;font-weight:bold;">
@if($deliveries->image!=null)
{{'/files/'.$deliveries->image}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$deliveries->title}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$deliveries->base_price}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$deliveries->price}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$deliveries->hurry_price}}
</td>
<td style="text-align:center;font-weight:bold;">
@if($deliveries->image_waiting!=null)
{{'/files/'.$deliveries->image_waiting}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$deliveries->title_waiting}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$deliveries->description_waiting}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$deliveries->back_price}}
</td>
<td style="text-align:center;font-weight:bold;">
@if($services_type=\App\Models\MyServices_Type::find($deliveries->type))
{{"$services_type->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$deliveries->decrease_percent}}
</td>
<td style="text-align:center;font-weight:bold;">
@if($deliveries->economic_icon!=null)
{{'/files/'.$deliveries->economic_icon}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$deliveries->time_price}}
</td>
<td style="text-align:center;font-weight:bold;">
@if($deliveries=\App\Models\MyDeliveries::find($deliveries->service))
{{"$deliveries->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$deliveries->show}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$deliveries->have_economic}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
