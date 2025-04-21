<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no" />
    <title>Amathyst Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/dashboard.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar">
                <div class="dashboard-logo">
                    <img src="assests/images/Logo.png" alt="">
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link active" href="#">My Profile</a>
                    </li>
                   <li class="nav-item"><a class="nav-link" href="#">My Booking</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Messages</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">My Availability</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">My Earning</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Rates</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Verification Documents</a></li>
                </ul>
            </nav>

            <!-- Main Content -->
            <header class="col-md-10 ms-sm-auto px-md-4">
                <div class="dashboard-header d-flex justify-content-between align-items-center">
                    <h2>Dashboard</h2>
                    <ul class="menu-dashboard">
                        <li>Home</li>
                        <li>Gems</li>
                    </ul>
                    <div class="d-flex align-items-center search-dash">
                        <input type="text" class="form-control search-barr" placeholder="Search category...">
                        <i class="fas fa-search search-dash"></i>
                        <div class="bell-notifiate">
                            <i class="far fa-bell notification-bell"></i>
                        </div>
                        <img src="assests/images/Wuliee-prfile.png" class="rounded-circle-img" alt="User Avatar">
                    </div>
                </div>

                <div class="dashboard-contenttext">


                    <div class="subchild-profile d-flex">
                        <div class="">
                            <img src="assests/images/Wuliee-prfile.png" class="rounded-circle" alt="Profile">
                        </div>
                        <div class="text-subchile">
                            <h5>Wuliee Wanson 12</h5>
                            <p>wulieeeme12@gmail.com</p>
                        </div>
                    </div>


                    <div class="your-photos">
                        <h5>Your Photo</h5>
                        <div class="row g-3">

                            <div class="col-md-2">
                              <input type="file" class="file-uploads" id="fileInput" hidden>
                              <div class="photo-upload-box" id="customUpload">+ Upload</div>
                            </div>
                            <div class="col-md-2">
                              <input type="file" class="file-uploads" id="fileInput" hidden>
                              <div class="photo-upload-box" id="customUpload">+ Upload</div>
                            </div>
                            <div class="col-md-2">
                              <input type="file" class="file-uploads" id="fileInput" hidden>
                              <div class="photo-upload-box" id="customUpload">+ Upload</div>
                            </div>
                            <div class="col-md-2">
                              <input type="file" class="file-uploads" id="fileInput" hidden>
                              <div class="photo-upload-box" id="customUpload">+ Upload</div>
                            </div>

          
                        </div>
                    </div>

                    <div class="personal-infodashboard">
                        <h5>Personal Information</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" value="" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Birthday</label>
                                <div class="d-flex gap-2">
                                    <input type="number" class="form-control" value="">
                                    <input type="text" class="form-control" value="">
                                    <input type="number" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


<script>
  document.getElementById("customUpload").addEventListener("click", function () {
  document.getElementById("fileInput").click();
});



</script>


</html>