<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons/css/coreui-icons.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'/assets/';?>costom.css">

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
                <div class="card-header"><h4>Tambah Jadwal</h4></div>
                <div class="card-body">
                  <div style="overflow-x:auto;">
                  <form action="http://localhost/web/jadwal_iklc/index.php/Admin/testInput" method="post">
                    <div class="form-group">
                      <label for="tanggal">Tanggal</label>
                      <input type="date" name="tanggal" id="tanggal" value="<?php echo date('Y-m-d')?>">
                    </div>
                    <div class="form-group">
                      <label for="waktu">Jam</label>
                      <select class="form-control" name="waktu">
                        <?php
                          foreach ($waktu as $row) {
                              echo "<option value='$row->indeks'>";
                              echo $row->jam . '</option>'."\r\n";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="tipe">Tipe</label>
                      <select class="form-control" name="tipe">
                        <option value="0">Ilkom</option>
                        <option value="1">TI</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="id_grup">Grup</label>
                      <select class="form-control" name="id_grup">
                        <?php
                          foreach ($grup as $row) {
                            echo "<option value='$row->id'>";
                            echo $row->kode_matkul.' ';
                            echo $row->nomor.'</option>'."\r\n";
                          } 
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="ruang">Ruang</label>
                      <select class="form-control" name="ruang">
                        <?php
                          foreach ($ruang as $row) {
                              echo "<option value='$row->no_ruangan'>";
                              echo $row->nama_ruangan.'</option>'."\r\n";
                          }
                        ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-header">
                  <h4>Tabel Jadwal
                    <small>Tanggal <?php echo date('d/m/Y').'-'.date('d/m/Y', strtotime("+1 week"))?></small>
                  </h4>
                </div>
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Lab</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $foo = 0;
                        foreach($jadwal as $ruang)
                        {
                          echo '<tr>'."\r\n";
                          echo '<td><b>'.$nama_ruangan[$foo].'</b></td>'."\r\n";
                          $hari = $ruang;
                          for ($i=0;$i<5;$i++) {
                            echo '<td><div class="list-group">'."\r\n";
                            foreach ($hari[$i] as $row) {
                              
                              $row->semester = (int) $row->semester;
                              switch ($row->semester){
                                case 2 : $st = 'st-18';
                                break;
                                case 4 : $st = 'st-17';
                                break;
                                case 6 : $st = 'st-16';
                                break;
                                case 8 : $st = 'st-15';
                                break;
                                case 10 : $st = 'st-14';
                                break;
                                default : $st = '';
                              }
                              
                              echo "<button id='$row->id' type='button'";
                              echo "class='list-group-item list-group-item-action btn-jadwal $st'";
                              echo "data-toggle='modal' data-target='#editModal'>";
                              echo $row->jam." ".$row->kode_matkul." ".$row->nomor;
                              echo '</button>'."\r\n";
                            }
                            echo '</div></td>'."\r\n";
                          }
                          echo '</tr>'."\r\n";
                          $foo++;
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
<!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="http://localhost/web/jadwal_iklc/index.php/Admin/testDelete">
              <input type="text" name="id-jadwal" id="id-jadwal" style="display:none;">
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>    
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, Bootstrap, then CoreUI  -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
    <script>
      $(document).ready(function(){
        $(".btn-jadwal").click(function(){
          $("#id-jadwal").val($(this).attr('id'));
        });
      });
      
    </script>
  </body>
</html>