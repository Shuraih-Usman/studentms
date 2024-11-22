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
                                   
                                    <div class="btn-group">

                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addmodal"> 
                                        <i class="fa fa-pen"></i> Change Password
                                    </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        </div>
                        <div class="card-body">
                        <div class="row">

                            <div class="col-md-2">
                                <div class="form-group">
                                    <p class="mb-1" for=""> Picture</p>
                                    <img class="form-control" src="<?=PUBLIC_URL.'/thumb/'.$row['image'];?>"/>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> First Name</label>
                                    <p class="form-control" id="v_first_name"> <?=$row['first_name'];?></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Last Name</label>
                                    <p class="form-control" id="v_last_name"><?=$row['last_name'];?></p>
                                </div>
                            </div>

                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Email</label>
                                    <p class="form-control" id="v_email"><?=$row['email'];?></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Phone Number</label>
                                    <p class="form-control" id="v_phone"><?=$row['phone'];?></p>
                                </div>
                            </div>


                                </div>

                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""> Gender</label>
                                    <p class="form-control" id="v_gender"><?=$row['gender'];?></p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""> Date of Birth</label>
                                    <p class="form-control" id="v_dob"><?=$row['dob'];?></p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Class</label>
                                    <p class="form-control" id="v_class"><?=$row['class'];?></p>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""> Reg No.</label>
                                    <p class="form-control" id="v_reg_number"><?=$row['reg_number'];?></p>
                                </div>
                            </div>

                            <h2> Address Details</h2>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> Country</label>
                                    <p class="form-control" id="v_country"><?=$row['country'];?></p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> State</label>
                                    <p class="form-control" id="v_state"><?=$row['state'];?></p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> LGA</label>
                                    <p class="form-control" id="v_lga"><?=$row['lga'];?></p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""> Address</label>
                                    <p class="form-control" id="v_address"><?=$row['address'];?></p>
                                </div>
                            </div>

                            <h2>Healt Details</h2>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> Blood Group</label>
                                    <p class="form-control" id="v_blood"><?=$row['blood'];?></p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> Genotype</label>
                                    <p class="form-control" id="v_genotype"><?=$row['genotype'];?></p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""> Disability</label>
                                    <p class="form-control" id="v_disability"><?=$row['disability'];?></p>
                                </div>
                            </div>

                            <h2>Other Details</h2>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Religion</label>
                                    <p class="form-control" id="v_religion"><?=$row['religion'];?></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""> Tribe</label>
                                    <p class="form-control" id="v_tribe"><?=$row['tribe'];?></p>
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
                                                    <h5 class="modal-title" id="myModalLabel1">Change Password</h5>
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

 
