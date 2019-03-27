<div class="col-md-3 left_col menu_fixed">
	<div class="left_col scroll-view">
 		<div class="navbar nav_title" style="border: 0;">
			<a href="<?php echo base_url(); ?>" class="site_title"><i class="glyphicon glyphicon-fullscreen"></i>&nbsp;<span style="font-size: 20px;"><?php echo 'Berkah Inventory' ?></span></a>
		</div>

		<div class="clearfix"></div>
		<!-- menu profile quick info -->
		<div class="profile clearfix">
			<div class="profile_pic">
				<img src="<?php echo base_url('assets/images/img.jpg') ?>" alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2>Admin</h2>
			</div>
		</div>
		<!-- /menu profile quick info -->
		<br>
		<!-- Sidebar Menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<h3>Main Navigation</h3>
				<ul class="nav side-menu">
					<li>
						<a href="<?php echo base_url() ?>">
							<i class="fa fa-home"></i> &nbsp; Dashboard
						</a>
					</li>
					<li><a><i class="fas fa-server"></i> &nbsp; Master Data <span class="fa fa-chevron-down pull-right"></span></a>
						<ul class="nav child_menu">
							<li>
								<a href="<?php echo base_url('category/index') ?>">
									<i class="fas fa-user"></i>
									Category
								</a>
							</li>
							<li>
								<a href="<?php echo base_url('merk/index') ?>">
									<i class="fas fa-user"></i>
									Merk
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?php echo base_url('barang') ?>">
							<i class="fas fa-user"></i>
							barang
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('barang/barang_masuk') ?>">
							<i class="fas fa-user"></i>
							Barang Masuk
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('barang/barang_keluar') ?>">
							<i class="fas fa-user"></i>
							Barang Keluar
						</a>
					</li>
					<!-- <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo base_url('app/form_ex') ?>">General Form</a></li>
							<li><a href="<?php echo base_url('app/table_ex') ?>">Table</a></li>
							<li><a href="<?php echo base_url('app/table_dyn_ex') ?>">Table Dynamics</a></li>
						</ul>
					</li>
					<li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="#level1">Menu 1</a></li>
							<li><a>Menu 2 <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li class="sub_menu"><a href="#level2_1">Menu 2.1</a></li>
									<li><a href="#level2_2">Menu 2.2</a></li>
									<li><a href="#level2_3">Menu 2.3</a></li>
								</ul>
							</li>
							<li><a href="#level3">Menu 3</a></li>
						</ul>
					</li>
					<li><a href="https://github.com/puikinsh/gentelella"><i class="fa fa-external-link-square"></i> Gentelella <span class="label label-info pull-right">Learn More</span></a></li> -->
				</ul>
			</div>
		</div>
		<!-- /Sidebar Menu -->

		<!-- menu footer buttons -->
		<div class="sidebar-footer hidden-small">
			<a data-toggle="tooltip" data-placement="top" title="Settings">
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="FullScreen">
				<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Lock">
				<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
				<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>
		<!-- /menu footer buttons -->
	</div>
</div>