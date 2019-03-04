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
  <body class="app">
    <header class="app-header navbar navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Jadwal Lab IKLC</a>
    </header>
    <div class="app-body">
      <main class="main">
        <div class="container mt-4 px-1 px-lg-3">
          <div class="row">
            <div class="col">
              <div class="alert alert-secondary" role="alert">
                <form class="form">
                  <div class="row">
                    <div class="col-8 pr-0">
                      <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    </div>
                    <div class="col">
                      <button class="btn btn-outline-success form-control" type="submit">Search</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col">
              <div class="card">
                
                <div class="card-body px-0 py-0">
                  <div class="jadwal-table">
                    <table class="table table-striped table-hover">
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
                            echo '<td><ul class="list-group">'."\r\n";
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
                              }
                              
                              echo "<li class='list-group-item $st'>";
                              echo $row->jam."<br>".$row->kode_matkul." ".$row->nomor;
                              echo '</li>'."\r\n";
                            }
                            echo '</ul></td>'."\r\n";
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