@extends('shop.layouts.index')
@section('content')
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb--ys pull-left">
            <li class="home-link"><a href="{{ route('shop.index') }}" class="icon icon-home"></a></li>
        </ol>
    </div>
</div>
<!-- /breadcrumbs -->
<!-- CONTENT section -->
<div id="pageContent">
   <div class="container">
      <!-- two columns -->
      <div class="row">
         <!-- left column -->
         <aside class="col-md-4 col-lg-3 col-xl-2" id="leftColumn">
            <!-- brands block -->
            <div class="collapse-block open">
               <h4 class="collapse-block__title">BRANDS</h4>
               <div class="collapse-block__content">
                  <ul class="simple-list">
                     @foreach ($brands as $brand)
                        <li><a href="">{{ $brand->name }}</a></li>
                     @endforeach
                  </ul>
               </div>
            </div>
            <!-- /brands block -->

            <!-- price slider block -->
            <div class="collapse-block open">
               <h4 class="collapse-block__title">PRICE</h4>
               <div class="collapse-block__content">
                  <form action="#">
                     <div class="price-input">
                        <label>From:</label>
                        <input type="text" id="priceMin" />
                     </div>
                     <div class="price-input-divider">-</div>
                     <div class="price-input">
                        <label>To:</label>
                        <input type="text" id="priceMax" />
                     </div>
                     <div class="price-input">
                        <button type="submit" class="btn btn--ys btn--md">Filter</button>
                     </div>
                  </form>
               </div>
            </div>
            <!-- /price slider block -->

         </aside>
         <!-- /left column -->
         <!-- center column -->
         <aside class="col-md-8 col-lg-9 col-xl-10" id="centerColumn">
            <!-- title -->
            <div class="title-box">
               <h2 class="text-center text-uppercase title-under">{{ $category->name }}</h2>
            </div>
            <!-- /title -->
            <div class="divider"></div>
            <div class="product-listing row">
               @foreach ($products as $product)
               <div class="col-xs-6 col-sm-4 col-md-6 col-lg-4 col-xl-one-fifth">
                  <!-- product -->
                  <div class="product">
                     <div class="product__inside">
                        <!-- product image -->
                        <div class="product__inside__image">
                           <a href="{{ asset('shop/product').'/' . $product->id }}"> <img class="editImage" src="{{ asset('storage').'/' . $product->images[0]->link}}" alt=""> </a>
                           <!-- quick-view -->
                           <a href="#" data-toggle="modal" data-target="#quickViewModal" class="quick-view"><b><span class="icon icon-visibility"></span> Quick view</b> </a>
                           <!-- /quick-view -->
                        </div>
                        <!-- /product image -->
                        <!-- product name -->
                        <div class="product__inside__name">
                           <h2><a href="{{ asset('shop/product').'/' . $product->id }}">{{ $product->name }}</a></h2>
                        </div>
                        <!-- /product name -->
                        <!-- product price -->
                        <div class="product__inside__price price-box">{{ number_format($product->price) }} VNĐ</div>
                        <!-- /product price -->
                        <div class="product__inside__hover">
                           <!-- product rating -->
                           <div class="rating row-mode-hide"> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star"></span> <span class="icon-star empty-star"></span> </div>
                           <!-- /product rating -->
                        </div>
                     </div>
                  </div>
                  <!-- /product -->
               </div>
               @endforeach
            </div>
            <!-- filters row -->
            <div class="filters-row">
               <div class="pull-left">
                  <div class="filters-row__mode">
                     <a href="#" class="btn btn--ys slide-column-open visible-xs visible-sm hidden-xl hidden-lg hidden-md">Filter</a>
                     <a class="filters-row__view active link-grid-view btn-img btn-img-view_module"><span></span></a>
                     <a class="filters-row__view link-row-view btn-img btn-img-view_list"><span></span></a>
                  </div>
                  <div class="filters-row__select hidden-sm hidden-xs">
                     <label>Sort by: </label>
                     <div class="select-wrapper">
                        <select class="select--ys sort-position">
                           <option>Position</option>
                           <option>Price</option>
                           <option>Rating</option>
                        </select>
                     </div>
                     <a href="#" class="sort-direction icon icon-arrow_back"></a>
                  </div>
               </div>
               <div class="pull-right">
                  <div class="filters-row__items hidden-sm hidden-xs">28 Item(s)</div>
                  <div class="filters-row__select hidden-sm hidden-xs">
                     <label>Show: </label>
                     <div class="select-wrapper">
                        <select class="select--ys show-qty">
                           <option>25</option>
                           <option>50</option>
                           <option>100</option>
                        </select>
                     </div>
                     <a href="#" class="icon icon-arrow-down active"></a><a href="#" class="icon icon-arrow-up"></a>
                  </div>
                  <div class="filters-row__pagination">
                     <ul class="pagination">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#"><span class="icon icon-chevron_right"></span></a></li>
                     </ul>
                  </div>
               </div>
            </div>
            <!-- /filters row -->
         </aside>
         <!-- center column -->
      </div>
      <!-- /two columns -->
   </div>
</div>
<!-- End CONTENT section -->
@endsection
