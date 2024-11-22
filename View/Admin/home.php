


<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Data Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Students</h6>
                                                <h6 class="font-extrabold mb-0"><?=$students?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Teachers</h6>
                                                <h6 class="font-extrabold mb-0"><?=$teachers?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Staffs</h6>
                                                <h6 class="font-extrabold mb-0"><?=$staffs?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="<?=ASSETS?>/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold"><?php echo $admin['full_name'] ;?></h5>
                                        <h6 class="text-muted mb-0">@<?=$admin['username']?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
              
                    </div>

                        </div>
                       
                    </div>
                    
                    <div class="row">
                        
                        

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon pink">
                                                    <i class="iconly-boldDocument"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Results</h6>
                                                <h6 class="font-extrabold mb-0"><?=$results?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>New Users</h4>
                                    </div>
                                    <div class="card-body">
                                    <div class="table-responsive">
                                            <table class="table table-hover table-lg" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Reg</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($records as $record) : ?>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="<?=APP_URL.'/public/thumb/'.$record['image']?>">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0"><?=$record['first_name'].' ' .$record['last_name'];?></p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?=$record['reg_number']?>
                                                        </td>
                                                        <td class="col-auto">
                                                            <p class=" mb-0"><?=$record['created_at']?></p>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

 

                    </div>
                    
                    
                </section>
            </div>


   