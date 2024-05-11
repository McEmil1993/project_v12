<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-cart-arrow-down"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php if (Auth::user()->role === 'admin'){ echo 'Admin panel'; }else{ echo 'Shop Panel'; } ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <?php if (Auth::user()->role === 'owner'): ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
   
    <!-- Heading -->
    <div class="sidebar-heading">
        Banner
    </div>
   

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-image"></i>
            <span>Banners</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Banner Options:</h6>
                <a class="collapse-item" href="{{route('banner.index')}}">Banners</a>
                <a class="collapse-item" href="{{route('banner.create')}}">Add Banners</a>
            </div>
        </div>
    </li>

    <?php endif ?> 
    <?php if (Auth::user()->role === 'store'): ?>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Shop
    </div>
    <!--Orders -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fas fa-cart-plus"></i>
            <span>Orders</span>
        </a>
    </li>

    <!--Orders -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/services">
            <i class="fas fa-folder"></i>
            <span>Services Request</span>
        </a>
    </li>

    
    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse"
            aria-expanded="true" aria-controls="productCollapse">
            <i class="fas fa-cubes"></i>
            <span>Products</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product Options:</h6>
                <a class="collapse-item" href="{{route('product.index')}}">Products</a>
                <a class="collapse-item" href="{{route('product.create')}}">Add Product</a>
                <a class="collapse-item" href="{{route('inventory.index')}}">Inventory</a>
            </div>
        </div>
    </li>
    

    <!-- Categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse"
            aria-expanded="true" aria-controls="categoryCollapse">
            <i class="fas fa-sitemap"></i>
            <span>Category</span>
        </a>
        <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Category Options:</h6>
                <a class="collapse-item" href="{{route('category.index')}}">Category</a>
                <a class="collapse-item" href="{{route('category.create')}}">Add Category</a>
            </div>
        </div>
    </li>


    {{-- Brands --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse" aria-expanded="true"
            aria-controls="brandCollapse">
            <i class="fas fa-table"></i>
            <span>Brands</span>
        </a>
        <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Brand Options:</h6>
                <a class="collapse-item" href="{{route('brand.index')}}">Brands</a>
                <a class="collapse-item" href="{{route('brand.create')}}">Add Brand</a>
            </div>
        </div>
    </li>

    {{-- Shipping --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shippingCollapse"
            aria-expanded="true" aria-controls="shippingCollapse">
            <i class="fas fa-truck"></i>
            <span>Shipping</span>
        </a>
        <div id="shippingCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Shipping Options:</h6>
                <a class="collapse-item" href="{{route('shipping.index')}}">Shipping</a>
                <a class="collapse-item" href="{{route('shipping.create')}}">Add Shipping</a>
            </div>
        </div>
    </li>

    {{-- Shipping --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#maintenanceCollapse"
            aria-expanded="true" aria-controls="maintenanceCollapse">
            <i class="fas fa-truck"></i>
            <span>Maintenance</span>
        </a>
        <div id="maintenanceCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Maintenance Options:</h6>
                <a class="collapse-item" href="{{route('mechanic.index')}}">Mechanic</a>
                <a class="collapse-item" href="{{route('service.index')}}">Service</a>
            </div>
        </div>
    </li>

    {{-- Reports --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reportsCollapse"
            aria-expanded="true" aria-controls="reportsCollapse">
            <i class="fas fa-cubes"></i>
            <span>Reports</span>
        </a>
        <div id="reportsCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Reports Options:</h6>
                <a class="collapse-item" href="{{route('report.order')}}">Order Reports</a>
                <a class="collapse-item" href="{{route('report.service')}}">Service Reports</a>
            </div>
        </div>
    </li>

    <!-- report.service -->
    <!-- report.order -->

 

     {{-- Reports --}}
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#reviewCollapse"
            aria-expanded="true" aria-controls="reviewCollapse">
            <i class="fas fa-comments"></i>
            <span>Reviews</span>
        </a>
        <div id="reviewCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Reviews Options:</h6>
                <a class="collapse-item" href="{{route('review.post',1)}}">One star</a>
                <a class="collapse-item" href="{{route('review.post',2)}}">Two star</a>
                <a class="collapse-item" href="{{route('review.post',3)}}">Three star</a>
                <a class="collapse-item" href="{{route('review.post',4)}}">Four star</a>
                <a class="collapse-item" href="{{route('review.post',5)}}">Five star</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <!-- Visit 'codeastro' for more projects -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
      Posts
    </div> -->

    <!-- Posts -->
    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCollapse" aria-expanded="true" aria-controls="postCollapse">
        <i class="fas fa-fw fa-folder"></i>
        <span>Posts</span>
      </a>
      <div id="postCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Post Options:</h6>
          <a class="collapse-item" href="{{route('post.index')}}">Posts</a>
          <a class="collapse-item" href="{{route('post.create')}}">Add Post</a>
        </div>
      </div>
    </li> -->


    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postCategoryCollapse" aria-expanded="true" aria-controls="postCategoryCollapse">
          <i class="fas fa-sitemap fa-folder"></i>
          <span>Category</span>
        </a>
        <div id="postCategoryCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Category Options:</h6>
            <a class="collapse-item" href="{{route('post-category.index')}}">Category</a>
            <a class="collapse-item" href="{{route('post-category.create')}}">Add Category</a>
          </div>
        </div>
      </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tagCollapse" aria-expanded="true" aria-controls="tagCollapse">
            <i class="fas fa-tags fa-folder"></i>
            <span>Tags</span>
        </a>
        <div id="tagCollapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tag Options:</h6>
            <a class="collapse-item" href="{{route('post-tag.index')}}">Tag</a>
            <a class="collapse-item" href="{{route('post-tag.create')}}">Add Tag</a>
            </div>
        </div>
    </li> -->

    <!-- Comments -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="{{route('comment.index')}}">
            <i class="fas fa-comments fa-chart-area"></i>
            <span>Comments</span>
        </a>
      </li> -->


    <!-- Divider -->
    <!-- <hr class="sidebar-divider d-none d-md-block"> -->
    <!-- Heading -->
    <?php endif ?> 
  
    <!-- <li class="nav-item">
      <a class="nav-link" href="{{route('coupon.index')}}">
          <i class="fas fa-table"></i>
          <span>Coupon</span></a>
    </li> -->
    <!-- Users -->
    <?php  

    if (Auth::user()->role === 'admin'):
      
      ?>
    <li class="nav-item">
        <a class="nav-link" href="{{route('ownershop')}}">
            <i class="fas fa-users"></i>
            <span>Shop Owners</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('client')}}">
            <i class="fas fa-users"></i>
            <span>Register Client</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('adminuser')}}">
            <i class="fas fa-users"></i>
            <span>User Account</span></a>
    </li>
   

    <!-- General settings -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('settings')}}">
            <i class="fas fa-cog"></i>
            <span>Settings</span></a>
    </li>
        <?php  

    endif
    
    ?>
    <!-- Sidebar Toggler (Sidebar) --> 
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>