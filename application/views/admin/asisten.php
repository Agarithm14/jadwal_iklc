<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css">

    <title>Hello, world!</title>
  </head>
  <body class="app sidebar-show">
    <header class="app-header navbar navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Jadwal Lab IKLC</a>
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <span class="cui-user font-weight-bold mr-4"></span>
    </header>
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-title">Nav Title</li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/web/jadwal_iklc/index.php/Admin/test">
                <i class="nav-icon cui-home"></i> Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/web/jadwal_iklc/index.php/Admin/lab">
                <i class="nav-icon cui-speedometer"></i> Lab
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="http://localhost/web/jadwal_iklc/index.php/Admin/asisten">
                <i class="nav-icon cui-speedometer"></i> Asisten
              </a>
            </li>
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
          </ol>
        </nav>
        <div class="container-fluid">
          <div class="row">
            <div class="col col-lg-3">
              <div class="card">
                <div class="card-header"><h4>Tambah Asisten</h4></div>
                <div class="card-body">
                  <form action="http://localhost/web/jadwal_iklc/index.php/home/asisten" method="post">
                    <div class="form-group">
                      <label for="kode_asis">Kode</label>
                      <input type="text" name="kode_asis" id="kode_asis">
                    </div>
                    <div class="form-group">
                      <label for="nim">NIM</label>
                      <input type="text" name="nim" id="nim">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" id="email">
                    </div>
                    <div class="form-group">
                      <label for="pass">Password</label>
                      <input type="password" name="pass" id="pass">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-header"><h4>Daftar Asisten</h4></div>
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Kode Asisten</th>
                        <th>Nama</th>
                        <!--<th>Mengajar</th>-->
                        <th>Setting</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach($asisten as $row)
                        {
                          echo '<tr>'."\r\n";
                          echo '<td>'.$row->Kode.'</td>'."\r\n";
                          echo '<td>'.$row->nama.'</td>'."\r\n";
                          //echo '<td>'.$row->grup.'</td>'."\r\n";
                          echo '<td><a class="btn btn-primary">Edit</a></td>'."\r\n";
                          echo '</tr>'."\r\n";
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, Bootstrap, then CoreUI  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
  </body>
</html>