@extends('admin-panel.layout.index')


@section('content')

    <form action="{{route('language.store')}}" method="post"  >
        @csrf
    <div class="widgets" data-index="1">
        <div class="row">
            <div class="col-12">
                <div class="card" >

                    <div id="sticky-wrapper" class="sticky-wrapper" >
                        <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
                            <h5 class="card-title mb-sm-0 me-2">{{__('Store Language')}}</h5>
                            <div class="action-btns">
                                <a href="{{route('language.index')}}" class="btn btn-label-primary me-3">
                                    <span class="align-middle"> {{__('Return')}}</span>
                                </a>
                                <button type="submit" class="btn btn-primary ">{{__('Save')}}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="row mb-5">
                                <div class="col-lg-11 mx-auto">
                                    <div class="row g-3">
                                            <div class="col-md-12">
                                                <label class="form-label" for="title"> {{__('Title')}} </label>
                                                <input type="text" id="title" name="title" class="form-control" />
                                            </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="abbr">{{__('Language')}} </label>
                                            <select id="abbr" name="abbr" class="select2 form-select  form-select-lg" data-width="100%">
                                                    <option value="az">آذرباﻳﺠﺎﻧﻰ</option>
                                                    <option value="sq">آلبانیایی</option>
                                                    <option value="de">آلمانی</option>
                                                    <option value="ur">اردو</option>
                                                    <option value="hy">ارمنی</option>
                                                    <option value="uz">ازبکی</option>
                                                    <option value="es">اسپانیایی</option>
                                                    <option value="eo">اسپرانتو</option>
                                                    <option value="et">استونيايی</option>
                                                    <option value="sk">اسلواکی</option>
                                                    <option value="sl">اسلونیایی</option>
                                                    <option value="af">افریکانس</option>
                                                    <option value="uk">اکراينی</option>
                                                    <option value="am">امهری</option>
                                                    <option value="id">اندونزيايی</option>
                                                    <option value="en">انگلیسی</option>
                                                    <option value="or">اودیه (اوریه)</option>
                                                    <option value="ug">اویغوری</option>
                                                    <option value="it">ایتالیایی</option>
                                                    <option value="ga">ایرلندی</option>
                                                    <option value="is">ايسلندی</option>
                                                    <option value="ig">ایگبو</option>
                                                    <option value="eu">باسکی</option>
                                                    <option value="my">برمه‌ای</option>
                                                    <option value="be">بلاروسی</option>
                                                    <option value="bg">بلغاری</option>
                                                    <option value="bn">بنگالی</option>
                                                    <option value="bs">بوسنیایی</option>
                                                    <option value="pt">پرتغالی</option>
                                                    <option value="ps">پشتو</option>
                                                    <option value="pa">پنجابی</option>
                                                    <option value="tt">تاتار</option>
                                                    <option value="tg">تاجیک</option>
                                                    <option value="ta">تاميلی</option>
                                                    <option value="th">تايلندی</option>
                                                    <option value="tk">ترکمنی</option>
                                                    <option value="tr">ترکی استانبولی</option>
                                                    <option value="te">تلوگو</option>
                                                    <option value="jw">جاوه‌ای</option>
                                                    <option value="cs">چک</option>
                                                    <option value="ny">چوایی</option>
                                                    <option value="zh-CN">چینی</option>
                                                    <option value="km">خمری</option>
                                                    <option value="xh">خوسایی</option>
                                                    <option value="da">دانمارکی</option>
                                                    <option value="ru">روسی</option>
                                                    <option value="ro">رومانيايی</option>
                                                    <option value="zu">زولو</option>
                                                    <option value="ja">ژاپنی</option>
                                                    <option value="sm">ساموایی</option>
                                                    <option value="ceb">سبوانو</option>
                                                    <option value="sd">سندی</option>
                                                    <option value="sw">سواهيلی</option>
                                                    <option value="sv">سوئدی</option>
                                                    <option value="st">سوتو</option>
                                                    <option value="su">سودانی</option>
                                                    <option value="so">سومالیایی</option>
                                                    <option value="si">سینهالی</option>
                                                    <option value="sn">شونا</option>
                                                    <option value="sr">صربی</option>
                                                    <option value="iw">عبری</option>
                                                    <option value="ar">عربی</option>
                                                    <option value="fa">فارسی</option>
                                                    <option value="fr">فرانسوی</option>
                                                    <option value="fy">فريسی</option>
                                                    <option value="fi">فنلاندی</option>
                                                    <option value="tl">فیلیپینی</option>
                                                    <option value="ky">قرقیزی</option>
                                                    <option value="kk">قزاقی</option>
                                                    <option value="ca">کاتالان</option>
                                                    <option value="kn">کانارا</option>
                                                    <option value="ht">کرئول هائیتی</option>
                                                    <option value="ku">کردی</option>
                                                    <option value="co">كرسی</option>
                                                    <option value="hr">کرواتی</option>
                                                    <option value="ko">کره‌ای</option>
                                                    <option value="rw">کینیارواندا</option>
                                                    <option value="gl">گالیسی</option>
                                                    <option value="gd">گاليک اسکاتلندی</option>
                                                    <option value="gu">گجراتی</option>
                                                    <option value="ka">گرجی</option>
                                                    <option value="lo">لائوسی</option>
                                                    <option value="la">لاتين</option>
                                                    <option value="lv">لتونيايی</option>
                                                    <option value="lb">لوگزامبورگی</option>
                                                    <option value="pl">لهستانی</option>
                                                    <option value="lt">ليتوانيايی</option>
                                                    <option value="mi">مائوری</option>
                                                    <option value="mg">مالاگاسی</option>
                                                    <option value="ml">مالایالمی</option>
                                                    <option value="ms">مالايی</option>
                                                    <option value="mt">مالتی</option>
                                                    <option value="hu">مجاری</option>
                                                    <option value="mr">مراتی</option>
                                                    <option value="mn">مغولی</option>
                                                    <option value="mk">مقدونيه‌ای</option>
                                                    <option value="ne">نپالی</option>
                                                    <option value="no">نروژی</option>
                                                    <option value="cy">ولزی</option>
                                                    <option value="vi">ويتنامی</option>
                                                    <option value="haw">هاوایی</option>
                                                    <option value="nl">هلندی</option>
                                                    <option value="hmn">همونگ</option>
                                                    <option value="hi">هندی</option>
                                                    <option value="ha">هوسا</option>
                                                    <option value="yi">یدیشی</option>
                                                    <option value="yo">یوروبایی</option>
                                                    <option value="el">يونانی</option>

                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label" for="direction">{{__('Direction')}} </label>
                                            <select id="direction" name="direction" class="select2 form-select  form-select-lg" data-width="100%">
                                                <option value="rtl">{{__('Right to Left')}}</option>
                                                <option value="ltr">{{__('Left to Right')}}</option>

                                            </select>
                                        </div>




                                    </div>


                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection



@section('styles')
    <link rel="stylesheet" href={{asset("admin-panel/plugins/select2/select2.css")}}>
    <link rel="stylesheet" href={{asset("admin-panel/plugins/select2/theme_default.css")}}>
@endsection

@section('scripts')
    <script src={{asset('admin-panel/plugins/jquery-sticky/jquery-sticky.js')}}></script>
    <script src={{asset('admin-panel/plugins/cleavejs/cleave.js')}}></script>
    <script src={{asset('admin-panel/plugins/cleavejs/cleave-phone.js')}}></script>
    <script src={{asset('admin-panel/plugins/select2/select2.js')}}></script>
    <script src={{asset('admin-panel/plugins/select2/i18n/fa.js')}}></script>

    <!-- Page JS -->
    <script src={{asset('admin-panel/scripts/form-layouts.js')}}></script>
    <script src={{asset('admin-panel/scripts/forms-selects.js')}}></script>
    <script>

        $('#v-language-tab').addClass('DC_activeTab');
    </script>
@endsection
