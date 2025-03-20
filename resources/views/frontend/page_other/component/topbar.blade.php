<div class="container-fluid breadcrumb">
	<div class="row row-breadcrumb">
		<div class="col-12 col-lg-12 col-breadcrumb">
			<div class="breadcrumb-content-inner">
				<div class="breadcrumb-shop clearfix">
					<div class="breadcrumb-list">
						<ol class="breadcrumb breadcrumb-arrows" itemscope itemtype="http://schema.org/BreadcrumbList">
							<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
								<a href="{{ url('/') }}" target="_self" itemprop="item">
									<span itemprop="name">Trang chủ</span>
								</a>
								<meta itemprop="position" content="1" />
							</li>
							<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
								<span itemprop="item" content="{{ url($page->slug) }}">
									<strong itemprop="name">{{ $page->title }}</strong>
								</span>
								<meta itemprop="position" content="2" />
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>