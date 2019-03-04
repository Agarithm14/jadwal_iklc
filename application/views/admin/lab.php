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
              <a class="nav-link" href="#">
                <i class="nav-icon cui-speedometer"></i> Jadwal
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="nav-icon cui-speedometer"></i> Lab
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="nav-icon cui-speedometer"></i> Asisten
              </a>
            </li>
            <li class="nav-item mt-auto">
              <a class="nav-link nav-link-success" href="https://coreui.io">
                <i class="nav-icon cui-cloud-download"></i> Download CoreUI</a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-link-danger" href="https://coreui.io/pro/">
                <i class="nav-icon cui-layers"></i> Try CoreUI
                <strong>PRO</strong>
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
                <div class="card-header"><h4>Tambah Jadwal</h4></div>
                <div class="card-body">
                  <form action="http://localhost/web/jadwal_iklc/index.php/Admin/labInput" method="post">
                    <div class="form-group">
                      <label for="kode_asisten">Kode Asisten</label>
                      <select class="form-control" name="kode_asisten">
                        <?php
                          foreach($asisten as $row)
                          {
                            echo "<option value='$row->Kode'>";
                            echo $row->Kode . '</option>'."\r\n";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="kode_matkul">Kode Mata Kuliah</label>
                      <select class="form-control" name="kode_matkul">
                        <?php
                          foreach ($matkul as $row) {
                            echo "<option value='$row->kode_matkul'>";
                            echo $row->kode_matkul.'</option>'."\r\n";
                          } 
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="nomor">Nomor Grup</label>
                      <select class="form-control" name="nomor">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
<?php
foreach ($tabel_matkul as $mat){
  ?>
            <div class="col-3">
              <div class="card">
                <div class="card-header"><h4><?php echo $mat[0]->kode_matkul; ?></h4></div>
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Kode Lab</th>
                        <th>Kode Asisten</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($mat as $row ) {
                          echo '<tr>'."\r\n";
                          echo '<td>'."\r\n";
                          echo $row->id;
                          echo '</td>'."\r\n";
                          echo '<td>'."\r\n";
                          echo $row->kode_asisten;
                          echo '</td>'."\r\n";
                          echo '</tr>'."\r\n";
                        }
                          
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <?php }?>
          </div>
        </div>
      </main>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, Bootstrap, then CoreUI  -->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
  </body>
</html>