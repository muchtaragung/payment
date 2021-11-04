<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

	<!-- Sidebar Toggle (Topbar) -->
	<form class="form-inline">
		<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
			<i class="fa fa-bars"></i>
		</button>

	</form>

	<?php if (!isset($link)) : ?>
		<button onclick="window.history.back();" class="btn btn-link rounded-circle mr-3">
			<i class="fa fa-arrow-left"></i>
		</button>
	<?php else : ?>
		<a href="<?= $link ?>" class="btn btn-link rounded-circle mr-3">
			<i class="fa fa-arrow-left"></i>
		</a>
	<?php endif ?>
	<!-- Topbar Navbar -->
	<ul class="navbar-nav ml-auto">

		<!-- Nav Item - User Information -->
		<li class="nav-item dropdown no-arrow">
			<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="mr-2 d-none d-lg-inline text-gray-600"><?= $this->session->userdata('name') ?></span>
			</a>
			<!-- Dropdown - User Information -->
			<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
				<?php
				if ($this->uri->segment('1') == 'admin') { ?>
					<a class="dropdown-item" href="<?= site_url('admin/profile') ?>">
						<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
						Ubah Password
					</a>
				<?php } elseif ($this->uri->segment('1') == 'coach') {
				?>
					<a class="dropdown-item" href="<?= site_url('coach/profile') ?>">
						<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
						Ubah Password
					</a>
				<?php } else { ?>
					<a class="dropdown-item" href="<?= site_url('coachee/profile') ?>">
						<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
						Ubah Password
					</a>
				<?php } ?>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout">
					<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
					Logout
				</a>
			</div>
		</li>

	</ul>

</nav>