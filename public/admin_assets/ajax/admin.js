$(document).ready(function(){
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
   });

   var userTable = $('#responsive-datatable').DataTable({
   processing: true,
   order : [[ 0, 'desc' ]],
   ordering: true,
   serverSide: true,
   ajax: path+'admin/admins/anyData',
   columns: [
      { data: 'id', name: 'admins.id' },
      { data: 'name', name: 'admins.name' },
      { data: 'email', name: 'admins.email' },
      { data: 'action', name: 'action' },
      ]
   });

   $('#add_new').on('submit',function(e) {
      e.preventDefault();
      $.ajax({
         type: 'post',
         url: path+'admin/admins',
         data: {
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
         },
         success: function (response){
            $('#add').modal('hide');
            toastr.success('Thêm thành công!');

            document.getElementById("add_new").reset();
            userTable.ajax.reload();
         },
         error: function (error) {
            toastr.warning(error.responseJSON.errors.name);
         }
      })
   });

   $(document).on('click', '#deleteAdmin', function (e) {
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
               url: path+ 'admin/admins/' + id,
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

   $(document).on('click', '#editAdmin', function() {
      $('#editP').modal('show');
      var id = $(this).attr('edit');
      $.ajax({
         type: 'get',
         url: path+ 'admin/admins/' + id+'/edit',
         success: function(response){
            $('#edit_id').val(response.id);
            $('#edit_name').val(response.name);
         }
      })
   });

   $('#edit_new').on('submit',function(e) {
      e.preventDefault();
      var id = $('#edit_id').val();
      $.ajax({
         type: 'put',
         url: path+ 'admin/admins/' + id,
         data: {
            name: $('#edit_name').val(),
            password: $('#edit_password').val(),
         },
         success: function (response){
            console.log(response);
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
