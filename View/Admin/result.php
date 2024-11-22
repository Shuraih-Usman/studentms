<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div id="process" data-name="result"></div>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Result</h3>
                            <p class="text-subtitle text-muted">Manage all Result</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Result</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">

                        <div class="d-flex justify-content-between">
                            <h5 class="mb-1 showingBy">All Result</h5>

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
                                        <th>Reg No.</th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Session / Term</th>
                                        <th>Score</th>
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




            <div class="modal fade text-left" id="editmodal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Score / Result</h5>
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
                                                                <input type="text" name="session" id="session" class="form-control" placeholder="Session">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Term</label>
                                                                <input type="text" name="term" id="term" class="form-control" placeholder="">
                                                            </div>
                                                        </div>

                                                       

                                                        

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Performance.</label>
                                                                <input type="text" name="performance" id="performance" class="form-control" placeholder="Performance">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Score.</label>
                                                                <input type="number" name="score" id="score" class="form-control" placeholder="Scores">
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
                                                    <input type="hidden" name="student_id" id="student_id">
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="hidden" name="class" id="class">
                                                    <button type="submit" class="btn btn-primary ml-1">Submit
                                                    </button>
                                                </div>
                                                </form>
 


                                            </div>
                                        </div>
  </div>