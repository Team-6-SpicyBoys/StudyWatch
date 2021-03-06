<?php require_once(APP_PATH.'/styles.php'); ?>
<?php require_once(APP_PATH.'/javascripts.php'); ?>
<?php require_once(APP_PATH.'/controllers/studentlist.php'); ?>

<body class="hold-transition sidebar-mini">
<header class="main-header">
	<nav class="navbar navbar-static-top bg-white navbar-light border-bottom" >
		<a class="nav-link" data-widget="pushmenu" href="#">
			<i class="fa fa-bars"></i>
		</a>
		<div>
		<li class="nav-item d-none d-sm-inline-block">
		<a name="home" href="#" class="nav-link">Welkom bij StudyWatch!</a>
		</li>
		</div>
			<li class="nav-item d-none d-sm-inline-block">
	<a name="logout" href="#" class="nav-link bg-info logout" ><b>Log uit</b></a>
	</li>
	</nav>
</header>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      
		<span class="brand-text font-weight-light">
			<img src="img/windesheim.svg" alt="Logo"
           style="opacity: .8;width:100%;height:auto;">
		</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a name="home" href="#" class="d-block">Welkom <b><?php echo getUsername(); ?></b></a>
        </div>
      </div>
    </div>
  </aside>

	  
    </div>
  </aside>
  
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1 style="text:center;">Studenten aanwezigheid</h1>
          </div>
        </div>
      </div>
    </section>

          <div class="card">
            <div class="card-body">
              <table id="table" class="table table-bordered">
                <thead>
				<?php
					echo "<tr>
					<th>Naam</th>
					<th>Aanwezigheid</th>
					</tr>";
				?>	
                </thead>
                <tbody>
				<?php
				getStudents();
				?>
                </tfoot>
              </table>
            </div>
			
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include(APP_PATH.'/views/footer.php'); ?>
</div>

<script>
//functie om de tabel weer te geven
  $(function () {
    $('#table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "info": true,
    });
  });

var test3 = document.getElementsByName('logout');

//Set function to logout and switch to login page		  
for(var i =0;i<test3.length;i++)
{
	test3[i].addEventListener('click',function()
	{
		document.body.innerHTML += '<form id="dyn1Form" method="post"><input type="hidden" name="controller" value="user"><input type="hidden" name="action" value="logout">';
		document.getElementById("dyn1Form").submit();
	}
	);
}

</script>


</body>
