<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div id="process" data-name="patient"></div>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Patients</h3>
                            <p class="text-subtitle text-muted">Manage all Patients</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Patients</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">

                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 showingBy">All Patients</h5>

                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal"> 
                                        <i class="fa fa-hospital-user"></i> Add Patient
                                    </button>
                                    <div class="btn-group">

                                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="javascript:void(0)" class="dropdown-item activateAll">
                                                    Activate All </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="dropdown-item deactivateAll">
                                                    Deactivate All </a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0)" class="dropdown-item deleteAll">
                                                    Delete All </a>
                                            </li>
                                        </ul>
                                        
                                    </div>

                                    <div class="btn-group">

                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Show
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="javascript:void(0)" class="dropdown-item showAll">
                                                Show All </a>
                                        </li>

                                        <li>
                                            <a href="javascript:void(0)" class="dropdown-item showActive">
                                               Show Active </a>
                                        </li>

                                        <li>
                                            <a href="javascript:void(0)" class="dropdown-item showDeactive">
                                               Show Deactive </a>
                                        </li>
                                    </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="dataTable" data-filter="All">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>

   <!--Basic Modal -->
   <div class="modal fade text-left" id="viewmodal" tabindex="-1" role="dialog"
                                        aria-labelledby="ssdds" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ssdds">View Patiente Details</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> First Name</label>
                                                                <div class="form-control">
                                                                    <p id="v_first_name"></p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Last Name</label>
                                                                <div class="form-control">
                                                                    <p id="v_last_name"></p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Patient ID</label>
                                                                <div class="form-control">
                                                                    <p id="v_pid"></p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Email</label>
                                                                <div class="form-control">
                                                                    <p id="v_email"></p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Phone No.</label>
                                                                <div class="form-control">
                                                                    <p id="v_phone"></p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Gender</label>

                                                                <div class="form-control">
                                                                    <p id="v_gender"></p>
                                                                </div>

                                                               
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Date of Birth</label>
                                                                <div class="form-control">
                                                                    <p id="v_dob"></p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Image</label>
                                                                <div class="form-control">
                                                                    <p id="v_image"></p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for=""> Address</label>
                                                                <div class="form-control">
                                                                    <p id="v_address"></p>
                                                                </div>
                                                            </div>
                                                        </div>



                                                       
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                </div>
                                                
 
                                            </div>
                                        </div>
  </div>
 <!--Basic Modal -->
 <div class="modal fade text-left" id="addmodal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">Add patient</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>

                                                <form class="modalform"  enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> First Name</label>
                                                                <input type="text" name="first_name" id="" class="form-control" placeholder="First Name">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Last Name</label>
                                                                <input type="text" name="last_name" id="" class="form-control" placeholder="Last Name">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Email</label>
                                                                <input type="email" name="email" id="" class="form-control" placeholder="Email">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for=""> Phone No.</label>
                                                                <input type="number" name="phone" id="" class="form-control" placeholder="Phone No.">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for=""> Gender</label>

                                                                <select name="gender" id="" class="form-select">
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>

                                                               
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Date of Birth</label>
                                                                <input type="date" name="dob" id="" class="form-control" placeholder="Date of Birth">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Image</label>
                                                                <input type="file" class="image-preview-filepond" name="image">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for=""> Address</label>
                                                                <textarea name="address" id="" class="form-control"></textarea>
                                                            </div>
                                                        </div>



                                                       
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <input type="hidden" name="action" value="add">
                                                    <button type="submit" class="btn btn-primary ml-1">Submit
                                                    </button>
                                                </div>
                                                </form>
 


                                            </div>
                                        </div>
  </div>

  <div class="modal fade text-left" id="editmodal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit-title"></h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>

                                                <form class="modalform"  enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> First Name</label>
                                                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Last Name</label>
                                                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                                            </div>
                                                        </div>



                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Email</label>
                                                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Phone No.</label>
                                                                <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone No.">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Gender</label>

                                                                <div class="" id="e_gender"></div>
                                                               
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Date of Birth</label>
                                                                <div id="e_dob"></div>

                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Image</label>
                                                                <input type="file" class="image-preview-filepond" name="image" id="image">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Image Preview</label>
                                                                <div id="img_preview">
                                                            </div>
                                                        </div>

                                                       


                                                       
                                                    </div>

                                                    <div class="col-12">
                                                            <div class="form-group">
                                                                <label for=""> Address</label>
                                                                <textarea name="address" id="address" class="form-control"></textarea>
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <input type="hidden" name="action" value="edit">
                                                    <input type="hidden" name="id" id="row_id" value="">
                                                    <input type="hidden" name="old_image" id="old_image" value="">
                                                    <button type="submit" class="btn btn-primary ml-1">Submit
                                                    </button>
                                                </div>
                                                </form>
 


                                            </div>
                                        </div>
  </div>

