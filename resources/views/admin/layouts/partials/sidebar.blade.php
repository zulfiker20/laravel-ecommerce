<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Rukada</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-home-circle'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					<ul>
						<li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Application</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.category.index') }}"><i class="bx bx-right-arrow-alt"></i>Category</a>
						</li>
						<li> <a href="{{ route('admin.subcategory.index') }}"><i class="bx bx-right-arrow-alt"></i>Subcategory</a>
						</li>
							<li> <a href="{{ route('admin.brand.index') }}"><i class="bx bx-right-arrow-alt"></i>Brand</a>
						</li>
						</li>
							<li> <a href="{{ route('admin.banner.index') }}"><i class="bx bx-right-arrow-alt"></i>Banner</a>
						</li>
						</li>
							<li> <a href="{{ route('admin.slider.index') }}"><i class="bx bx-right-arrow-alt"></i>Slider</a>
						</li>
							</li>
							<li> <a href="{{ route('admin.coupon.index') }}"><i class="bx bx-right-arrow-alt"></i>Coupon</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Roles & Permissions</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin.permission.index') }}"><i class="bx bx-right-arrow-alt"></i>Permissions</a>
						</li>
						<li> <a href="{{ route('admin.role.index') }}"><i class="bx bx-right-arrow-alt"></i>Roles</a>
						</li>
						<li> <a href=""><i class="bx bx-right-arrow-alt"></i>Roles and Permissions</a>
						</li>
					</ul>
				</li>
			</ul>
			<!--end navigation-->
		</div>