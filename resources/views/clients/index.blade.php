@extends('layout.app')

@section('main')
<section class="content">

    <!-- Default box -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des Clients</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-hover">

                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nom & Prénoms</th>
                      <th style="width: 220px">Téléphone(s)</th>
                      <th>Adresse</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                  </thead>


                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Franck</td>
                      <td>0745781232 / 0545789865</td>
                      <td>Yopougon Saint André</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-warning" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-warning">550.000F CFA</span></td>
                    </tr>

                    <tr>
                      <td>2.</td>
                      <td>Clean database</td>
                      <td>0745781232 / 0545789865</td>
                      <td>Port-Bouet 43eme Bima</td>

                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar bg-success" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">700.000F CFA</span></td>
                    </tr>

                    <tr>
                      <td>3.</td>
                      <td>Cron job running</td>
                      <td>0745781232 / 0545789865</td>
                      <td>Angré Tapis Rouge</td>

                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-danger" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">300.000F CFA</span></td>
                    </tr>


                    <tr>
                      <td>4.</td>
                      <td>Joress Bernard</td>
                      <td>12457865 / 32654585</td>
                      <td>Angré Tapis bleu</td>

                      <td>
                        <div class="progress progress-xs progress-striped ">
                          <div class="progress-bar bg-success" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">700.000F CFA</span></td>
                    </tr>



                    <tr>
                      <td>5.</td>
                      <td>Seard Xenophobe</td>
                      <td>074545442</td>
                      <td>Yopougon Cité verte</td>

                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-danger" style="width: 40%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">400.000F CFA</span></td>
                    </tr>



                    <tr>
                      <td>6.</td>
                      <td>Cron job running</td>
                      <td>1245789832 / 4564846533</td>
                      <td>Angré Tapis Rouge</td>

                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-danger" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">300.000F CFA</span></td>
                    </tr>





                    <tr>
                      <td>7.</td>
                      <td>Cron job running</td>
                      <td>0745781232 / 0545789865</td>
                      <td>Angré Tapis Rouge</td>

                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-primary" style="width: 60%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-primary">600.000F CFA</span></td>
                    </tr>





                    <tr>
                      <td>8.</td>
                      <td>Fix and squish bugs</td>
                      <td>054545781265</td>
                      <td>Yopougon Cité verte</td>

                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar bg-success" style="width: 90%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-success">900.000F CFA</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.card -->

  </section>

@endsection