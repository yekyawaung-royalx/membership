<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-xxl d-flex h-100">
      <ul class="menu-inner">
          <li class="menu-item active">
              <a href="{{ url('dashboard') }}" class="menu-link" >
                  <i class="tf-icons bx bx-home-circle me-1"></i>
                  <div>Dashboard</div>
              </a>
          </li>
              
          <li class="menu-item ">
              <a href="javascript:void(0);" class="menu-link menu-toggle" >
                  <i class="tf-icons bx bx-user me-1"></i>
                  <div>Members</div>
              </a>
              <ul class="menu-sub">
                  <li class="menu-item ">
                      <a href="{{ url('members/pending') }}" class="menu-link">
                          <i class="tf-icons bx bx-user me-1"></i>
                          <div>Pending Members</div>
                      </a>
                  </li>
                  <li class="menu-item ">
                      <a href="{{ url('members/approved') }}" class="menu-link">
                          <i class="tf-icons bx bx-user me-1"></i>
                          <div>Approved Members</div>
                      </a>
                  </li>
                  <li class="menu-item ">
                      <a href="{{ url('members/rejected') }}" class="menu-link">
                          <i class="tf-icons bx bx-user me-1"></i>
                          <div>Rejected Members</div>
                      </a>
                  </li>
                  <li class="menu-item ">
                      <a href="{{ url('members/all') }}" class="menu-link">
                          <i class="tf-icons bx bx-user me-1"></i>
                          <div>All Members</div>
                      </a>
                  </li>
                </ul>
          </li>
          <li class="menu-item">
              <a href="{{ url('member-logs') }}" class="menu-link" >
                  <i class="tf-icons bx bx-list-check me-1"></i>
                  <div>Logs</div>
              </a>
          </li>
          <li class="menu-item ">
              <a href="javascript:void(0);" class="menu-link menu-toggle" >
                  <i class="tf-icons bx bx-menu me-1"></i>
                  <div>More</div>
              </a>
              <ul class="menu-sub">
                  <li class="menu-item ">
                      <a href="{{ url('users') }}" class="menu-link" >
                          <i class="tf-icons bx bx-user me-1"></i>
                          <div>Users</div>
                      </a>
                  </li>
                  <li class="menu-item ">
                      <a href="{{ url('regions') }}" class="menu-link" >
                          <i class="tf-icons bx bx-map-alt me-1"></i>
                          <div>Regions</div>
                      </a>
                  </li>
                  <li class="menu-item ">
                      <a href="{{ url('townships') }}" class="menu-link" >
                          <i class="tf-icons bx bx-map-pin me-1"></i>
                          <div>Townships</div>
                      </a>
                  </li>
                  <li class="menu-item ">
                      <a href="{{ url('quaters') }}" class="menu-link" >
                          <i class="tf-icons bx bx-map me-1"></i>
                          <div>Quaters</div>
                      </a>
                  </li>
                  <li class="menu-item ">
                      <a href="{{ url('member-tokens') }}" class="menu-link" >
                          <i class="tf-icons bx bx-shield-quarter me-1"></i>
                          <div>Member Tokens</div>
                      </a>
                  </li>
                    <li class="menu-item ">
                      <a href="{{ url('push-notifications') }}" class="menu-link"  >
                          <i class="tf-icons bx bx-support me-1"></i>
                          <div>Push Notifications</div>
                      </a>
                    </li>
                </ul>
          </li>
      </ul>
    </div>
</aside>