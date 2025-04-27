
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("اطلاعات بانکی")}}</title>
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

        <th>{{__("شماره کارت")}}</th>
        <th>{{__("شماره شبا کارت")}}</th>
        <th>{{__("نام صاحب حساب")}}</th>
        <th>{{__("نام بانک")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $info_bank)
<tr>
<td style="text-align:center;font-weight:bold;">
{{$info_bank->cart_number}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$info_bank->shaba}}
</td>
<td style="text-align:center;font-weight:bold;">
{{$info_bank->name}}
</td>
<td style="text-align:center;font-weight:bold;">
@if($banks=\App\Models\MyBanks::find($info_bank->bank))
{{"$banks->title"}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
