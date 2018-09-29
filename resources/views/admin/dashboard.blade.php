<html>
    <head>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
            <style>
                    body {
                        font-size: .875rem;
                      }
                      
                      .feather {
                        width: 16px;
                        height: 16px;
                        vertical-align: text-bottom;
                      }
                      
                      /*
                       * Sidebar
                       */
                      
                      .sidebar {
                        position: fixed;
                        top: 0;
                        bottom: 0;
                        left: 0;
                        z-index: 100; /* Behind the navbar */
                        padding: 48px 0 0; /* Height of navbar */
                        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
                      }
                      
                      .sidebar-sticky {
                        position: relative;
                        top: 0;
                        height: calc(100vh - 48px);
                        padding-top: .5rem;
                        overflow-x: hidden;
                        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
                      }
                      
                      @supports ((position: -webkit-sticky) or (position: sticky)) {
                        .sidebar-sticky {
                          position: -webkit-sticky;
                          position: sticky;
                        }
                      }
                      
                      .sidebar .nav-link {
                        font-weight: 500;
                        color: #333;
                      }
                      
                      .sidebar .nav-link .feather {
                        margin-right: 4px;
                        color: #999;
                      }
                      
                      .sidebar .nav-link.active {
                        color: #007bff;
                      }
                      
                      .sidebar .nav-link:hover .feather,
                      .sidebar .nav-link.active .feather {
                        color: inherit;
                      }
                      
                      .sidebar-heading {
                        font-size: .75rem;
                        text-transform: uppercase;
                      }
                      
                      /*
                       * Content
                       */
                      
                      [role="main"] {
                        padding-top: 48px; /* Space for fixed navbar */
                      }
                      
                      /*
                       * Navbar
                       */
                      
                      .navbar-brand {
                        padding-top: .75rem;
                        padding-bottom: .75rem;
                        font-size: 1rem;
                        background-color: rgba(0, 0, 0, .25);
                        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
                      }
                      
                      .navbar .form-control {
                        padding: .75rem 1rem;
                        border-width: 0;
                        border-radius: 0;
                      }
                      
                      .form-control-dark {
                        color: #fff;
                        background-color: rgba(255, 255, 255, .1);
                        border-color: rgba(255, 255, 255, .1);
                      }
                      
                      .form-control-dark:focus {
                        border-color: transparent;
                        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
                      }
                      
            </style>
    </head>
    <body>
            <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
                    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">BuynSell</a>
                    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
                    <ul class="navbar-nav px-3">
                      <li class="nav-item text-nowrap">
                        <a class="nav-link" href="#">Sign out</a>
                      </li>
                    </ul>
                  </nav>
              
                  <div class="container-fluid">
                    <div class="row">
                      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                        <div class="sidebar-sticky">
                          <ul class="nav flex-column">
                            <li class="nav-item">
                              <a class="nav-link active" href="#">
                                <span data-feather="home"></span>
                                Dashboard <span class="sr-only">(current)</span>
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">
                                <span data-feather="file"></span>
                                Moderated Adverts
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Banned Accounts
                              </a>
                            </li>
                           
                          </ul>
              
                         
                          
                        </div>
                      </nav>
              
                      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                        
                                      
              
                        <h2>Reported Adverts</h2>
                        <div class="table-responsive">
                          <table class="table table-striped table-sm">
                            <thead>
                              <tr>
                                <th>Advert ID</th>
                                <th>Creator of the advert</th>
                                <th>Reported by</th>
                                <th>Type of violation</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                            <td>1,001</td>
                                            <td>Alex</td>
                                            <td>Kevin</td>
                                            <td>Spam</td>
                                            <td><button class="btn btn-primary">view</button></td>
                                    </tr>
                                    <tr>
                                            <td>1,003</td>
                                            <td>Tim</td>
                                            <td>Alex</td>
                                            <td>Abusive/Harmful</td>
                                            <td><button class="btn btn-primary">view</button></td>
                                    </tr>  
                                    <tr>
                                            <td>1,004</td>
                                            <td>Tim</td>
                                            <td>John</td>
                                            <td>Abusive/Harmful</td>
                                            <td><button class="btn btn-primary">view</button></td>
                                    </tr>  
                                    <tr>
                                            <td>1,005</td>
                                            <td>Tim</td>
                                            <td>Alex</td>
                                            <td>Sale or promotion of counterfeit goods</td>
                                            <td><button class="btn btn-primary">view</button></td>
                                    </tr>                
                            </tbody>
                          </table>
                        </div>
                      </main>
                    </div>
                  </div>
    </body>
</html>