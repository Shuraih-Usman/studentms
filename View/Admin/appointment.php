<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div id="process" data-name="appoint"></div>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Appointment</h3>
                            <p class="text-subtitle text-muted">Manage all Appointment</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">

                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 showingBy">All Appointment</h5>

                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal"> 
                                        <i class="fa fa-hospital-user"></i> Add Appointment
                                    </button>
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
                                               Show Scheduled </a>
                                        </li>

                                        <li>
                                            <a href="javascript:void(0)" class="dropdown-item showDeactive">
                                               Show Completed </a>
                                        </li>

                                        <li>
                                            <a href="javascript:void(0)" class="dropdown-item showCanceled">
                                               Show Cancelled </a>
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
                                        <th>PID</th>
                                        <th>Image</th>
                                        <th>Patient</th>
                                        <th>Doctor</th>
                                        <th>Status</th>
                                        <th>View</th>
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
                                                    <h5 class="modal-title" id="myModalLabel1">Add Appointment</h5>
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
                                                                <label for=""> Select Patient</label>
                                                                <select class="choices form-select" name="patient_id">
                                                                <?php foreach($patients as $row): ?>
                                                                    <option value="<?=$row['id']?>"><?=$row['first_name'].' '.$row['last_name'].' PID: '.$row['pid']?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                               <label for=""> Select Doctor</label>
                                                               <select class="choices form-select" name="doctor_id">
                                                                <?php foreach($doctors as $row): ?>
                                                                    <option value="<?=$row['id']?>"><?=$row['first_name'].' '.$row['last_name']?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Date </label>
                                                                <input type="date" class="form-control" name="date" id="">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Time</label>
                                                                <input type="time" class="form-control" name="time" id="">
                                                            </div>
                                                        </div>


                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for=""> Note</label>
                                                                <textarea name="note" id="" class="form-control"></textarea>
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
                                                    <button type="submit" class="btn btn-primary ml-1">Appoint
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