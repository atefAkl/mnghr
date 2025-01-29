<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  {{-- ADMIN TEMPLATE BLADE --}}
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>@yield('title', 'AYERP | Software Development')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/assets/admin/css/report.style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
    integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  @yield('extra-links')
</head>

<body>

  <div class="admin-wrapper">
    <table id="content" class="text-center">
      <thead>
        <tr>
          <td>
            {{-- ========== header reports  ======================== --}}
            <header class="header-report">
              <div class="header-left">
                <div class="logo">
                  <img src="{{ asset('assets/admin/uploads/images/logo-icon.png')}}" alt="logo_report" />
                  <div class="logo-text ">
                    <span class="company-name">company</span>
                    <span class="company-slogan">company slogan</span>
                  </div>
                </div>
                <div class="company-number mt-1"><span class="fw-bold">CR Number:</span> 123456789</div>
              </div>
              <div class="header-center text-center">
                <span class="title-report">Reports</span>
                <span class="info-report">Date: January 1, 2024</span>
                <span class="info-report">Page: 1 of 4</span>
              </div>
              <div class="header-right">
                <img class="logo" src="{{ asset('assets/admin/uploads/images/images.jfif')}}" alt="logo_report" />

              </div>

            </header>
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <div class="client-info p-3 text-center d-flex align-items-center">
              <div class="row ">
                <div class="col col-6">
                  <div class="row">
                    <div class="col col-3 fw-bold">Client:</div>
                    <div class="col col-9 text-start">Ahmed El Attar</div>
                    <div class="col col-3 fw-bold">Phone: </div>
                    <div class="col col-9 text-start"> +1 (555) 555 5557</div>
                    <div class="col col-3 fw-bold">Email: </div>
                    <div class="col col-9 text-start">atef@gmail.com</div>
                  </div>
                </div>
                <div class="col col-6">
                  <div class="row">
                    <div class="col col-4 text-end fw-bold">Project: </div>
                    <div class="col col-8 text-start">input</div>
                    <div class="col col-4 text-end fw-bold">Attention: </div>
                    <div class="col col-8  text-start">input</div>
                    <div class="col col-4 text-end fw-bold">Issued By: </div>
                    <div class="col col-8  text-start">Ahmed El Attar</div>
                  </div>
                </div>
              </div>
            </div>
          @yield('contents')
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td>
            <div class="footer-section mt-5 row">
              <div class="footer-address col col-12 fw-bold">155 East Street, Winchester,NY 22051 | 155 East Street, Winchester,NY 22051</div>
              <div class="footer-contact col col-12 mt-3">
                <div class="row">
                  <div class="col col-3">
                    <i class="fa fa-envelope-square"></i> globex@gmail.in
                  </div>
                  <div class="col col-3">
                    <i class="fa fa-phone-square"></i>+1 (555) 555 7770
                  </div>
                  <div class="col col-3">
                    <i class="fa fa-phone-square"></i>+1 (555) 555 7770
                  </div>
                  <div class="col col-3">
                    <i class="fa fa-phone-square"></i> +1 (555) 555 7770
                  </div>
                </div>
              </div>
            </div>

          </td>
        </tr>
      </tfoot>
    </table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/js/all.min.js"
    integrity="sha512-1JkMy1LR9bTo3psH+H4SV5bO2dFylgOy+UJhMus1zF4VEFuZVu5lsi4I6iIndE4N9p01z1554ZDcvMSjMaqCBQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>