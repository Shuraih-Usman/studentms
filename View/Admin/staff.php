<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div id="process" data-name="staff"></div>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Staffs</h3>
                            <p class="text-subtitle text-muted">Manage all Staffs</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Staffs</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">

                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 showingBy">All Staffs</h5>

                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal"> 
                                        <i class="fa fa-hospital-user"></i> Add New Staff
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
                                        <th>Username.</th>
                                        <th>Name</th>
                                        <th>Role</th>
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
 <div class="modal fade text-left" id="addmodal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">Add Staff</h5>
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
                                                                <label for=""> Full Name</label>
                                                                <input type="text" name="full_name" id="" class="form-control" placeholder="Full Name">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Username</label>
                                                                <input type="text" name="username" id="" class="form-control" placeholder="Username">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Password </label>
                                                                <input type="password" name="password" id="" class="form-control" placeholder="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Role</label>
                                                                <select class="choices form-select" name="role">
                                                                    <option value="Principal">Principal</option>
                                                                    <option value="Exam Officer">Exam Officer</option>
                                                                    <option value="Senior Master">Senior Master</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for=""> Image</label>
                                                                <input type="file" class="image-preview-filepond" name="image">
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
                                                    <h5 class="modal-title" id="">Edit Staff</h5>
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
                                                                <label for=""> Full Name</label>
                                                                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Full Name">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Username</label>
                                                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                                            </div>
                                                        </div>

                                                        

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Role</label>
                                                                <select class="form-select" name="role">
                                                                    
                                                                </select>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Image</label>
                                                                <input type="file" class="image-preview-filepond" name="image">
                                                            </div>
                                                        </div>

                                                    


                                                        


                                                


                                                       

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <input type="hidden" name="action" value="edit">
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="hidden" name="old_image" id="image">
                                                    <button type="submit" class="btn btn-primary ml-1">Submit
                                                    </button>
                                                </div>
                                                </form>
 


                                            </div>
                                        </div>
  </div>

  <div class="modal fade text-left" id="viewmodal" tabindex="-1" role="dialog"
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
                                                <div class="modal-body">
                                                    <div class="row">

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <p class="mb-1" for=""> Picture</p>
                                                                <img class="form-control" id="v_image"/>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-10">
                                                            <div class="row">
                                                            <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for=""> Full Name</label>
                                                                <p class="form-control" id="v_full_name"></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for=""> Username</label>
                                                                <p class="form-control" id="v_username"></p>
                                                            </div>
                                                        </div>

                                                          


                                                            </div>
                                                       
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for=""> Role</label>
                                                                <p class="form-control" id="v_role"></p>
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
  </div>


  <div class="modal fade text-left" id="add_result" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add Score / Result</h5>
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
                                                                <label for=""> Session</label>
                                                                <input type="text" name="session" id="" class="form-control" placeholder="Session">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Term</label>
                                                                <input type="text" name="term" id="" class="form-control" placeholder="">
                                                            </div>
                                                        </div>

                                                       

                                                        

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Performance.</label>
                                                                <input type="text" name="performance" id="" class="form-control" placeholder="Performance">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Score.</label>
                                                                <input type="number" name="score" id="" class="form-control" placeholder="Scores">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <input type="hidden" name="action" value="add_result">
                                                    <input type="hidden" name="Staff_id" id="result_id">
                                                    <input type="hidden" name="class" id="result_class">
                                                    <button type="submit" class="btn btn-primary ml-1">Submit
                                                    </button>
                                                </div>
                                                </form>
 


                                            </div>
                                        </div>
  </div>