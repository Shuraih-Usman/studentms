<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply | <?=APP_NAME?></title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=ASSETS?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?=ASSETS?>/vendors/bootstrap-icons/bootstrap-icons.css">
    <link href="<?=ASSETS?>/vendors/fileuploader/filepond.css" rel="stylesheet">
    <link href="<?=ASSETS?>/vendors/fileuploader/filepond-plugin-image-preview.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=ASSETS?>/css/app.css">
    <link rel="stylesheet" href="<?=ASSETS?>/css/pages/auth.css">
    <link rel="stylesheet" href="<?=ASSETS?>/vendors/fontawesome/all.min.css">

    <link rel="stylesheet" href="<?=ASSETS?>/vendors/sweetalert2/sweetalert2.min.css">
</head>

<body>
<div class="overlay d-none">
        <span class="loader21"></span>
    </div>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-7 col-12">
                <div id="auth-left">
                    <h1 class="auth-title"><img src="<?=PUBLIC_URL?>/logo.jpg" width="100" alt="Logo"> DSSI</h1>
                    <h3 class="mt-2">Sign Up</h3>
                    <p class="auth-subtitle mb-5">Input your data to apply.</p>

                    <form class="form" method="POST" enctype="multipart/form-data">
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


                                                        <div class="col-12">
                                                        <h2 class="my-2">Authentication</h2>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Password</label>
                                                                <input type="password" name="password" id="" class="form-control">
                                                            </div>
                                                        </div>

                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=""> Confirm password</label>
                                                                <input type="password" name="cpassword" id="" class="form-control">
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="action" value="apply">
                                                    </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Apply</button>
                    </form>
                  
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>
    <script src="<?=ASSETS?>/vendors/jquery/jquery.min.js"></script>
    <script src="<?=ASSETS?>/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?=ASSETS?>/js/filepond.js"></script>
    <script src="<?=ASSETS?>/js/filepond-plugin-image-preview.js"></script>

    <Script>


$(document).ready( function(){

    const overlay = $(".overlay");


const processURL = `/apply-process`;

$(document).on('submit', '.form', function(e) {
    e.preventDefault();

    overlay.removeClass('d-none');
    var form = this;
    var formData = new FormData(form);

    var pond = FilePond.find(document.querySelector('.image-preview-filepond'));
    var files = pond.getFiles();

    if (files.length > 0) {
        formData.append('image', files[0].file);
    }

    $.ajax({
        url: processURL,
        type: "POST",
        data: formData,
        dataType: 'json',
        processData: false,
        contentType: false,

        success: (data) => {
            overlay.addClass('d-none');
            console.log(data);
            if(data.s == 1) {
                Swal.fire('Success', data.m, 'success').then(() => {
                    window.location.href = '/login';
                });
            } else {
                Swal.fire('Warning', data.m, 'warning');
                console.log(data.m);
            }
        },

        error: (error, xhr) => {
            overlay.addClass('d-none');
            Swal.fire('Error', 'Internal Error' + error, 'error');
            console.error(error);
            console.log(error);
            console.log(xhr.responseText);
        }

    });
})

});



FilePond.registerPlugin(
    // validates the size of the file..
    FilePondPluginImagePreview,

);


FilePond.create( document.querySelector('.image-preview-filepond'), { 
    allowImagePreview: true, 
    allowImageFilter: false,
    allowImageExifOrientation: false,
    allowImageCrop: false,
    name: 'image',
    acceptedFileTypes: ['image/png','image/jpg','image/jpeg', 'image/gif', 'image/webp'],
    fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
        // Do custom type detection here and return with promise
        resolve(type);
    })
});
    </Script>
</html>