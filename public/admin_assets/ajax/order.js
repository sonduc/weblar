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
      ajax: path+'admin/orders/anyData',
      columns: [
      { data: 'id', name: 'orders.id' },
      { data: 'code', name: 'orders.code' },
      { data: 'customer_name', name: 'orders.customer_name' },
      { data: 'email', name: 'orders.email' },
      { data: 'mobile', name: 'orders.mobile' },
      { data: 'total', name: 'orders.total' },
      { data: 'action', name: 'action' },
      ]
   });

   $(document).on('click', '#showOrder', function(){
      $('#showDetail').modal('show');
      var id = $(this).attr('show');
      // var detailTable = $('#order-detail-table').DataTable({
      //    processing: true,
      //    order : [[ 0, 'desc' ]],
      //    ordering: true,
      //    serverSide: true,
      //    destroy: true,
      //    ajax: path+'admin/order_details/anyData/' + id,
      //    columns: [
      //       { data: 'order_code', name: 'order_details.order_code' },
      //       { data: 'product_name', name: 'products.product_name' },
      //       { data: 'product_price', name: 'products.product_price' },
      //       { data: 'quantity', name: 'order_details.quantity' },
      //       { data: 'item_total', name: 'order_details.item_total' },
      //    ]
      // });

      $.ajax({
         type: 'get',
         url: path+ 'admin/order_details/anyData/' + id,
         success: function(response){
            // console.log(response.data)
            $('#order').html(" ");
            for (var i = 0; i < response.data.length; i++) {
               var html=
               '<tr>'+
                  '<td>'+response.data[i].order_code+'</td>'+
                  '<td>'+response.data[i].product_name+'</td>'+
                  '<td>'+response.data[i].product_price+'</td>'+
                  '<td>'+response.data[i].quantity+'</td>'+
                  '<td>'+response.data[i].item_total+'</td>'+
               '</tr>';
               $('#order').prepend(html);
            }
         }
      })
   });
})
