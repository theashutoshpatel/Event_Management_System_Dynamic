<style>
  /* Sidebar Styles */
  #sidebar {
    position: fixed;
    height: 100%;
    width: 250px;
    background: #0080ff; /* Light Blue */
    box-shadow: 2px 0px 5px rgba(0, 0, 0, 0.2);
    overflow-y: auto;
    z-index: 1000;
  }

  /* Sidebar Logo */
  #sidebar .sidebar-logo {
    display: flex;
    align-items: center;
    padding: 15px;
    background: #87ceeb; /* Slightly darker blue for the logo section */
    border-bottom: 1px solid rgba(255, 255, 255, 0.3);
  }

  #sidebar .sidebar-logo img {
    height: 40px;
    margin-right: 10px;
  }

  #sidebar .sidebar-logo span {
    font-size: 18px;
    font-weight: bold;
    color: white;
  }

  /* Sidebar Links */
  .sidebar-list a {
    display: flex;
    align-items: center;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 500;
    color: #333; /* Dark text color for contrast */
    text-decoration: none;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    transition: background 0.2s ease;
  }

  .sidebar-list a:hover {
    background: #80808045; /* Light hover effect */
    color: #0056b3; /* Dark blue hover text */
  }

  .sidebar-list a.active {
    background: #87cefa; /* Highlight for active link */
    color: #0056b3; /* Dark blue text */
  }

  .sidebar-list a .icon-field {
    margin-right: 10px;
    font-size: 18px;
  }

  /* Responsive Sidebar */
  @media (max-width: 991px) {
    #sidebar {
      position: fixed;
      transform: translateX(-100%);
      transition: transform 0.3s ease;
    }

    #sidebar.active {
      transform: translateX(0);
    }

    #sidebar-toggle {
      display: block;
    }
  }

  @media (min-width: 992px) {
    #sidebar-toggle {
      display: none;
    }
  }

  /* Sidebar Toggle Button */
  #sidebar-toggle {
    position: fixed;
    top: 20px;
    left: 20px;
    font-size: 24px;
    color: #333;
    cursor: pointer;
    background: rgba(173, 216, 230, 0.8); /* Light blue button */
    padding: 10px;
    border-radius: 50%;
  }

  #sidebar-toggle:hover {
    background: rgba(173, 216, 230, 1); /* Darker blue on hover */
  }
</style>

<!-- Sidebar -->
<div id="sidebar">
  <!-- Sidebar Logo -->
  <div class="sidebar-logo">
  <img width="39" height="35" src="https://img.icons8.com/dotty/80/admin-settings-male.png" alt="admin-settings-male"/>
    <span>Festiiv Events</span>
  </div>

  <!-- Sidebar Links -->
  <div class="sidebar-list">
    <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><img width="35" height="35" src="https://img.icons8.com/pastel-glyph/128/228BE6/home.png" alt="home"/></span> Home</a>
    <a href="index.php?page=booking" class="nav-item nav-booking"><span class='icon-field'><img width="35" height="35" src="https://img.icons8.com/stickers/50/list.png" alt="list"/></span> Venue Book List</a>
    <a href="index.php?page=audience" class="nav-item nav-audience"><span class='icon-field'><img width="35" height="35" src="https://img.icons8.com/stickers/50/list.png" alt="list"/></span> Event Audience List</a>
    <a href="index.php?page=venue" class="nav-item nav-venue"><span class='icon-field'><img width="35" height="35" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/64/external-venue-night-club-flaticons-lineal-color-flat-icons-3.png" alt="Refresh"/></span> Venues</a>
    <a href="index.php?page=events" class="nav-item nav-events"><span class='icon-field'><img width="35" height="35" src="https://img.icons8.com/matisse/100/event-accepted.png" alt="event-accepted"/></span> Events</a>
    <a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><img width="35" height="35" src="https://img.icons8.com/doodle/48/group--v1.png" alt="group--v1"/></span> Users</a>
    <!-- <a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><img width="35" height="35" src="https://img.icons8.com/doodle/48/group--v1.png" alt="group--v1"/></span> Users</a> -->
  </div>
</div>

<!-- Toggle Button -->
<div id="sidebar-toggle">
  <i class="fa fa-bars"></i>
</div>

<script>
  // Toggle Sidebar Visibility
  const toggleBtn = document.getElementById('sidebar-toggle');
  const sidebar = document.getElementById('sidebar');

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('active');
  });

  // Highlight Active Page
  const currentPage = "<?php echo isset($_GET['page']) ? $_GET['page'] : ''; ?>";
  const activeLink = document.querySelector(`.nav-${currentPage}`);
  if (activeLink) activeLink.classList.add('active');
</script>
