
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("مسیر پر تکرار")}}</title>
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

        <th>{{__("مکان منتخب مبدا")}}</th>
        <th>{{__("مکان منتخب مقصد")}}</th>
        <th>{{__("سرویس")}}</th>
        <th>{{__("عنوان مبدا")}}</th>
        <th>{{__("lat مبدا")}}</th>
        <th>{{__("long مبدا")}}</th>
        <th>{{__("lat مقصد")}}</th>
        <th>{{__("long مقصد")}}</th>
        <th>{{__("عنوان مقصد")}}</th>
        <th>{{__("آدرس مبدا")}}</th>
        <th>{{__("آدرس مقصد")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $repetitive_place)
<tr>
<td style="text-align:center;font-weight:bold;">
@if($favorite_place=\App\Models\MyFavorite_Place::find($repetitive_place->origin))
{{"$favorite_place->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if($favorite_place=\App\Models\MyFavorite_Place::find($repetitive_place->destination))
{{"$favorite_place->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if($deliveries=\App\Models\MyDeliveries::find($repetitive_place->delivery))
{{"$deliveries->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$repetitive_place->title_origin}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$repetitive_place->lat_origin}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$repetitive_place->long_origin}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$repetitive_place->lat_destination}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$repetitive_place->long_destination}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$repetitive_place->title_destination}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$repetitive_place->address_origin}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$repetitive_place->address_destination}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
