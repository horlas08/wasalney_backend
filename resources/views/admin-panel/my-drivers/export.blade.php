
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("رانندگان")}}</title>
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

        <th>{{__("نام و نام خانوادگی")}}</th>
        <th>{{__("موبایل")}}</th>
        <th>{{__("کدملی")}}</th>
        <th>{{__("lat")}}</th>
        <th>{{__("long")}}</th>
        <th>{{__("شماره گواهینامه")}}</th>
        <th>{{__("نوع گواهینامه")}}</th>
        <th>{{__("نوع فعالیت")}}</th>
        <th>{{__("وضعیت آنلاین")}}</th>
        <th>{{__("عکس")}}</th>
        <th>{{__("تاریخ صدور گواهینامه")}}</th>
        <th>{{__("مدت اعتبار گواهینامه")}}</th>
        <th>{{__("سطح")}}</th>
        <th>{{__("اعتبار")}}</th>
        <th>{{__("notif token")}}</th>
        <th>{{__("پلاک")}}</th>
        <th>{{__("وضعیت")}}</th>
        <th>{{__("مدل ماشین")}}</th>
        <th>{{__("کد معرفی")}}</th>
        <th>{{__("کد معرف استفاده شده")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $drivers)
<tr>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->name}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->mobile}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->code_meli}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->lat}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->long}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->number_licence}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($certificates_types=\App\Models\MyCertificates_Types::find($drivers->certificate_type))
{{"$certificates_types->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($deliveries=\App\Models\MyDeliveries::find($drivers->type_activity))
{{"$deliveries->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->state}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($drivers->image!=null)
{{'/files/'.$drivers->image}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($drivers->certificat_date)
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromCarbon(\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $drivers->certificat_date))->format('%A, %d %B %Y')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d', $drivers->certificat_date)->format('M d Y')}}
@endif
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->certificate_validity}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($level=\App\Models\MyLevel::find($drivers->level))
{{"$level->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->credit}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->notif_token}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->car_tag}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($state_driver=\App\Models\MyState_Driver::find($drivers->status_driver))
{{"$state_driver->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($car_models=\App\Models\MyCar_Models::find($drivers->car_model))
{{"$car_models->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->code}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$drivers->intro_code}}
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
