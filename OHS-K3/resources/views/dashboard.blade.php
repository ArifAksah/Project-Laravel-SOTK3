<x-app-layout>
        <!-- partial -->
        <!-- partial -->
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="home-tab">
                  <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                      </li>
                    </ul>
                    <div>
                      <div class="btn-wrapper">
                        <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                        <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                        <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                      </div>
                    </div>
                  </div>
                  <div class="tab-content tab-content-basic">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                      <div class="row">
                        <div class="col-lg-8 d-flex flex-column">
                          <div class="row flex-grow">
                              <div class="col-12 col-lg-12 grid-margin stretch-card">
                                  <div class="card card-rounded">
                                      <div class="card-body">
                                              {!! $expensesChart->container() !!}
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-lg-4 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                              <div class="card bg-primary card-rounded">
                                <div class="card-body pb-0">
                                  <h4 class="card-title card-title-dash text-white mb-4">Status  Akun</h4>
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <p class="status-summary-ight-white mb-1">Role : {{ auth()->user()->role }}</p>
                                      
                                    </div>
                                    <div class="col-sm-8">
                                      <div class="status-summary-chart-wrapper pb-4">
                                      <p class="status-summary-ight-white mb-1">Aktif :</p>
                                        <h5 class="text-info">{{ auth()->user()->created_at->format('d F Y') }}</h5>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                  <div class="row">
                                  {!! $categoryChart->container() !!}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-8 d-flex flex-column">
                          <div class="card card-rounded">
                              <div class="card-body">
                                <div class="row">
                                  {!! $plantgrafik->container() !!}
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-4 d-flex flex-column">
                          <div class="row flex-grow">
                            <div class="col-12 grid-margin stretch-card">
                              <div class="card card-rounded">
                                <div class="card-body">
                                {!! $statusChart->container() !!}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> PT. SEMEN TONASA Safety Observation Tour(SOT)</span>
              <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2023. All rights reserved.</span>
            </div>
          </footer>
          <!-- partial -->
          <!-- Include Chart.js CDN -->
          <script src="{{ $expensesChart->cdn() }}"></script>
          <script src="{{ $categoryChart->cdn() }}"></script>
          <script src="{{ $plantgrafik->cdn() }}"></script>
          <script src="{{ $statusChart->cdn() }}"></script>
          <!-- Include Chart.js scripts -->
          {!! $expensesChart->script() !!}
          {!! $categoryChart->script() !!}
          {!! $plantgrafik->script() !!}
          {!! $statusChart->script() !!}
           
</x-app-layout>
