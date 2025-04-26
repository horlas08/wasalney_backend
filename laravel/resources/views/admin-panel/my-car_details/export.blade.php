
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("مشخصات ماشین")}}</title>
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

        <th>{{__("رنگ ماشین")}}</th>
        <th>{{__("پلاک")}}</th>
        <th>{{__("نوع سوخت")}}</th>
        <th>{{__("سال ساخت")}}</th>
        <th>{{__("مدل ماشین")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $car_details)
<tr>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$car_details->color}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$car_details->car_tag}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($fuel_type=\App\Models\MyFuel_Type::find($car_details->fuel_type))
{{"$fuel_type->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$car_details->year_made}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$car_details->model}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
