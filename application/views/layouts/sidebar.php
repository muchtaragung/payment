<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="nav" style="background-color: #2043E5;">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
		<div class="sidebar-brand-icon">
			<img class="img-fluid" src="<?= base_url() ?>assets/img/korpora.png">
		</div>
		<div class="sidebar-brand-text mx-2">Korpora Payment</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">


	<!-- Nav Item - Dashboard -->
	<!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> -->
	<li class="nav-item">
		<a class="nav-link" href="<?= site_url('admin/sales/list') ?>">
			<i class="fas fa-users"></i>
			<span>Sales</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?= site_url('admin/event/list') ?>">
			<i class="fas fa-key"></i>
			<span>Event</span></a>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="<?= site_url('admin/histori') ?>">
			<i class="fas fa-money-check-alt"></i>
			<span>Histori Payment</span></a>
	</li>


	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>
<!-- End of Sidebar -->