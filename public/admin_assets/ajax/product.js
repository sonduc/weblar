$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var userTable = $('#responsive-datatable').DataTable({
        processing: true,
        order: [
            [0, 'desc']
        ],
        ordering: true,
        serverSide: true,
        ajax: path + 'admin/products/anyData',
        columns: [
          { data: 'id', name: 'products.id' },
          { data: 'code', name: 'products.code' },
          { data: 'name', name: 'products.email' },
          { data: 'status', name: 'products.status' },
          { data: 'price', name: 'products.price' },
          { data: 'category_name', name: 'categories.name' },
          { data: 'brand_name', name: 'brands.name' },
          { data: 'action', name: 'action' },
        ]
    });
    $('#add_new').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: path + 'admin/products',
            data: {
                code: $('#code').val(),
                name: $('#name').val(),
                description: $('#description').val(),
                content: CKEDITOR.instances.content.getData(),
                status: $('.status:checked').val(),
                price: $('#price').val(),
                category_id: $('#category_id').val(),
                brand_id: $('#brand_id').val(),
            },
            success: function(response) {
                console.log(response)
                $('#add').modal('hide');
                toastr.success('Thêm thành công!');
                CKEDITOR.instances.content.setData(" ");
                document.getElementById("add_new").reset();
                userTable.ajax.reload();
            },
            error: function(error) {
                toastr.warning(error.responseJSON.errors.name);
            }
        })
    });
    $(document).on('click', '#deleteProduct', function(e) {
        var id = $(this).attr('delete');
        e.preventDefault();
        swal({
            dangerMode: true,
            title: "Bạn có muốn xóa viết này không?",
            icon: "warning",
            buttons: {
                cancel: 'Hủy',
                confirm: 'Xóa'
            }
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "delete",
                    url: path + 'admin/products/' + id,
                    success: function(res) {
                        toastr.success('Bài viết đã được xóa!', "");
                        $('#tr-' + id).remove();
                    },
                    error: function() {}
                });
            }
        });
    });
    $(document).on('click', '#editProduct', function() {
        $('#editP').modal('show');
        var id = $(this).attr('edit');
        $.ajax({
            type: 'get',
            url: path + 'admin/products/' + id + '/edit',
            success: function(response) {
                $('#edit_id').val(response.id);
                $('#edit_code').val(response.code);
                $('#edit_name').val(response.name);
                $('#edit_description').val(response.description);
                CKEDITOR.instances.edit_content.setData(response.content);
                $('input:radio[name="edit_status"][value="' + response.status + '"]').attr('checked', true);
                $('#edit_price').val(response.price);
                $('#edit_category_id').val(response.category_id);
                $('#edit_brand_id').val(response.brand_id);
            }
        })
    });
    $('#edit_new').on('submit', function(e) {
        e.preventDefault();
        var id = $('#edit_id').val();
        $.ajax({
            type: 'put',
            url: path + 'admin/products/' + id,
            data: {
                code: $('#edit_code').val(),
                name: $('#edit_name').val(),
                description: $('#edit_description').val(),
                content: CKEDITOR.instances.edit_content.getData(),
                status: $('.edit_status:checked').val(),
                price: $('#edit_price').val(),
                category_id: $('#edit_category_id').val(),
                brand_id: $('#edit_brand_id').val(),
            },
            success: function(response) {
                $('#editP').modal('hide');
                toastr.success('Sửa thành công!');
                userTable.ajax.reload();
            },
            error: function(error) {
                toastr.warning(error.responseJSON.errors.name);
            }
        })
    });
    // image
    var idTest = '';
    $(document).on('click', '.btn-info', function(e) {
        idTest = $(this).attr('showImage');
        $('#showImage').modal('show');
        var id = $(this).attr('showImage');
        $.ajax({
            type: 'get',
            url: path + 'admin/products/showImage/' + id,
            success: function(response) {
                // console.log(response);
                $('#Detail_image').html("");
                for (var i = 0; i < response.length; i++) {
                    $('#Detail_image').append("<img class='suaAnh' id='anh-" + response[i].id + "' src='" + response[i].link + "'>" + "<i class='icon-im icon-im-cross' id='icon-" + response[i].id + "' xoaAnh='" + response[i].id + "'></i>");
                }
            }
        })
    });
    $("#newImage").change(function() {
        $('#DsAnh').html("");
        var total_file = document.getElementById("newImage").files.length;
        for (var i = 0; i < total_file; i++) {
            $('#DsAnh').append("<img class='suaAnh2' src='" + URL.createObjectURL(event.target.files[i]) + "'>");
        }
    });
    $('#add_image_new').on('submit', function(e) {
        e.preventDefault();
        var newPost = new FormData();
        var files = document.getElementById('newImage').files;
        for (var i = 0; i < files.length; i++) {
            newPost.append('image[]', files[i]);
        }
        newPost.append('product_id', idTest);
        $.ajax({
            type: 'post',
            url: path + 'admin/products/storeImage',
            dataType: 'json',
            data: newPost,
            async: false,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                toastr.success('Thêm thành công!');
                $('#DsAnh').html("");
                response.map(function(value, index) {
                    $('#Detail_image').append("<img class='suaAnh' id='anh-" + value.id + "' src='" + value.link + "'>" + "<i class='icon-im icon-im-cross' id='icon-" + value.id + "' xoaAnh='" + value.id + "'></i>");
                });
            },
            error: function(error) {}
        })
    });
    $('#buttonDelete').on('click', function() {
        $('.icon-im-cross').toggle(300);
    });
    $(document).on('click', '.icon-im-cross', function(e) {
        var id = $(this).attr('xoaanh');
        e.preventDefault();
        swal({
            dangerMode: true,
            title: "Bạn có muốn xóa ảnh này không?",
            icon: "warning",
            buttons: {
                cancel: 'Hủy',
                confirm: 'Xóa'
            }
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "delete",
                    url: path + 'admin/products/deleteImage/' + id,
                    success: function(res) {
                        toastr.success('Bài viết đã được xóa!', "");
                        $('#icon-' + id).remove();
                        $('#anh-' + id).remove();
                    },
                    error: function() {}
                });
            }
        });
    })
})
