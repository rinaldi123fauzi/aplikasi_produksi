<style type="text/css">

  .sidebar li .submenu{ 
    list-style: none; 
    margin: 0; 
    padding: 0; 
    padding-left: 1rem; 
    padding-right: 1rem;
  }
  
  .sidebar .nav-link {
      font-weight: 500;
      color: var(--bs-dark);
  }
  .sidebar .nav-link:hover {
      color: var(--bs-primary);
  }
  
</style>

<script type="text/javascript">

	document.addEventListener("DOMContentLoaded", function(){

		document.querySelectorAll('.sidebar .nav-link').forEach(function(element){

			element.addEventListener('click', function (e) {

				let nextEl = element.nextElementSibling;
				let parentEl  = element.parentElement;	

				if(nextEl) {
					e.preventDefault();	
					let mycollapse = new bootstrap.Collapse(nextEl);

			  		if(nextEl.classList.contains('show')){
			  			mycollapse.hide();
			  		} else {
			  			mycollapse.show();
			  			// find other submenus with class=show
			  			var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
			  			// if it exists, then close all of them
						if(opened_submenu){
							new bootstrap.Collapse(opened_submenu);
						}

			  		}
		  		}

			});
		})

	}); 
	// DOMContentLoaded  end
</script>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item has-submenu">
          <a class="nav-link dropdown-toggle" href="#"><span data-feather="file-text" class="align-text-bottom"></span> Data Master <i class="bi bi-caret-down"></i> </a>
          <ul class="submenu collapse">
              <li><a class="nav-link" href="/employee">Karyawan </a></li>
              <li><a class="nav-link" href="/item">Item </a></li>
              <li><a class="nav-link" href="/location">Lokasi </a></li>
              <li><a class="nav-link" href="/achivement">Achivement </a></li>
              <li><a class="nav-link" href="/planning">Plaining </a></li>
          </ul>
        </li>
        <li class="nav-item has-submenu">
          <a class="nav-link dropdown-toggle" href="#"><span data-feather="file-text" class="align-text-bottom"></span> Data Transaksi <i class="bi bi-caret-down"></i> </a>
          <ul class="submenu collapse">
              <li><a class="nav-link" href="/tx_product">Transaksi Produk</a></li>
          </ul>
        </li>
      </ul>
    </div>
</nav>