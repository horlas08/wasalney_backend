
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("مسیرهای پر تکرار")}}</title>
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
        <th>{{__("تعداد استفاده شده")}}</th>
        <th>{{__("نوع سرویس")}}</th>
        <th>{{__("کاربر")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $repetitive_routes)
<tr>
<td style="text-align:center;font-weight:bold;">
@if($favorite_place=\App\Models\MyFavorite_Place::find($repetitive_routes->origin))
{{"$favorite_place->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if($favorite_place=\App\Models\MyFavorite_Place::find($repetitive_routes->destination))
{{"$favorite_place->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$repetitive_routes->count}}
</td>
<td style="text-align:center;font-weight:bold;">
@if($deliveries=\App\Models\MyDeliveries::find($repetitive_routes->delivery))
{{"$deliveries->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
@if($users=\App\Models\MyUsers::find($repetitive_routes->user))
{{"($users->mobile)$users->name"}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
