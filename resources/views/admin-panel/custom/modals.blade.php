


<div id="call_modal" class="modal fade" tabindex="-1" style="display: none; padding-right: 0px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 id="call_modal_header" class="mb-4 secondary-font"></h3>
                </div>

                <img  id="call_modal_avatar" src="" width="50">
                <p id="call_modal_name"></p>
                <p id="call_modal_mobile"></p>
                {{--                <div id="call_select_user" class="m-2 rol_box" style="display: {{app('request')->input('role')==1?'block':'none'}}">--}}
                {{--                    <label for="user" class="form-label">کاربر (جهت اضافه کردن به کاربرهای موجود) </label>--}}
                {{--                    <select id="select_user" name="user" class="select2 form-select form-select-lg">--}}
                {{--                        <option value="0">انتخاب نمایید</option>--}}
                {{--                        @foreach( db('users')->getRecords() as $user )--}}
                {{--                            <option {{app('request')->input('user')==$user->id?'selected="selected"':''}} value="{{$user->id}}">{{$user->name.'('.$user->mobile.')'}}</option>--}}
                {{--                        @endforeach--}}

                {{--                    </select>--}}
                {{--                </div>--}}

                <a id="call_modal_user" target="_blank" href="" type="submit" class="btn btn-primary me-sm-3 me-1">ثبت کاربر جدید</a>
                <a id="call_modal_user_tell" target="_blank" href="" type="submit" class="btn btn-primary me-sm-3 me-1">ثبت کاربر جدید</a>
            </div>
        </div>
    </div>
</div>
<button id="call_modal_btn" style="display: none" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#call_modal">
    نمایش
</button>



