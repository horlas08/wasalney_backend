
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("معلومات رمز الرصید المستخدم")}}</title>
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
        <th>{{__("ارزش")}}</th>
        <th>{{__("استفاده شده")}}</th>
        <th>{{__("کاربر")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $info_code)
<tr>
<td style="text-align:center;font-weight:bold;">
{{$info_code->code}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$info_code->price}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$info_code->used}}
</td>
<td style="text-align:center;font-weight:bold;">
@if($users=\App\Models\MyUsers::find($info_code->user))
{{"($users->mobile)  $users->name"}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
