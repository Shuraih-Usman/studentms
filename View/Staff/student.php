<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div id="process" data-name="student"></div>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Students</h3>
                            <p class="text-subtitle text-muted">Manage all Students</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Students</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">

                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 showingBy">All Students</h5>

                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                   
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
                                        <th>Reg No.</th>
                                        <th>Name</th>
                                        <th>Class</th>
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
                                                    <h5 class="modal-title" id="myModalLabel1">Add Student</h5>
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

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Phone No.</label>
                                                                <input type="number" name="phone" id="" class="form-control" placeholder="Phone No.">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Date Of Birth.</label>
                                                                <input type="date" name="dob" id="" class="form-control" placeholder="Phone No.">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Class</label>
                                                                <select class="choices form-select" name="class">
                                                                    <option value="JSS 1">JSS 1</option>
                                                                    <option value="JSS 2">JSS 2</option>
                                                                    <option value="JSS 3">JSS 3</option>
                                                                    <option value="SSS 1">SSS 1</option>
                                                                    <option value="SSS 2">SSS 2</option>
                                                                    <option value="SSS 3">SSS 3</option>
                                                                </select>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Gender</label>
                                                                <select class="choices form-select" name="gender">
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                        <h2 class="my-2">Address Details</h2>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Image</label>
                                                                <input type="file" class="image-preview-filepond" name="image">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Address</label>
                                                                <textarea name="address" id="" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Country</label>
                                                                <input type="text" name="country" id="" class="form-control" placeholder="Country">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> State</label>
                                                                <input type="text" name="state" id="" class="form-control" placeholder="State">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> LGA</label>
                                                                <input type="text" name="lga" id="" class="form-control" placeholder="LGA">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                        <h2 class="my-2">Health Info</h2>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Blood Group</label>
                                                                <input type="text" name="blood" id="" class="form-control" placeholder="Blood Group">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Genotype</label>
                                                                <input type="text" name="genotype" id="" class="form-control" placeholder="Genotype">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Disability</label>
                                                                <input type="text" name="disability" id="" class="form-control" placeholder="Disability">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                        <h2 class="my-2">Others Info</h2>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Religion</label>
                                                                <input type="text" name="religion" id="" class="form-control" placeholder="Religion">
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Tribe</label>
                                                                <input type="text" name="tribe" id="" class="form-control" placeholder="Tribe">
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
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Date Of Birth.</label>
                                                                <input type="date" name="dob" id="dob" class="form-control" placeholder="Phone No.">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Class</label>
                                                                <select class="form-select" name="class" id="class">
                                                                    
                                                                </select>
                                                                
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Gender</label>
                                                                <select class="form-select" name="gender" id="gender">
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                        <h2 class="my-2">Address Details</h2>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Image</label>
                                                                <input type="file" class="image-preview-filepond" name="image">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Address</label>
                                                                <textarea name="address" id="address" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Country</label>
                                                                <input type="text" name="country" id="country" class="form-control" placeholder="Country">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> State</label>
                                                                <input type="text" name="state" id="state" class="form-control" placeholder="State">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> LGA</label>
                                                                <input type="text" name="lga" id="lga" class="form-control" placeholder="LGA">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                        <h2 class="my-2">Health Info</h2>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Blood Group</label>
                                                                <input type="text" name="blood" id="blood" class="form-control" placeholder="Blood Group">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Genotype</label>
                                                                <input type="text" name="genotype" id="genotype" class="form-control" placeholder="Genotype">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Disability</label>
                                                                <input type="text" name="disability" id="disability" class="form-control" placeholder="Disability">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                        <h2 class="my-2">Others Info</h2>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Religion</label>
                                                                <input type="text" name="religion" id="religion" class="form-control" placeholder="Religion">
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Tribe</label>
                                                                <input type="text" name="tribe" id="tribe" class="form-control" placeholder="Tribe">
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
                                                            <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> First Name</label>
                                                                <p class="form-control" id="v_first_name"></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Last Name</label>
                                                                <p class="form-control" id="v_last_name"></p>
                                                            </div>
                                                        </div>

                                                            <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Email</label>
                                                                <p class="form-control" id="v_email"></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Phone Number</label>
                                                                <p class="form-control" id="v_phone"></p>
                                                            </div>
                                                        </div>


                                                            </div>
                                                       
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for=""> Gender</label>
                                                                <p class="form-control" id="v_gender"></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for=""> Date of Birth</label>
                                                                <p class="form-control" id="v_dob"></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">Class</label>
                                                                <p class="form-control" id="v_class"></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for=""> Reg No.</label>
                                                                <p class="form-control" id="v_reg_number"></p>
                                                            </div>
                                                        </div>

                                                        <h2> Address Details</h2>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Country</label>
                                                                <p class="form-control" id="v_country"></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> State</label>
                                                                <p class="form-control" id="v_state"></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> LGA</label>
                                                                <p class="form-control" id="v_lga"></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for=""> Address</label>
                                                                <p class="form-control" id="v_address"></p>
                                                            </div>
                                                        </div>

                                                        <h2>Healt Details</h2>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Blood Group</label>
                                                                <p class="form-control" id="v_blood"></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Genotype</label>
                                                                <p class="form-control" id="v_genotype"></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for=""> Disability</label>
                                                                <p class="form-control" id="v_disability"></p>
                                                            </div>
                                                        </div>

                                                        <h2>Other Details</h2>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Religion</label>
                                                                <p class="form-control" id="v_religion"></p>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Tribe</label>
                                                                <p class="form-control" id="v_tribe"></p>
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
                                                    <input type="hidden" name="student_id" id="result_id">
                                                    <input type="hidden" name="class" id="result_class">
                                                    <button type="submit" class="btn btn-primary ml-1">Submit
                                                    </button>
                                                </div>
                                                </form>
 


                                            </div>
                                        </div>
  </div>