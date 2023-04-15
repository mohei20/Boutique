  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
              <a class="nav-link " href="{{ route('dashboard') }}">
                  <i class="bi bi-grid"></i>
                  <span>Dashboard</span>
              </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#suppliers-nav" data-bs-toggle="collapse" href="#">
                  <i class="ri-truck-line"></i><span>Suppliers</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="suppliers-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('suppliers.index') }}">
                          <i class="bi bi-circle"></i><span>All Suppliers</span>
                      </a>
                  </li>
              </ul>
              <ul id="suppliers-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('suppliers.create') }}">
                          <i class="bi bi-circle"></i><span>Add Supplier</span>
                      </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#categories-nav" data-bs-toggle="collapse" href="#">
                  <i class=" ri-function-line"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="categories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('categories.index') }}">
                          <i class="bi bi-circle"></i><span>All Categories</span>
                      </a>
                  </li>
              </ul>
              <ul id="categories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('categories.create') }}">
                          <i class="bi bi-circle"></i><span>Add Category</span>
                      </a>
                  </li>
              </ul>
          </li>

          <li class="nav-item">
              <a class="nav-link collapsed" data-bs-target="#products-nav" data-bs-toggle="collapse" href="#">
                  <i class="  ri-product-hunt-line "></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
              </a>
              <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('products.index') }}">
                          <i class="bi bi-circle"></i><span>All Products</span>
                      </a>
                  </li>
              </ul>
              <ul id="products-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                  <li>
                      <a href="{{ route('products.create') }}">
                          <i class="bi bi-circle"></i><span>Add Product</span>
                      </a>
                  </li>
              </ul>
          </li>

      </ul>

  </aside><!-- End Sidebar-->
