  <!-- Sidebar  -->
  <div class="iq-sidebar">
      <div class="iq-sidebar-logo d-flex justify-content-between">
          <a href="{{route('products.index')}}" class="header-logo">
              <img src="{{ asset('admin/images/logob.png') }}" class="img-fluid rounded-normal" alt="">
              <div class="logo-title">
                  <span class="text-danger text-uppercase">ADMIN<span class="text-primary ml-1">shop</span></span>
              </div>
          </a>
          <div class="iq-menu-bt-sidebar">
              <div class="iq-menu-bt align-self-center">
                  <div class="wrapper-menu">
                      <div class="main-circle"><i class="bi bi-house"></i></div>
                      <div class="hover-circle"><i class="bi bi-house"></i></div>
                  </div>
              </div>
          </div>
      </div>
      <div id="sidebar-scrollbar">
          <nav class="iq-sidebar-menu">
              <ul id="iq-sidebar-toggle" class="iq-menu">
                  <li class="active active-menu">
                      <a href=""><i class="las la-house-damage"></i>trang chủ </a>

                  </li>
                  <li>
                      <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span
                              class="ripple rippleEffect"></span><i
                              class="las la-user-tie iq-arrow-left"></i><span>Thể loại</span><i
                              class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                      <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                          <li><a href="{{route('categories.index')}}"><i class="las la-id-card-alt"></i>Danh sách</a></li>
                      </ul>
                  </li>
                  <li>
                      <a href="#ui-elements" class="iq-waves-effect collapsed" data-toggle="collapse"
                          aria-expanded="false"><i class="lab la-elementor iq-arrow-left"></i><span>Sản Phẩm</span><i
                              class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                              <ul id="ui-elements" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                                <li><a href="{{route('products.index')}}"><i class="las la-id-card-alt"></i>Danh sách</a></li>
                            </ul>
                          
                  </li>

                  <li>
                    <a href="#ui-elements1" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="false"><i class="lab la-elementor iq-arrow-left"></i><span>Khách hàng</span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="ui-elements1" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                              <li><a href="{{route('customers.index')}}"><i class="las la-id-card-alt"></i>Danh sách</a></li>
                          </ul>

                </li>
                <li>
                    <a href="#ui-elements12" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="false"><i class="lab la-elementor iq-arrow-left"></i><span>đơn hàng </span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="ui-elements12" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                              <li><a href="{{route('orders.index')}}"><i class="las la-id-card-alt"></i>Danh sách</a></li>
                          </ul>
                </li>
                <li>
                    <a href="#ui-elements12" class="iq-waves-effect collapsed" data-toggle="collapse"
                        aria-expanded="false"><i class="lab la-elementor iq-arrow-left"></i><span>group </span><i
                            class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                            <ul id="ui-elements12" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" style="">
                              <li><a href="{{route('groups.index')}}"><i class="las la-id-card-alt"></i>Danh sách</a></li>
                          </ul>
                </li>
              </ul>
          </nav>
          <div id="sidebar-bottom" class="p-3 position-relative">
              <div class="iq-card bg-primary rounded">
                  <div class="iq-card-body">
                      <div class="sidebarbottom-content">
                          <div class="image"><img src="{{ asset('admin/images/page-img/side-bkg.png') }}"
                                  alt=""></div>
                          <h5 class="mb-3 text-white">ĐÃ UỐNG RƯỢU BIA</h5>
                          <p class="mb-0 text-light">Không lái xe.</p>
                          {{-- <button type="submit" class="btn btn-white w-100  mt-4 text-primary viwe-more">View
                              More</button> --}}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
