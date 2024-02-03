<div class="nk-sidebar">
	<div class="nk-nav-scroll">
		<ul class="metismenu" id="menu">
			<li class="nav-label">Dashboard</li>
			<li>
				<a href="<?= base_url('Home'); ?>" aria-expanded="false">
					<i class="icon-grid menu-icon"></i><span class="nav-text">Dashboard</span>
				</a>
			</li>
			<?php if (auth()->akses == 'dokter') : ?>
				<li>
					<a href="<?= base_url('layanan'); ?>" aria-expanded="false">
						<i class="icon-note menu-icon"></i><span class="nav-text">Antrian Pasien</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('layanan'); ?>" aria-expanded="false">
						<i class="icon-note menu-icon"></i><span class="nav-text">Laporan</span>
					</a>
				</li>
			<?php endif ?>
			<?php if (auth()->akses == 'admin') : ?>

				<li>
					<a href="<?= base_url('layanan'); ?>" aria-expanded="false">
						<i class="icon-note menu-icon"></i><span class="nav-text">Layanan</span>
					</a>

				</li>
				<li>
					<a href="<?= base_url('dokter'); ?>" aria-expanded="false">
						<i class="icon-user menu-icon"></i><span class="nav-text">Dokter</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('jadwal'); ?>" aria-expanded="false">
						<i class="icon-calender menu-icon"></i><span class="nav-text">Jadwal</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('antrian'); ?>" aria-expanded="false">
						<i class="icon-note menu-icon"></i><span class="nav-text">Antrian</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('jamkes'); ?>" aria-expanded="false">
						<i class="icon-plus menu-icon"></i><span class="nav-text">Jaminan Kesehatan</span>
					</a>
				</li>
				<li>
					<a href="<?= base_url('pendaftaran'); ?>" aria-expanded="false">
						<i class="icon-user menu-icon"></i><span class="nav-text">Pendaftaran</span>
					</a>
				</li>
			<?php endif ?>

		</ul>
	</div>
</div>