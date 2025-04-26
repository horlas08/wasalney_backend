@extends('admin-panel.layout.index')



@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">فرم‌ها /</span>
            عمل‌های چسبان
        </h4>
        <!-- Sticky Actions -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
                        <h5 class="card-title mb-sm-0 me-2">Form Title</h5>
                        <div class="action-btns">
                            <button class="btn btn-label-primary me-3">
                                <span class="align-middle"> بازگشت</span>
                            </button>
                            <button id="btn-submit" class="btn btn-primary ">ارسال</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="SubmitForm" class="reset-form" action="{{route('form')}}" method="post">
                            @csrf
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-8 mx-auto">
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label" for="fullname">Text</label>
                                            <input type="text" id="fullname" class="form-control" placeholder="جان اسنو">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label" for="address">Textarea</label>
                                            <textarea name="address" class="form-control" id="address" rows="2" placeholder="بلوار نیایش"></textarea>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="deliveryAdd" checked>
                                                <label class="form-check-label" for="deliveryAdd">
                                                    Checkbox
                                                </label>
                                            </div>
                                        </div>

                                        <label class="form-check-label">RadioButton</label>
                                        <div class="col mt-2">
                                            <div class="form-check form-check-inline">
                                                <input name="collapsible-address-type" class="form-check-input" type="radio" value="" id="collapsible-address-type-home" checked>
                                                <label class="form-check-label" for="collapsible-address-type-home">Radio1</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input name="collapsible-address-type" class="form-check-input" type="radio" value="" id="collapsible-address-type-office">
                                                <label class="form-check-label" for="collapsible-address-type-office">
                                                    Radio2
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="formFile" class="form-label">File</label>
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                        <!-- Basic -->
                                        <div class="col-md-12 mb-4">
                                            <label for="select2Basic" class="form-label">Select</label>
                                            <select id="select2Basic" class="select2 form-select form-select-lg" data-allow-clear="true">
                                                <option value="AK">آذربایجان غربی</option>
                                                <option value="HI">خراسان شمالی</option>
                                                <option value="CA">البرز </option>
                                                <option value="NV">هرمزگان </option>
                                                <option value="OR">اصفهان</option>
                                                <option value="WA">رشت</option>
                                                <option value="AZ">اردبیل</option>
                                                <option value="CO">ایلام </option>
                                                <option value="ID">خوزستان </option>
                                                <option value="MT">مازندران </option>
                                                <option value="NE">مرکزی </option>
                                                <option value="NM">کرج</option>
                                                <option value="ND">قم</option>
                                                <option value="UT">بندرعباس</option>
                                                <option value="WY">کرمان</option>
                                                <option value="AL">آذربایجان شرقی</option>
                                                <option value="AR">اصفهان </option>
                                                <option value="IL">زنجان </option>
                                                <option value="IA">سیستان و بلوچستان</option>
                                                <option value="KS">فارس </option>
                                                <option value="KY">قزوین </option>
                                                <option value="LA">قم </option>
                                                <option value="MN">گلستان </option>
                                                <option value="MS">گیلان </option>
                                                <option value="MO">لرستان</option>
                                                <option value="OK">لورم ایپسوم</option>
                                                <option value="SD">لورم ایپسوم متن</option>
                                                <option value="TX">تبریز</option>
                                                <option value="TN">لورم ایپسوم</option>
                                                <option value="WI">لورم ایپسوم</option>
                                                <option value="CT">بوشهر </option>
                                                <option value="DE">تهران </option>
                                                <option value="FL">خراسان جنوبی</option>
                                                <option value="GA">خراسان رضوی</option>
                                                <option value="IN">سمنان </option>
                                                <option value="ME">کردستان </option>
                                                <option value="MD">کرمان </option>
                                                <option value="MA">کرمانشاه </option>
                                                <option value="MI">کهگیلویه و بویراحمد</option>
                                                <option value="NH">همدان </option>
                                                <option value="NJ">یزد</option>
                                                <option value="NY">تبریز</option>
                                                <option value="NC">لورم ایپسوم متن</option>
                                                <option value="OH">لورم</option>
                                                <option value="PA">لورم ایپسوم متن</option>
                                                <option value="RI">لورم ایپسوم متن</option>
                                                <option value="SC">لورم ایپسوم متن</option>
                                                <option value="VT">لورم ایپسوم</option>
                                                <option value="VA">لورم ایپسوم</option>
                                                <option value="WV">لورم ایپسوم متن</option>
                                            </select>
                                        </div>
                                        <!-- Multiple -->
                                        <div class="col-md-12 mb-4">
                                            <label for="select2Multiple" class="form-label">MultiSelect</label>
                                            <select id="select2Multiple" class="select2 form-select" multiple>
                                                <optgroup label="منطقه زمانی آلاسکا">
                                                    <option value="AK">آذربایجان غربی</option>
                                                    <option value="HI">خراسان شمالی</option>
                                                </optgroup>
                                                <optgroup label="منطقه زمانی اقیانوسیه">
                                                    <option value="CA">البرز </option>
                                                    <option value="NV">هرمزگان </option>
                                                    <option value="OR">اصفهان</option>
                                                    <option value="WA">رشت</option>
                                                </optgroup>
                                                <optgroup label="منطقه زمانی کوهستانی">
                                                    <option value="AZ">اردبیل</option>
                                                    <option value="CO" selected>ایلام </option>
                                                    <option value="ID">خوزستان </option>
                                                    <option value="MT">مازندران </option>
                                                    <option value="NE">مرکزی </option>
                                                    <option value="NM">کرج</option>
                                                    <option value="ND">قم</option>
                                                    <option value="UT">بندرعباس</option>
                                                    <option value="WY">کرمان</option>
                                                </optgroup>
                                                <optgroup label="منطقه زمانی مرکزی">
                                                    <option value="AL">آذربایجان شرقی</option>
                                                    <option value="AR">اصفهان </option>
                                                    <option value="IL">زنجان </option>
                                                    <option value="IA">سیستان و بلوچستان</option>
                                                    <option value="KS">فارس </option>
                                                    <option value="KY">قزوین </option>
                                                    <option value="LA">قم </option>
                                                    <option value="MN">گلستان </option>
                                                    <option value="MS">گیلان </option>
                                                    <option value="MO">لرستان</option>
                                                    <option value="OK">لورم ایپسوم</option>
                                                    <option value="SD">لورم ایپسوم متن</option>
                                                    <option value="TX">تبریز</option>
                                                    <option value="TN">لورم ایپسوم</option>
                                                    <option value="WI">لورم ایپسوم</option>
                                                </optgroup>
                                                <optgroup label="منطقه زمانی شرقی">
                                                    <option value="CT">بوشهر </option>
                                                    <option value="DE">تهران </option>
                                                    <option value="FL" selected>خراسان جنوبی</option>
                                                    <option value="GA">خراسان رضوی</option>
                                                    <option value="IN">سمنان </option>
                                                    <option value="ME">کردستان </option>
                                                    <option value="MD">کرمان </option>
                                                    <option value="MA">کرمانشاه </option>
                                                    <option value="MI">کهگیلویه و بویراحمد</option>
                                                    <option value="NH">همدان </option>
                                                    <option value="NJ">یزد</option>
                                                    <option value="NY">تبریز</option>
                                                    <option value="NC">لورم ایپسوم متن</option>
                                                    <option value="OH">لورم</option>
                                                    <option value="PA">لورم ایپسوم متن</option>
                                                    <option value="RI">لورم ایپسوم متن</option>
                                                    <option value="SC">لورم ایپسوم متن</option>
                                                    <option value="VT">لورم ایپسوم</option>
                                                    <option value="VA">لورم ایپسوم</option>
                                                    <option value="WV">لورم ایپسوم متن</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- /Sticky Actions -->
    </div>
    <!-- / Content -->
@endsection


@section('style')
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css">
@endsection

@section('script')

    <!-- Vendors JS -->
    <script src="/assets/vendor/libs/jquery-sticky/jquery-sticky.js"></script>
    <script src="/assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="/assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="/assets/vendor/libs/select2/select2.js"></script>
    <script src="/assets/vendor/libs/select2/i18n/fa.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/form-layouts.js"></script>
    <script src="/assets/js/forms-selects.js"></script>
@endsection
