<div class="account-sidebar">
	<h2 class="account-title title-sidebar mb-3 text-uppercase">Tài khoản</h2>
	<div class="account-content">
		<div class="account-list">
			<ul class="list-unstyled">			
				<li><a href="{{ route("profile.user") }}" class="d-block position-relative">Thông tin tài khoản</a></li>
				<li><a href="{{ route("address.user") }}" class="d-block position-relative">Danh sách địa chỉ</a></li>
				<li><a href="{{ route('auth.logout') }}" class="d-block position-relative">Đăng xuất</a></li>
			</ul>
		</div>
	</div>
</div>