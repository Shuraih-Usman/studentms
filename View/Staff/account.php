<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div id="process" data-name="account"></div>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Account</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">

                        <div class="d-flex justify-content-between">

                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal"> 
                                        <i class="fa fa-hospital-user"></i> Edit Account
                                    </button>
                                    <div class="btn-group">

                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addmodal"> 
                                        <i class="fa fa-security"></i> Change Password
                                    </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?=PUBLIC_URL.'/thumb/'.$admin['image']?>" width="150" class="thumbnail" alt="">
                                </div>

                                <div class="col-md-9">
                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="">Full Name</label>
                                    <div class="form-control"><?=$admin['full_name']?></div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="">Username</label>
                                    <div class="form-control"><?=$admin['username']?></div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="">Subject</label>
                                    <div class="form-control"><?=$admin['subject']?></div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="">Registered On</label>
                                    <div class="form-control"><?= date('d M Y', strtotime($admin['created_at']))?></div>
                                    </div>

                                </div>
                                    </div>
                                </div>


                            </div>
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
                                                    <h5 class="modal-title" id="myModalLabel1">Add Appointment</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>

                                                <form class="modalform"  enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for=""> Old Password</label>
                                                                <input type="password" name="oldpassword" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                               <label for=""> New Password</label>
                                                               <input type="password" name="newpassword" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label for=""> Confirm new Password</label>
                                                            <input type="password" name="confirmpassword" class="form-control">
                                                            </div>
                                                        </div>


                                                      



                                                       
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <input type="hidden" name="action" value="password">
                                                    <button type="submit" class="btn btn-primary ml-1">Change
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
                                                                <label for=""> Full Name </label>
                                                                <input type="text" name="full_name" class="form-control" placeholder="First Name" value="<?=$admin['full_name']?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Username </label>
                                                                <input type="text" name="username" class="form-control" placeholder="Username" value="<?=$admin['username']?>">
                                                            </div>
                                                        </div>

                                                       

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for=""> Image</label>
                                                                <input type="file" name="image" id="">

                                                                <input type="hidden" name="old_image" value="<?=$admin['image']?>">
                                                            </div>
                                                        </div>                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>

                                                    <input type="hidden" name="action" value="edit">

                                                    <button type="submit" class="btn btn-primary ml-1">Submit
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
  </div>
