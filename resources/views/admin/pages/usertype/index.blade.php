@extends('admin.part.app')
@section('title')
    @lang('city Cars')
@endsection
@section('styles')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">@lang('city')</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">@lang('home')</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{ url('/admin/pages') }}">@lang('pages')</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <section id="">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="head-label">
                                    <h4 class="card-title">@lang('pages')</h4>
                                </div>
                                <div class="text-right">
                                    <div class="form-gruop">
                                        <button class="btn btn-outline-primary button_modal" type="button"
                                                data-toggle="modal" id=""
                                                data-target="#full-modal-stem"><span><i
                                                    class="fa fa-plus"></i>@lang('add')</span>
                                        </button>

                                    </div>
                                </div>
                            </div>


                            <div class="card-body">
                                <form id="search_form">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="s_name">@lang('code')</label>
                                                <input id="s_number" type="text" class="search_input form-control"
                                                       placeholder="@lang('code')">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="s_mobile">@lang('phone')</label>
                                                <input id="s_phone" type="text" class="search_input form-control"
                                                       placeholder="@lang('phone')">
                                            </div>
                                        </div>

                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="city_id">@lang('city')</label>
                                                <select name="city_id" id="city_id" class="search_input form-control"
                                                        data-select2-id="select2-data-1-bgy2" tabindex="-1" aria-hidden="true">
                                                    <option selected disabled>Select @lang('city')</option>
                                                    @foreach ($cities as $itemm)
                                                        <option value="{{ $itemm->id }}"> {{ $itemm->name }} </option>
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="area_id">@lang('area')</label>
                                                <select name="area_id" id="area_id" class="search_input form-control"
                                                        data-select2-id="select2-data-1-bgy2" tabindex="-1" aria-hidden="true">
                                                    @foreach ($area as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="s_user_type_id">@lang('type')</label>
                                                <select name="s_user_type_id" id="type_id" class="search_input form-control"
                                                        data-select2-id="select2-data-1-bgy2" tabindex="-1" aria-hidden="true">
                                                    <option selected disabled>Select @lang('type')</option>
                                                    @foreach ($user as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->Name }} </option>
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3" style="margin-top: 20px">
                                            <div class="form-group">
                                                <button id="search_btn" class="btn btn-outline-info" type="submit">
                                                    <span><i class="fa fa-search"></i> @lang('search')</span>
                                                </button>
                                                <button id="clear_btn" class="btn btn-outline-secondary" type="submit">
                                                    <span><i class="fa fa-undo"></i> @lang('reset')</span>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <div class="table-responsive card-datatable" style="padding: 20px">
                                <table class="table" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('phone')</th>
                                            <th>@lang('code')</th>
                                            <th>@lang('about')</th>
                                            <th>@lang('city')</th>
                                            <th>@lang('area')</th>
                                            <th>@lang('type')</th>
                                            <th style="width: 225px;">@lang('actions')</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" class="full-modal-stem" id="full-modal-stem" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@lang('add')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("usertype.store") }}" method="POST" id="add-mode-form" class="add-mode-form"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="modal-body">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone">@lang('phone')</label>
                                <input type="number" class="form-control"
                                       placeholder="@lang('phone')" name="phone"
                                      id="phone" >
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="number">@lang('code')</label>
                                <input type="text" class="form-control"
                                       placeholder="@lang('code')" name="number"
                                       id="number" >
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>


                        @foreach (locales() as $key => $value)
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="about_{{ $key }}">@lang('about') @lang($value)</label>
                                    <input type="text" class="form-control"
                                        placeholder="@lang('about') @lang($value)" name="about_{{ $key }}"
                                        id="about_{{ $key }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">@lang('city')</label>
                                <select name="city_id" id="" class="select form-control"
                                    data-select2-id="select2-data-1-bgy2" tabindex="-1" aria-hidden="true">
                                    <option selected disabled>Select @lang('area')</option>
                                    @foreach ($cities as $itemm)
                                        <option value="{{ $itemm->id }}"> {{ $itemm->name }} </option>
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">@lang('area')</label>
                                <select name="area_id" id="" class="select form-control"
                                        data-select2-id="select2-data-1-bgy2" tabindex="-1" aria-hidden="true">

                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="">@lang('type')</label>
                                <select name="user_type_id" id="" class="select form-control"
                                        data-select2-id="select2-data-1-bgy2" tabindex="-1" aria-hidden="true">
                                    <option selected disabled>Select @lang('type')</option>
                                    @foreach ($user as $itemm)
                                        <option value="{{ $itemm->id }}"> {{ $itemm->Name }} </option>
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone">@lang('password')</label>
                                <input type="password" class="form-control"
                                       placeholder="@lang('password')" name="password"
                                       id="phone" >
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">@lang('close')</button>
                            <button class="btn btn-primary">@lang('add')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("usertype.update") }}" method="POST" id="form_edit" class="form_edit"
                      enctype="multipart/form-data">
                    @csrf

<input type="hidden" id="id" name="id">
                    <div class="modal-body">

                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone">@lang('phone')</label>
                                <input type="number" class="form-control"
                                       placeholder="@lang('phone')" name="phone"
                                       id="edit_phone" >
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="number">@lang('code')</label>
                                <input type="text" class="form-control"
                                       placeholder="@lang('code')" name="number"
                                       id="edit_number" >
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>


                        @foreach (locales() as $key => $value)
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="about_{{ $key }}">@lang('about') @lang($value)</label>
                                    <input type="text" class="form-control"
                                           placeholder="@lang('about') @lang($value)" name="about_{{ $key }}"
                                           id="edit_about_{{ $key }}">
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">@lang('city')</label>
                                <select name="city_id" id="edit_city" class="select form-control"
                                        data-select2-id="select2-data-1-bgy2" tabindex="-1" aria-hidden="true">
                                    <option selected disabled>Select @lang('area')</option>
                                    @foreach ($cities as $itemm)
                                        <option value="{{ $itemm->id }}"> {{ $itemm->name }} </option>
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="">@lang('area')</label>
                                <select name="area_id" id="edit_area" class="select form-control"
                                        data-select2-id="select2-data-1-bgy2" tabindex="-1" aria-hidden="true">
                                    <option >  </option>

                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="">@lang('type')</label>
                                <select name="user_type_id" id="edit_type" class="select form-control"
                                        data-select2-id="select2-data-1-bgy2" tabindex="-1" aria-hidden="true">
                                    <option selected disabled>Select @lang('type')</option>
                                    @foreach ($user as $itemm)
                                        <option value="{{ $itemm->id }}"> {{ $itemm->Name }} </option>
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">@lang('close')</button>
                            <button class="btn btn-primary">@lang('save changes')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //bindTable
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            searching:false,
            "oLanguage": {
                @if (app()->isLocale('ar'))
                    "sEmptyTable": "ليست هناك بيانات متاحة في الجدول",
                    "sLoadingRecords": "جارٍ التحميل...",
                    "sProcessing": "جارٍ التحميل...",
                    "sLengthMenu": "أظهر _MENU_ مدخلات",
                    "sZeroRecords": "لم يعثر على أية سجلات",
                    "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                    "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                    "sInfoPostFix": "",
                    "sSearch": "ابحث:",
                    "oAria": {
                        "sSortAscending": ": تفعيل لترتيب العمود تصاعدياً",
                        "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
                    },
                @endif // "oPaginate": {"sPrevious": '<-', "sNext": '->'},
            },
            ajax: {
                url: '{{route('usertype.getData',app()->getLocale())}}',
                data: function(d) {
                    d.phone = $('#s_phone').val();
                    d.number = $('#s_number').val();
                    d.city_id = $('#city_id').val();
                    d.area_id = $('#area_id').val();
                    d.user_type_id = $('#type_id').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'phone',
                    name: 'phone'
                },
                {
                    data: 'number',
                    name: 'number'
                },
                {
                    data: 'about.{{ app()->currentLocale() }}',
                    name: 'About'
                },
                {
                    data: 'city',
                    name: 'city'
                },
                {
                    data: 'area',
                    name: 'area'
                },
                {
                    data: 'Type',
                    name: 'Type'
                },

                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: true
                },
            ]

        });


        $(document).ready(function() {
            $(document).on('click', '.btn_edit', function(event) {
                $('input').removeClass('is-invalid');
                $('.invalid-feedback').text('');
                event.preventDefault();
                var button = $(this);
                var id = button.data('id');
                $('#edit_city').val(button.data('city')).trigger('change');
                $('#edit_area').val(button.data('area')).trigger('change');
                $('#edit_type').val(button.data('user_type_id')).trigger('change');
                $('#edit_phone').val(button.data('phone'));
                $('#edit_number').val(button.data('number'));
                $('#id').val(id);
                @foreach (locales() as $key => $value)
                    $('#edit_about_{{ $key }}').val(button.data('about_{{ $key }}'))
                @endforeach

            });
        });


    </script>
    <script>
        $(document).ready(function () {
            $('select[name="city_id"]').on('change', function () {
                var city_id = $(this).val();
                if (city_id) {
                    $.ajax({
                        url: "usertype/area" +"/"+ city_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="area_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="area_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });

    </script>
@endsection