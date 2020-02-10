<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    Sidebar Overview -->
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo site_url('admin') ?>">
            <i class="fa fa-home"></i>
            <span>Home</span>
        </a>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <i class="fa fa-book"></i>
            <span>File</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/media') ?>">File Media</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/klien') ?>"> File Client</a>
            <?php if ($this->session->role_id != 'marketing') { ?>
                <a class="dropdown-item" href="<?php echo site_url('admin/karyawan') ?>"> File Employee</a>
            <?php } ?>
            <!-- session untuk memberikan hak akses, != artinya tidak sama dengan role_id="5" tidak mendapatkan akses kepada file employee -->
        </div>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-credit-card"></i>
            <span>Transaksi</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/transaksi/So') ?>">Pembuatan So </a>
            <?php if ($this->session->role_id != 'marketing') { ?>
                <a class="dropdown-item" href="<?php echo site_url('admin/transaksi/penjualan') ?>">Pemesanan Iklan</a>
            <?php } ?>
            <?php if ($this->session->role_id != 'marketing') { ?>
                <a class="dropdown-item" href="<?php echo site_url('admin/transaksi/hutang') ?>">Pembayaran Kemedia</a>
            <?php } ?>
        </div>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa line-chart"></i>
            <i class="fa fa-server" aria-hidden="true"></i>
            <span>Laporan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/laporan/Lap_penjualan') ?>">Laporan Penjualan</a>
            <?php if ($this->session->role_id != 'marketing') { ?>
                <a class="dropdown-item" href="<?php echo site_url('admin/laporan/Lap_pembayaran') ?>">Laporan Pembayaran</a>
            <?php } ?>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('auth/registration') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>
</ul>