<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
  	<div class="container-xxl d-flex h-100">
    	<ul class="menu-inner">
		    <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
		        <a href="{{ url('dashboard') }}" class="menu-link" >
		            <i class="tf-icons bx bx-home-circle me-1"></i>
		            <div>Dashboard</div>
		        </a>
            </li>
				
		    <li class="menu-item {{ request()->is('members/*') ? 'active' : '' }}">
		        <a href="javascript:void(0);" class="menu-link menu-toggle" >
		            <i class="tf-icons bx bx-user me-1"></i>
		            <div>Members</div>
		        </a>
                <ul class="menu-sub">
		            <li class="menu-item {{ request()->is('members/unverified') ? 'active' : '' }}">
			            <a href="{{ url('members/unverified') }}" class="menu-link">
			                <i class="tf-icons bx bx-user me-1"></i>
			                <div>Unverifed Members</div>
			            </a>
		            </li>
		            <li class="menu-item {{ request()->is('members/processing') ? 'active' : '' }}">
			        	<a href="{{ url('members/processing') }}" class="menu-link">
			                <i class="tf-icons bx bx-user me-1"></i>
			                <div>Processing Members</div>
			            </a>
		            </li>
		            <li class="menu-item {{ request()->is('members/completed') ? 'active' : '' }}">
		                <a href="{{ url('members/completed') }}" class="menu-link">
		                    <i class="tf-icons bx bx-user me-1"></i>
		                    <div>Completed Members</div>
		                </a>
		            </li>
                    <li class="menu-item {{ request()->is('members/all') ? 'active' : '' }}">
			            <a href="{{ url('members/all') }}" class="menu-link">
			                <i class="tf-icons bx bx-user me-1"></i>
			                <div>All Members</div>
			            </a>
                    </li>
              	</ul>
        	</li>
			<li class="menu-item {{ request()->is('digital-data') ? 'active' : '' }}">
				<a href="{{ url('digital-data') }}" class="menu-link" >
					<i class="tf-icons bx bx-coin-stack me-1"></i>
					<div>Digital Data</div>
				</a>
			</li>
			<li class="menu-item {{ request()->is('api-docs') ? 'active' : '' }}">
				<a href="{{ url('api-docs') }}" class="menu-link" >
					<i class="tf-icons bx bx-code-alt me-1"></i>
					<div>API Docs</div>
				</a>
            </li>
			<li class="menu-item {{ request()->is('member-logs') ? 'active' : '' }}">
				<a href="{{ url('member-logs') }}" class="menu-link" >
					<i class="tf-icons bx bx-list-check me-1"></i>
					<div>Logs</div>
				</a>
			</li>
			<li class="menu-item {{ request()->is('users') ? 'active' : '' }} {{ request()->is('regions') ? 'active' : '' }} {{ request()->is('townships') ? 'active' : '' }} {{ request()->is('member-tokens') ? 'active' : '' }}">
				<a href="javascript:void(0);" class="menu-link menu-toggle" >
					<i class="tf-icons bx bx-menu me-1"></i>
					<div>More</div>
				</a>
                <ul class="menu-sub">
					<li class="menu-item {{ request()->is('users') ? 'active' : '' }}">
						<a href="{{ url('users') }}" class="menu-link" >
							<i class="tf-icons bx bx-user me-1"></i>
							<div>Users</div>
						</a>
					</li>
					<li class="menu-item {{ request()->is('regions') ? 'active' : '' }}">
						<a href="{{ url('regions') }}" class="menu-link" >
							<i class="tf-icons bx bx-map-alt me-1"></i>
							<div>Regions</div>
						</a>
					</li>
					<li class="menu-item {{ request()->is('townships') ? 'active' : '' }}">
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
					<li class="menu-item {{ request()->is('member-tokens') ? 'active' : '' }}">
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