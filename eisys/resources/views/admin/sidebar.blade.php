<aside class="main-sidebar sidebar-dark-primary elevation-3">
    <!-- Brand Logo -->
    <a class="center">
        {{-- <img src=".png" alt="" class="brand-image elevation-3"
            style="width: 247px"> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- nav-item -->

                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}" class="nav-link">
                        <p>
                            <i class="fas fa-box"></i>
                            商品情報
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.order.index') }}" class="nav-link">
                        <p>
                            <i class="fas fa-shopping-basket"></i>
                            注文情報
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
