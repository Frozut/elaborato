<div class="sidebar">
  <div class="logo_content">
    <div class="logo">
      <i class='bx bxl-c-plus-plus'></i>
      <div class="logo_name">Eleborato</div>
    </div>
    <i class='bx bx-menu' id="btn"></i>
  </div>
  <ul class="nav_list">
    <li>
      <a href="dashboard.php">
        <i class='bx bx-grid-alt'></i>
        <span class="links_name">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>
    <li>
      <a href="settings.php">
        <i class='bx bx-user'></i>
        <span class="links_name">User</span>
      </a>
      <span class="tooltip">User</span>
    </li>
    <li>
      <a href="Trasferimenti.php">
        <i class='bx bx-cart-alt'></i>
        <span class="links_name">transactions</span>
      </a>
      <span class="tooltip">transactions</span>
    </li>
    <li>
      <a href="seetransazioni.php">
        <i class='bx bx-book-reader'></i>
        <span class="links_name">see transactions</span>
      </a>
      <span class="tooltip">see transactions</span>
    </li>
    <li>
      <a href="#">
        <i class='bx bx-pie-chart-alt-2'></i>
        <span class="links_name">Analytics</span>
      </a>
      <span class="tooltip">Analytics</span>
    </li>
    <li>
      <a href="#">
        <i class='bx bx-folder'></i>
        <span class="links_name">File Manager</span>
      </a>
      <span class="tooltip">Files</span>
    </li>
    <li>
      <a href="#">
        <i class='bx bx-cog'></i>
        <span class="links_name">Setting</span>
      </a>
      <span class="tooltip">Setting</span>
    </li>
  </ul>
  <div class="profile_content">
    <div class="profile">
      <div class="profile_details">
        <div class="name_job">
          <div class="name"><?php echo $_SESSION['username'] ?>
          </div>
        </div>
      </div>
      <a href="logout.php">
        <i class='bx bx-log-out' id="log_out"></i>
      </a>
    </div>
  </div>
</div>










<script>
  let btn = document.querySelector("#btn");
  let sidebar = document.querySelector(".sidebar");

  btn.onclick = function() {
    sidebar.classList.toggle("active");
  }
</script>