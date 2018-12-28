@extends('admin.layouts.master')
@section('content')
<div class="page-header">
   <h3 class="page-title">Quản lý nhãn hiệu</h3>
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a>Trang chủ</a></li>
      <li class="breadcrumb-item active">Danh sách</li>
   </ol>
   <div class="page-actions">

    <a style="color:white" class="btn btn-primary" data-toggle="modal" data-target="#add">
      <i class="icon-fa icon-fa-plus"></i> Thêm mới
   </a>
</div>
</div>
<div class="row">
   <div class="col-sm-12">
      <div class="card">
         <div class="card-header">
            <h6>Danh sách nhãn hiệu</h6>
         </div>
         <div class="card-block">
            <table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0"
            width="100%">
            <thead>
               <tr>
                  <th>Stt</th>
                  <th>Tên nhãn hiệu</th>
                  <th>Danh mục</th>
                  <th>Action</th>
               </tr>
            </thead>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="add_new">
            <div class="modal-body">
               <fieldset class="form-group">
                  <label>Tên nhãn hiệu</label>
                  <input type="text" class="form-control" id="name" placeholder="Nhập tên">
               </fieldset>

               <fieldset class="form-group">
                  <label>Danh mục</label>
                  <select class="form-control" id="category_id">
                     @foreach ($categories as $category)
                     <option value="{{$category->id}}">{{ $category->name }}</option>
                     @endforeach
                  </select>
               </fieldset>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">
                 Hủy
              </button>
              <button type="submit" class="btn btn-primary">Thêm</button>
           </div>
        </form>
      </div>
   </div>
</div>

<div class="modal fade" id="editP" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="edit_new">
            <input type="hidden" id="edit_id">
            <div class="modal-body">
               <fieldset class="form-group">
                  <label>Tên nhãn hiệu</label>
                  <input type="text" class="form-control" id="edit_name" placeholder="Nhập tên">
               </fieldset>
               <fieldset class="form-group">
                  <label>Danh mục</label>
                  <select class="form-control" id="edit_category_id">
                     @foreach ($categories as $category)
                     <option value="{{$category->id}}">{{ $category->name }}</option>
                     @endforeach
                  </select>
               </fieldset>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">
                 Hủy
              </button>
              <button type="submit" class="btn btn-primary">Sửa</button>
           </div>
        </form>
      </div>
   </div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin_assets/ajax/brand.js') }}"></script>
@endsection
