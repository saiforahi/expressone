@extends('admin.layout.app')
@section('title', 'Shipping Area')
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Area Manage</h3>
                </div>
                <div class="title_right">
                    <div class="form-group pull-right top_search">
                        <button type="button" class="btn btn-info btn-sm add-hub">
                            <i class="fa fa-plus fs-13 m-r-3"></i> Add New Area
                        </button>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <hr>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ $error }}
                    </div>
                @endforeach
            @endif
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr class="bg-dark">
                                            <th>Area Name</th>
                                            <th>Hub</th>
                                            <th>Shipping Distribution Zone</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="x_panel">
                        <div class="x_title">
                            <h4 class="modal-header"></h4>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form id="upload_form" autocomplete="off" method="post"
                                class="form-horizontal form-label-left input_mask">
                                {{ csrf_field() }}
                                <input type="hidden" value="" name="id" id="area_id">
                                <div class="form-group has-feedback">
                                    <label for="unit_id">Delivery Unit:</label>
                                    <select class="col-md-7 col-xs-12 select2_single" name="unit_id" id="unit_id">
                                        <option></option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="point_id">Point:</label>
                                    <select class="col-md-7 col-xs-12 select2_single" name="point_id" id="point_id" required>
                                        <option></option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="code">Location:</label>
                                    <input type="text" class="form-control" placeholder="Location" name="location" id="location"
                                        value="">
                                </div>
                                <hr>
                                <div class="col-md-12 form-group has-feedback ">
                                    <button type="submit" class="btn btn-success pull-right"><i
                                            class="mdi mdi-content-save m-r-3"></i>Save
                                    </button>
                                    <button type="button" class="btn btn-primary pull-right" data-dismiss="modal">
                                        <i class="mdi mdi-cancel m-r-3"></i>Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <link href="{{ asset('ass_vendors/sweetalert/sweetalert.css') }}" rel="stylesheet" />
    <!-- Datatables -->
    <link href="{{ asset('ass_vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('ass_vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endpush
@push('scripts')
    <!-- Datatables -->
    <script src="{{ asset('ass_vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('ass_vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('ass_vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('ass_vendors/sweetalert/sweetalert.js') }}"></script>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).on('click', '.Change', function() {
            let id = $(this).attr('id'),
                action;
            let clases = $(this);
            if ($(this).hasClass("btn-success")) {
                action = 'inactive';
                $.ajax({
                    url: '{{ route('area.update') }}',
                    type: 'post',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id,
                        action: action
                    },
                    success: function(response) {
                        $(clases).toggleClass('btn-success btn-info');
                        $(clases).html('Inactive');
                    }
                });
            } else {
                action = 'active';
                $.ajax({
                    url: '{{ route('area.update') }}',
                    type: 'post',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id,
                        action: action
                    },
                    success: function(response) {
                        $(clases).toggleClass('btn-info btn-success');
                        $(clases).html('Active');
                    }
                });

            }
        });

        $(document).ready(function() {
            $('#zone_id').on('change', function() {
                let id = $(this).val();
                $.ajax({
                    url: "{{ route('SelectHub') }}",
                    type: 'post',
                    data: {
                        _token: CSRF_TOKEN,
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#hub_id').html('').append($('<option>', {
                            value: '',
                            text: 'Select Hub'
                        }));
                        data.forEach(function(element) {
                            $('#hub_id').append($('<option>', {
                                value: element.id,
                                text: element.name
                            }));
                        });
                    }
                });
            });

            $(function() {
                table.ajax.reload();
            });
            let table = $('.table').DataTable({
                processing: true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                },

                serverSide: true,
                ajax: "{{ route('AdminAreaGet') }}",
                order: [
                    [0, 'desc']
                ],
                columns: [{
                        data: 'name'
                    }, {
                        data: 'hub'
                    }, {
                        data: 'zone'
                    },
                    {
                        data: 'status',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false,
                        class: 'text-right'
                    }
                ]
            });


            $(document).on('click', '.add-hub', function() {
                $('#hub_id').val('').trigger('change');
                $('#zone_id').val('').trigger('change');
                $('#myModal').modal('show');
                $('#upload_form').trigger("reset");
                $('.modal-header').html('New Area Entry');
            });

            $('#upload_form').on('submit', function() {
                event.preventDefault();
                let form = new FormData(this);
                let id = $('#hub_id').val();
                if (id === '') {
                    swal({
                        title: "Are you sure want to add area?",
                        text: "If all information is correct, press ok.",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }, function() {
                        setTimeout(function() {
                            $.ajax({
                                url: "{{ route('area.store') }}",
                                method: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form,
                                dataType: 'json',
                                error: function(data) {
                                    if (data.status === 422) {
                                        var errors = $.parseJSON(data
                                            .responseText);
                                        let allData = '',
                                            mainData = '';
                                        $.each(errors, function(key, value) {
                                            if ($.isPlainObject(
                                                value)) {
                                                $.each(value, function(
                                                    key, value
                                                    ) {
                                                    allData +=
                                                        value +
                                                        "<br/>";
                                                });
                                            } else {
                                                mainData += value +
                                                    "<br/>";
                                            }
                                        });
                                        swal({
                                            title: mainData,
                                            text: allData,
                                            type: 'error',
                                            html: true,
                                            confirmButtonText: 'Ok'
                                        })
                                    }
                                },
                                success: function(data) {
                                    if (data == 1) {
                                        swal("Area add successfully");
                                        $("#upload_form").trigger("reset");
                                        $('#myModal').modal('hide');
                                        table.ajax.reload();
                                    } else {
                                        swal(
                                            "Something wrong, please try again later!");
                                        $("#upload_form").trigger("reset");
                                        $('#myModal').modal('hide');
                                    }
                                }
                            })
                        }, 2000);
                    });
                } else {
                    swal({
                        title: "Are you sure want to update area?",
                        text: "If all information is correct, press ok.",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true
                    }, function() {
                        setTimeout(function() {
                            $.ajax({
                                url: "{{ route('area.store') }}",
                                method: "POST",
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form,
                                dataType: 'json',
                                error: function(data) {
                                    if (data.status === 422) {
                                        var errors = $.parseJSON(data
                                            .responseText);
                                        let allData = '',
                                            mainData = '';
                                        $.each(errors, function(key, value) {
                                            if ($.isPlainObject(
                                                value)) {
                                                $.each(value, function(
                                                    key, value
                                                    ) {
                                                    allData +=
                                                        value +
                                                        "<br/>";
                                                });
                                            } else {
                                                mainData += value +
                                                    "<br/>";
                                            }
                                        });
                                        swal({
                                            title: mainData,
                                            text: allData,
                                            type: 'error',
                                            html: true,
                                            confirmButtonText: 'Ok'
                                        })
                                    }
                                },
                                success: function(data) {
                                    if (data == 1) {
                                        swal("Area update successfully");
                                        $("#upload_form").trigger("reset");
                                        $('#myModal').modal('hide');
                                        table.ajax.reload();
                                    } else {
                                        swal(
                                            "Something wrong, please try again later!");
                                        $("#upload_form").trigger("reset");
                                        $('#myModal').modal('hide');
                                    }
                                }
                            })
                        }, 2000);
                    });
                }
            });


            $(document).on('click', '.edit', function() {
                $('#myModal').modal('show');
                $('.modal-header').html('Area Information Update');
                $("#upload_form").trigger("reset");
                let id = $(this).attr('id');
                $.ajax({
                    url: "{{ route('area.single') }}",
                    type: 'get',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#area_id').val(data.id);
                        $('#hub_id').val(data.hub_id).trigger('change');
                        $('#zone_id').val(data.zone_id).trigger('change');
                        $('#name').val(data.name);
                    }
                });
            });

            $(document).on('click', '.delete', function() {
                let id = $(this).attr('id');
                // alert(id) ; return false;
                if (confirm('Are you sure to delete the area??')) {
                    $.ajax({
                        url: "/admin/area-delete/" + id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                swal({
                                    title: "Deleted",
                                    text: 'Area has been deleted',
                                    type: 'success',
                                    confirmButtonText: 'Ok'
                                });
                                table.ajax.reload();
                            } else {
                                swal({
                                    title: "Something went wroing",
                                    text: 'Area unable to delete',
                                    type: 'error',
                                    confirmButtonText: 'Ok'
                                });
                            }
                        }
                    });
                }
            });

        });
    </script>

@endpush
