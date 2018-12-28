@extends('admin.layouts.master')
@section('content')
<div class="page-header">
   <h3 class="page-title">Quản lý sản phẩm</h3>
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
            <h6>Danh sách danh mục</h6>
         </div>
         <div class="card-block">
            <table id="responsive-datatable" class="table table-striped table-bordered" cellspacing="0"
            width="100%">
                <thead>
                   <tr>
                      <th>Stt</th>
                      <th>Mã sản phẩm</th>
                      <th>Tên danh mục</th>
                      <th>Trạng thái</th>
                      <th>Giá tiền</th>
                      <th>Danh mục</th>
                      <th>Nhãn hiệu</th>
                      <th>Hành động</th>
                   </tr>
                </thead>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thêm mới sản phẩm</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="add_new">
          <div class="modal-body">
            <fieldset class="form-group">
              <label>Mã sản phẩm</label>
              <input type="text" class="form-control" id="code" placeholder="Nhập">
            </fieldset>

            <fieldset class="form-group">
              <label>Tên sản phẩm</label>
              <input type="text" class="form-control" id="name" placeholder="Nhập tên">
            </fieldset>

            <fieldset class="form-group">
              <label>Mô tả</label>
              <input type="text" class="form-control" id="description" placeholder="Nhập">
            </fieldset>

            <fieldset class="form-group">
              <label for="">Chi tiết sản phẩm</label>
              <textarea class="form-control ckeditor" name="content" id="content"></textarea>
            </fieldset>

            <fieldset class="form-group">
              <label for="">Nổi bật:</label>
              <label class="radio-inline" style="margin-left: 0.5em;">
                <input type="radio" name="status" value="0" class="status" checked>
                Không
              </label>
              <label class="radio-inline" style="margin-left: 0.5em;">
                <input type="radio" name="status" value="1" class="status">
                Có
              </label>
            </fieldset>


            <fieldset class="form-group">
              <label>Giá tiền</label>
              <input type="number" class="form-control" id="price" placeholder="Nhập">
            </fieldset>

            <fieldset class="form-group">
              <label>Danh mục</label>
              <select class="form-control" id="category_id">
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
              </select>
            </fieldset>

            <fieldset class="form-group">
              <label>Nhãn hiệu</label>
              <select class="form-control" id="brand_id">
                @foreach ($brands as $brand)
                  <option value="{{$brand->id}}">{{ $brand->name }}</option>
                @endforeach
              </select>
            </fieldset>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-secondary" dât-dismiss="modal">
             Hủy
           </button>
           <button type="submit" class="btn btn-primary">Thêm</button>
         </div>
        </form>
      </div>
   </div>
</div>

<div class="modal fade" id="editP" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
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
              <label>Mã sản phẩm</label>
              <input type="text" class="form-control" id="edit_code" placeholder="Nhập">
            </fieldset>

            <fieldset class="form-group">
              <label>Tên sản phẩm</label>
              <input type="text" class="form-control" id="edit_name" placeholder="Nhập tên">
            </fieldset>

            <fieldset class="form-group">
              <label>Mô tả</label>
              <input type="text" class="form-control" id="edit_description" placeholder="Nhập">
            </fieldset>

            <fieldset class="form-group">
              <label for="">Chi tiết sản phẩm</label>
              <textarea class="form-control ckeditor" id="edit_content" name="edit_content"></textarea>
            </fieldset>

            <fieldset class="form-group">
              <label for="">Nổi bật:</label>
              <label class="radio-inline" style="margin-left: 0.5em;">
                <input type="radio" name="edit_status" value="0" class="edit_status" checked>
                Không
              </label>
              <label class="radio-inline" style="margin-left: 0.5em;">
                <input type="radio" name="edit_status" value="1" class="edit_status">
                Có
              </label>
            </fieldset>


            <fieldset class="form-group">
              <label>Giá tiền</label>
              <input type="number" class="form-control" id="edit_price" placeholder="Nhập">
            </fieldset>

            <fieldset class="form-group">
              <label>Danh mục</label>
              <select class="form-control" id="edit_category_id">
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
              </select>
            </fieldset>

            <fieldset class="form-group">
              <label>Nhãn hiệu</label>
              <select class="form-control" id="edit_brand_id">
                @foreach ($brands as $brand)
                  <option value="{{$brand->id}}">{{ $brand->name }}</option>
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

<div class="modal fade" id="showImage">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Ảnh sản phẩm</h4>
      </div>
      <div class="modal-body">
        <button type="button" id="buttonDelete" class="bt btn-md btn-default">Delete</button>
        <div id="Detail_image"></div>

        <form id="add_image_new" method="POST" role="form">
          @csrf
          <div style="float: left;margin-left: 75%" class="form-group">
            <input type="file" class="form-control inputImage" name="newImage[]" id="newImage" multiple>
          </div>
          <button type="submit" class="buttonImage icon-im icon-im-upload3"></button>

        </form>

        <div id="DsAnh"></div>
      </div>
      <div style="clear: both" class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="{{ asset('admin_assets/ajax/product.js') }}"></script>
@endsection
