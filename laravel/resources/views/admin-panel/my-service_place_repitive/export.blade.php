
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("سرویس مسیر های پرتکرار")}}</title>
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

        <th>{{__("سرویس")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $service_place_repitive)
<tr>
<td style="text-align:center;font-weight:bold;">
@if($deliveries=\App\Models\MyDeliveries::find($service_place_repitive->service))
{{"$deliveries->title"}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
