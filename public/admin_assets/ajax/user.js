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
   ajax: path+'admin/users/anyData',
   columns: [
      { data: 'id', name: 'users.id' },
      { data: 'name', name: 'users.name' },
      { data: 'mobile', name: 'users.mobile' },
      { data: 'email', name: 'users.email' },
      { data: 'address', name: 'users.address' },
      { data: 'action', name: 'action' },
      ]
   });

   $('#add_new').on('submit',function(e) {
      e.preventDefault();
      $.ajax({
         type: 'post',
         url: path+'admin/users',
         data: {
            name: $('#name').val(),
            mobile: $('#mobile').val(),
            email: $('#email').val(),
            address: $('#address').val(),
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

   $(document).on('click', '#deleteUser', function (e) {
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
               url: path+ 'admin/users/' + id,
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

   $(document).on('click', '#editUser', function() {
      $('#editP').modal('show');
      var id = $(this).attr('edit');
      $.ajax({
         type: 'get',
         url: path+ 'admin/users/' + id+'/edit',
         success: function(response){
            $('#edit_id').val(response.id);
            $('#edit_mobile').val(response.mobile);
            $('#edit_address').val(response.address);
            $('#edit_name').val(response.name);
         }
      })
   });

   $('#edit_new').on('submit',function(e) {
      e.preventDefault();
      var id = $('#edit_id').val();
      $.ajax({
         type: 'put',
         url: path+ 'admin/users/' + id,
         data: {
            name: $('#edit_name').val(),
            mobile: $('#edit_mobile').val(),
            address: $('#edit_address').val(),
            //password: $('#edit_password').val(),
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
