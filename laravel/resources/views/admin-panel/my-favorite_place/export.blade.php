
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("مکان های منتخب")}}</title>
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

        <th>{{__("عنوان")}}</th>
        <th>{{__("lat")}}</th>
        <th>{{__("long")}}</th>
        <th>{{__("آدرس")}}</th>
        <th>{{__("کاربر")}}</th>
        <th>{{__("نام")}}</th>
        <th>{{__("شماره تلفن")}}</th>
        <th>{{__("پلاک")}}</th>
        <th>{{__("واحد")}}</th>
        <th>{{__("توضیحات")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $favorite_place)
<tr>
<td style="text-align:center;font-weight:bold;">
{{$favorite_place->title}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$favorite_place->lat}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$favorite_place->long}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$favorite_place->address}}
</td>
<td style="text-align:center;font-weight:bold;">
@if($users=\App\Models\MyUsers::find($favorite_place->user))
{{"$users->name"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;">
{{$favorite_place->name}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$favorite_place->phone}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$favorite_place->plack}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$favorite_place->unit}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$favorite_place->description}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
