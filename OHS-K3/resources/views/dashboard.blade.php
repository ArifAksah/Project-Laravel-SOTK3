<x-app-layout>
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
                            <div class="col-lg-12">
                                @if(auth()->user()->role === 'quest')
                                    @if(auth()->user()->is_approved == 0)
                                        <div class="card card-warning card-rounded">
                                            <div class="card-body">
                                                <h4 class="card-title">Akun Anda Sedang Dalam Tahap Review</h4>
                                                <p>Mohon menunggu, akun Anda sedang diperiksa oleh administrator.</p>
                                            </div>
                                        </div>
                                    @elseif(auth()->user()->is_approved == 3)
                                        <div class="card card-danger card-rounded">
                                            <div class="card-body">
                                                <h4 class="card-title">Akun Anda Ditolak</h4>
                                                <p>Mohon maaf, akun Anda telah ditolak oleh administrator. Silakan hubungi pihak terkait untuk informasi lebih lanjut.</p>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @if(auth()->user()->is_approved == 1)
                            <div class="row">
                                @if(Auth::user()->role === 'admin')
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
                                @else
                                <div class="col-lg-8 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-12 col-lg-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    {!! $expensesChartUser->container() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="col-lg-4 d-flex flex-column">
                                    <div class="row flex-grow">
                                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                            <div class="card bg-primary card-rounded">
                                                <div class="card-body pb-0">
                                                    <h4 class="card-title card-title-dash text-white mb-4">Status Akun</h4>
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
                                        <!-- Conditional Display for Plant HeatMap Chart -->
                                        @if(Auth::user()->role === 'admin')
                                            <!-- Display only for admin -->
                                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            {!! $categoryChart->container() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Display alternative content for non-admins -->
                                            <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                                                <div class="card card-rounded">
                                                    <div class="card-body">
                                                    <div class="row">
                                                        {!! $categoryChartUser->container() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <!-- Conditional Display for Plant HeatMap Chart -->
                            @if(Auth::user()->role === 'admin')
                                <!-- Display only for admin -->
                                <div class="col-lg-8 d-flex flex-column">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="row">
                                                {!! $plantgrafik->container() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Display alternative content for non-admins -->
                                <div class="col-lg-8 d-flex flex-column">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                        <div class="row">
                                              {!! $plantGrafikUser->container() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            @if(Auth::user()->role === 'admin')
                                <!-- Display only for admin -->
                                <div class="col-lg-4 d-flex flex-column">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                            <div class="row">
                                                {!! $statusChart->container() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Display alternative content for non-admins -->
                                <div class="col-lg-4 d-flex flex-column">
                                    <div class="card card-rounded">
                                        <div class="card-body">
                                        <div class="row">
                                              {!! $statusChartUser->container() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            </div>
                        @endif
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
          <script src="{{ $expensesChartUser->cdn() }}"></script>
          <script src="{{ $categoryChart->cdn() }}"></script>
          <script src="{{ $categoryChartUser->cdn() }}"></script>
          <script src="{{ $plantgrafik->cdn() }}"></script>
          <script src="{{ $statusChart->cdn() }}"></script>
          <script src="{{ $statusChartUser->cdn() }}"></script>
          <script src="{{ $plantGrafikUser->cdn() }}"></script>
          <!-- Include Chart.js scripts -->
          {!! $expensesChart->script() !!}
          {!! $expensesChartUser->script() !!}
          {!! $categoryChart->script() !!}
          {!! $categoryChartUser->script() !!}
          {!! $plantgrafik->script() !!}
          {!! $statusChart->script() !!}
          {!! $statusChartUser->script() !!}
          {!! $plantGrafikUser->script() !!}
           
</x-app-layout>
