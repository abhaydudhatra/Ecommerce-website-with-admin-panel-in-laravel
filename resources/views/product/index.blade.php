@extends('layout.main')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Products</h2>
                <div class="d-flex flex-row-reverse"><button
                        class="btn btn-light-primary font-weight-bold mr-2 font-weight-bolder" id="createNewUser"><i
                            class="fas fa-plus"></i>Add Product</button></div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="tableUser">
                            <thead class="font-weight-bold">
                                <tr>
                                    {{-- <th>No.</th> --}}
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>SKU</th>
                                    <th>Categories</th>
                                    <th>Regular Price</th>
                                    <th>Sale Price</th>
                                    <th>Status</th>
                                    <th style="width:90px;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="modal-user" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Product Create</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form name="c_product" id="c_product" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-lg-8">
                                <label>Product Title</label>
                                <input type="hidden" name="user_id" id="user_id" value="">
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Enter Product Title" />
                                <span class="form-text text-muted">Please enter your Product Title</span>
                            </div>
                            <div class="col-lg-4">
                                <label>SKU Code:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-barcode"></i></span></div>
                                    <input type="text" name="sku" id="sku" class="form-control" placeholder="" />
                                </div>
                                <span class="form-text text-muted">Please enter your username</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8">
                                <label for="exampleTextarea">Product Description</label>
                                <textarea name="desc" id="desc" class="form-control"
                                    placeholder="Enter Product Description" rows="3"></textarea>
                            </div>
                            <div class="col-lg-4">
                                <label>Tags:</label>
                                <input name='tag' value=''>
                                <span class="form-text text-muted">Please enter your Product Tags</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <label>Regular Price</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fas fa-money-bill-alt"></i></span></div>
                                    <input type="number" name="regular_price" id="regular_price" class="form-control"
                                        placeholder="Enter your Regular Price" />
                                </div>
                                <span class="form-text text-muted">Please enter Regular Price</span>
                            </div>
                            <div class="col-lg-4">
                                <label>Sale Price</label>
                                <div class="input-group">
                                    <div class="input-group-append"><span class="input-group-text"><i
                                                class="fas fa-dollar-sign"></i></span></div>
                                    <input type="number" name="sale_price" id="sale_price" class="form-control"
                                        placeholder="Enter your Sale Price" />
                                </div>
                                <span class="form-text text-muted">Please enter your Sale Price</span>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option>-- Select Category --</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-8">
                                <div class="form-group">
                                    <label>Product Image</label>
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="img" id="img" />
                                        <label class="custom-file-label" for="img">Choose file</label>
                                    </div>
                                    <span class="form-text text-muted">Please enter your Product Image</span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Status:</label>
                                <div class="radio-inline">
                                    <label class="radio radio-solid">
                                        <input type="radio" name="status" checked="checked" value="1" />
                                        <span></span>
                                        Active
                                    </label>
                                    <label class="radio radio-solid">
                                        <input type="radio" name="status" value="0" />
                                        <span></span>
                                        Draft
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary font-weight-bold" id="saveBtn">Save changes</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // The DOM element you wish to replace with Tagify
    var input = document.querySelector('input[name=tag]');
    // initialize Tagify on the above input node reference
    new Tagify(input)
    $('document').ready(function() {
        // success alert
        function swal_success() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1000
            })
        }
        // error alert
        function swal_error() {
            Swal.fire({
                position: 'centered',
                icon: 'error',
                title: 'Something goes wrong !',
                showConfirmButton: true,
            })
        }
        // table serverside
        var table = $('#tableUser').DataTable({
            processing: false,
            serverSide: true,
            ordering: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ],
            ajax: {
                "url": "{{ route('product.index') }}",
            },
            columns: [{
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'desc',
                    name: 'desc'
                },
                {
                    data: 'sku',
                    name: 'sku'
                },
                {
                    data: 'category.name',
                    name: 'category.name'
                },
                {
                    data: 'regular_price',
                    name: 'regular_price'
                },
                {
                    data: 'sale_price',
                    name: 'sale_price'
                },
                {
                    data: "status",
                    name: 'status',
                    "orderable": false,
                    "render": function(data, type, row) {
                        if (row.status === 1) {
                            return 'Active';
                        } else {
                            return 'Inactive';
                        }
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        // csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // initialize btn add
        $('#createNewUser').click(function() {
            $('#saveBtn').val("create user");
            $('#user_id').val('');
            $('#c_product').trigger("reset");
            $('#modal-user').modal('show');
        });
        // initialize btn edit
        $('body').on('click', '.editUser', function() {
            var product_id = $(this).data('id');
            $.get("{{route('product.index')}}" + '/' + product_id + '/edit', function(data) {
                $('#saveBtn').val("edit-user");
                $('#modal-user').modal('show');
                $('#user_id').val(data.id);
                $('#title').val(data.title);
                $('#sku').val(data.sku);
                $('#desc').val(data.desc);
                $('#regular_price').val(data.regular_price);
                $('#sale_price').val(data.sale_price);
                $('#category_id').val(data.category_id);
            })
        });
        // initialize btn save
        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Save');
            var formData = new FormData($('#c_product')[
            0]); // create a new FormData object with the form data
            $.ajax({
                data: formData, // use the FormData object as the data to send
                url: "{{ route('product.store') }}",
                type: "POST",
                dataType: 'json',
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set the content type
                success: function(data) {
                    $('#c_product').trigger("reset");
                    $('#modal-user').modal('hide');
                    swal_success();
                    table.draw();
                },
                error: function(data) {
                    swal_error();
                    $('#saveBtn').html('Save Changes');
                }
            });
        });
        // initialize btn delete
        $('body').on('click', '.deleteUser', function() {
            var user_id = $(this).data("id");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{route('product.store')}}" + '/' + user_id,
                        success: function(data) {
                            swal_success();
                            table.draw();
                        },
                        error: function(data) {
                            swal_error();
                        }
                    });
                }
            })
        });
        // statusing
    });
</script>
@endpush

@endsection