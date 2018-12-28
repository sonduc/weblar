$(document).ready(function(){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
   });

   // gọi đến đến hàm any data để đổ ra liệu ra cột
   var userTable = $('#responsive-datatable').DataTable({
   processing: true,
   order : [[ 0, 'desc' ]],
   ordering: true,
   serverSide: true,
   ajax: path+'admin/categories/anyData',
   columns: [
      { data: 'id', name: 'categories.id' },
      { data: 'name', name: 'categories.name' },
      { data: 'slug', name: 'categories.slug' },
      { data: 'action', name: 'action' },
      ]
   });

   // goi hàm thêm dữ liệu
   $('#add_new').on('submit',function(e) {
      e.preventDefault();
      $.ajax({
         type: 'post',
         url: path+'admin/categories',
         data: {
            name: $('#name').val(),
            slug: $('#name').val(),
         },
         success: function (response){
            $('#add').modal('hide');
            $('#name').text(" ");
            toastr.success('Thêm thành công!');

            document.getElementById("add_new").reset();
            userTable.ajax.reload();
         },
         error: function (error) {
            toastr.warning(error.responseJSON.errors.name);
         }
      })
   });
   // gọi đến hàm xóa
   $(document).on('click', '#deleteCategory', function (e) {
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
      })
      .then((willDelete) => {
         if (willDelete) {
            $.ajax({
               type: "delete",
               url: path+ 'admin/categories/' + id,
               success: function(res)
               {
                  toastr.success('Bài viết đã được xóa!', "");
                  $('#tr-' + id).remove();
               },
               error: function (){

               }
            });
         }
      });
   });
   // gọi đến hàm lấy dữ liệu của 1 đối tượng để sửa
   $(document).on('click', '#editCategory', function() {
      $('#editP').modal('show');
      var id = $(this).attr('edit');
      $.ajax({
         type: 'get',
         url: path+ 'admin/categories/' + id+'/edit',
         success: function(response){
            $('#edit_id').val(response.id);
            $('#edit_name').val(response.name);
         }
      })
   });
   // gọi đến hàm sửa
   $('#edit_new').on('submit',function(e) {
      e.preventDefault();
      var id = $('#edit_id').val();
      $.ajax({
         type: 'put',
         url: path+ 'admin/categories/' + id,
         data: {
            name: $('#edit_name').val(),
         },
         success: function (response){
            $('#editP').modal('hide');
            toastr.success('Sửa thành công!');
            userTable.ajax.reload();
         },
         error: function (error) {
            toastr.warning(error.responseJSON.errors.name);
         }
      })
   });
})
