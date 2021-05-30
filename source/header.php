<div class="sidebar">
  <div class="logo_content">
    <div class="logo">
      <i class='bx bxl-jquery'></i>
      <div class="logo_name">DailyBank</div>
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
      <a href="trasferimenti_mese-mese.php">
        <i class='bx bx-calendar'></i>
        <span class="links_name">transactions from ... to</span>
      </a>
      <span class="tooltip">transactions from ... to</span>
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