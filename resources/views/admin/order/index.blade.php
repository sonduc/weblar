@extends('admin.layouts.master')
@section('content')
<div class="page-header">
   <h3 class="page-title">Quản lý hóa đơn</h3>
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a>Trang chủ</a></li>
      <li class="breadcrumb-item active">Danh sách</li>
   </ol>
</div>
<div class="row">
   <div class="col-sm-12">
      <div class="card">
         <div class="card-header">
            <h6>Danh sách danh mục</h6>
         </div>
         <div class="card-block">
            <table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0"
            width="100%">
            <thead>
               <tr>
                  <th>Stt</th>
                  <th>Mã hóa đơn</th>
                  <th>Tên khách hàng</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Tổng tiền</th>
                  <th>Hành động</th>
               </tr>
            </thead>
         </table>
      </div>
   </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="showDetail" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Danh mục</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <table id="order-detail-table" class="table table-striped table-bordered" cellspacing="0"
            width="100%">
            <thead>
               <tr>
                  <th>Mã hóa đơn</th>
                  <th>Tên tên sản phẩm</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Tổng tiền</th>
               </tr>
            </thead>
            <tbody id="order">

            </tbody>
         </table>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Hủy
         </button>
      </div>
   </div>
</div>
</div>

@endsection
@section('script')
<script src="{{ asset('admin_assets/ajax/order.js') }}"></script>
@endsection
