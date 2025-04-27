
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("کاربران")}}</title>
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

        <th>{{__("ایمیل")}}</th>
        <th>{{__("نام")}}</th>
        <th>{{__("آدرس")}}</th>
        <th>{{__("موبایل")}}</th>
        <th>{{__("پروفایل")}}</th>
        <th>{{__("تاریخ تولد")}}</th>
        <th>{{__("کد معرفی")}}</th>
        <th>{{__("کد معرف استفاده شده")}}</th>
        <th>{{__("اعتبار کیف پول")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $users)
<tr>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$users->email}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$users->name}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$users->address}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$users->mobile}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($users->image!=null)
{{'/files/'.$users->image}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($users->birth_date)
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromCarbon(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $users->birth_date))->format('%A, %d %B %Y')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $users->birth_date)->format('M d Y')}}
@endif
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$users->code}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$users->intro_code}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$users->credit}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
