<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div id="process" data-name="medical"></div>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Medical Records</h3>
                            <p class="text-subtitle text-muted">Manage all Records</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Medical  Records</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">

                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 showingBy">All Medical  Records</h5>

                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal"> 
                                        <i class="fa fa-hospital-user"></i> Add Records
                                    </button>
                                </div>
                            </div>
                        </div>
                            
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="dataTable" data-filter="All">
                                <thead>
                                    <tr>
                                        <th>PID</th>
                                        <th>Image</th>
                                        <th>Patient</th>
                                        <th>Doctor</th>
                                        <th>View</th>
                                        <th>Action</th>
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
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for=""> Notes</label>
                                                                <p id="note_id"></p>
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
        <!--Basic Modal -->
        <div class="modal fade text-left" id="addmodal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">Add Records</h5>
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
                                                                <label for=""> Select Appointments</label>
                                                                <select class="choices form-select" name="appointment_id">
                                                                <?php foreach($appointements as $row): ?>
                                                                    <option value="<?=$row['id']?>"><?=$ALL->getRowData('patients', 'first_name', 'id', $row['patient_id']).' '.$ALL->getRowData('patients', 'last_name', 'id', $row['patient_id']).' PID: '.$ALL->getRowData('patients', 'pid', 'id', $row['patient_id']).' 
                                                                    Doctor - '.$ALL->getRowData('doctors', 'first_name', 'id', $row['doctor_id']).' '.$ALL->getRowData('doctors', 'last_name', 'id', $row['doctor_id'])?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            </div>
                                                        </div>

                                                    



                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for=""> Description</label>
                                                                <textarea name="description" id="" class="form-control"></textarea>
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
                                                      

                                                    <div class="col-12">
                                                            <div class="form-group">
                                                                <label for=""> Description</label>
                                                                <textarea name="description" id="desc" class="form-control"></textarea>
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
                                                    <button type="submit" class="btn btn-primary ml-1">Submit
                                                    </button>
                                                </div>
                                                </form>
 


                                            </div>
                                        </div>
  </div>