
@php($lang=getLang())

<html lang="{{$lang}}">
<head>
    <title>{{__("سفارشات")}}</title>
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

        <th>{{__("اطلاعات ثبت کننده سفارش")}}</th>
        <th>{{__("کد رهگیری")}}</th>
        <th>{{__("راننده")}}</th>
        <th>{{__("قیمت")}}</th>
        <th>{{__("بازگشت")}}</th>
        <th>{{__("زمان توقف")}}</th>
        <th>{{__("آدرس مبدا")}}</th>
        <th>{{__("آدرس مقصد")}}</th>
        <th>{{__("نوع پرداخت")}}</th>
        <th>{{__("امتیاز")}}</th>
        <th>{{__("وضعیت لغو")}}</th>
        <th>{{__("تاریخ وساعت")}}</th>
        <th>{{__("طرف پرداخت")}}</th>
        <th>{{__("نوع تحویل")}}</th>
        <th>{{__("نام")}}</th>
        <th>{{__("موبایل")}}</th>
        <th>{{__("لغو شده توسط")}}</th>
        <th>{{__("امتیاز راننده")}}</th>
        <th>{{__("رضایت راننده از کاربر")}}</th>
        <th>{{__("درصد عجله دارم")}}</th>
        <th>{{__("دلیل لغو")}}</th>
        <th>{{__("خالص دریافتی راننده")}}</th>
        <th>{{__("درصد تخفیف")}}</th>
        <th>{{__("کد تخفیف")}}</th>
        <th>{{__("قیمت با تخفیف")}}</th>
        <th>{{__("اقتصادی")}}</th>
        <th>{{__("وضعیت")}}</th>
        

    </tr>
    </thead>
    <tbody>

        @foreach($records as $orders)
<tr>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($users=\App\Models\MyUsers::find($orders->user))
{{"($users->mobile) $users->name"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->code}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($drivers=\App\Models\MyDrivers::find($orders->driver))
{{"$drivers->name"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->price}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->comeback}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->stop_time}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->origin_address}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->destination_address}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($pay_typs=\App\Models\MyPay_Typs::find($orders->pay_type))
{{"$pay_typs->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->rate}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->cancel_status}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if(getLang()=='fa')
{{\Morilog\Jalali\Jalalian::fromDateTime($orders->created_at)->format('%A, %d %B %Y H:i')}}
@else
{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s', $orders->created_at)->format('M d Y H:i')}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->pay_side}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($deliveries=\App\Models\MyDeliveries::find($orders->delivery_id))
{{"$deliveries->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->name}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->mobile}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->canceled_by}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->driver_rate}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->user_rate}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->hurry_percent}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($cancel_trip=\App\Models\MyCancel_Trip::find($orders->cancel_reason))
{{"$cancel_trip->title"}}
@endif
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->net_price}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->percent_discount}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->percent_code}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->discounted_price}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
{{$orders->economic}}
</td>
<td style="text-align:center;font-weight:bold;width:auto;">
@if($statuses=\App\Models\MyStatuses::find($orders->state))
{{"$statuses->title"}}
@endif
</td>
</tr>
@endforeach


    </tbody>
</table>
</body>
</html>
