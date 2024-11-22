
$(document).ready(function() {

    
    const overlay = $(".overlay");

    const process = $("#process").attr('data-name');
    const processURL = `/Doctor/process/${process}`;

    $(document).on('submit', '.modalform', function(e) {
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
                dataTable.draw(false);
                if(data.s == 1) {
                    Swal.fire('Success', data.m, 'success');
                } else {
                    Swal.fire('Warning', data.m, 'warning');
                    console.log(data.m);
                }
            },

            error: (error, xhr) => {
                overlay.addClass('d-none');
                Swal.fire('Error', 'Internal Error', 'error');
                console.error(error);
                console.log(xhr.responseText);
            }

        });
    })


    $(document).on('click', '.edit', function(e) {
        e.preventDefault();

        const edit = $(this);

        
        
        $('#img_preview').empty();
        $('#e_gender').empty();
        $('#e_dob').empty();
        $('#radio_male').empty();
        $('#radio_female').empty();
        var first_name = edit.data('first_name');
        var last_name = edit.data('last_name');
        var username = edit.data('username');
        var email = edit.data('email');
        var phone = edit.data('phone');
        var specialization = edit.data('specialization');
        var dob = edit.data('dob');
        var address = edit.data('address');
        var description = edit.data('desc');
        var id = edit.data('id');
        var image = edit.data('image');

        var gender = edit.data('gender');

        dobInput = $('<input>', {
            type: 'date',
            class: 'form-control',
            name: 'dob',
        });

        dobInput.val(dob);

        $('#e_dob').append(dobInput);

        $('#edit-title').text('Edit Doctor');
        $('#first_name').val(first_name);
        $('#last_name').val(last_name);
        $('#username').val(username);
        $('#email').val(email);
        $('#phone').val(phone);
        $('#specialization').val(specialization);
        $('#address').val(address);
        $('#desc').val(description);
        $('#row_id').val(id);
        $('#old_image').val(image);

        var imgElement =  $('<img>');
        imgElement.attr({
            src: `/public/thumb/${image}`,
            width: 100,
            height: 100,
        });

        var radioElement_male = $('<input>', {
            type: 'radio',
            name: 'gender',
            id: 'male-2'
        });

        var radioElement_female = $('<input>', {
            type: 'radio',
            name: 'gender',
            id: 'female-2'
        });

        var GenderSelect = $('<select>', {
            name: "gender",
            class: "form-select"
        })
        .append('<option value="Male">Male</option>')
        .append('<option value="Female">Female</option>');

        if(gender == "Male") {
            GenderSelect.val("Male");
        } else {
            GenderSelect.val('Female');
        }

        $('#img_preview').append(imgElement);
        $('#e_gender').append(GenderSelect);

        $('#radio_male').append(radioElement_male);
        $('#radio_female').append(radioElement_female);
        // $('#gender').val(gender);



        $('#editmodal').modal('show');

    });

    $(document).on('click', '.view', function() {

        const view = $(this);
        $("#v_image").empty();
        var first_name = view.data('first_name');
        var last_name = view.data('last_name');
        var pid = view.data('pid');
        var email = view.data('email');
        var phone = view.data('phone');
        var dob = view.data('dob');
        var address = view.data('address');
        var image = view.data('image');
        var gender = view.data('gender');

        $("#v_first_name").text(first_name);
        $("#v_last_name").text(last_name);
        $("#v_pid").text(pid);
        $("#v_email").text(email);
        $("#v_phone").text(phone);
        $("#v_dob").text(dob);
        $("#v_address").text(address);
        $("#v_gender").text(gender);
        $("#note_id").text(view.data('note'));
        console.log((view.data('note')));
        if(process === 'appoint') {

        } else {

            var imgElement =  $('<img>');
            imgElement.attr({
                src: `/public/thumb/${image}`,
                width: 100,
                height: 100,
            });
    
            
            $('#v_image').append(imgElement);
        }


        $("#viewmodal").modal('show');
    });

    const dataTable = $("#dataTable").DataTable({
        "processing": true,
        "stateSave": true,
        "serverSide": true,
        "ajax": {
            "url" : processURL,
            'type': "POST",
            "data" : function (d) {
                d.order = [{column : d.order[0].column, 
                    dir: d.order[0].dir}];
                d.action = 'list';
                d.filterData = $("#dataTable").attr('data-filter');

            },

            error: function(xhr) {
                Swal.fire('Error', 'There was an error with your request pls check and try again', 'error');
                console.log(xhr.responseText);
            }
        },
        
        "columns": null,
        "order": [[0, 'desc']],
        "initComplete": function(setting, json) {
            if(json.columns) {
                this.api().columns().header().to$().each(function(columns, idx) {
                    $(column).text(json.columns[idx]);
                });
            }
        },
        "responsive": true,
        dom: "Bflrtip",
        select: {
            style: "os",
            selector: "td:nth-child(2)"
        },

        buttons: [
            "selectAll",
            'selectNone',
            {
                text: "Delete",
                className: "btn btn-danger",
                action: () => {
                    var selectedRows = dataTable.rows({selected: true}).data().toArray();
                    var ids = selectedRows.map(row =>row[0]);
                    var count = dataTable.rows({selected: true}).count();
                    if(count > 0) {
                        Setting('deleteAll', ids);
                    } else {
                        Alert(2, 'You did not select any item');
                    }
                }
            }
        ]
        
    });

    $(document).on('click', '.showActive', (e) => {
        e.preventDefault();
        $('.showingBy').text('Active')
        $("#dataTable").attr('data-filter', 'showActive');
        dataTable.ajax.reload();
    });

    $(document).on('click', '.showDeactive', (e) => {
        e.preventDefault();
        $('.showingBy').text('Inactive')
        $("#dataTable").attr('data-filter', 'showDeactive');
        dataTable.ajax.reload();
    });

    $(document).on('click', '.showCanceled', (e) => {
        e.preventDefault();
        $('.showingBy').text('Canceled')
        $("#dataTable").attr('data-filter', 'showCanceled');
        dataTable.ajax.reload();
    });

    $(document).on('click', '.showAll', (e) => {
        e.preventDefault();
        $("#dataTable").attr('data-filter', 'All');
        dataTable.ajax.reload();
    });

    $(document).on('click', '.activate', function(e) {
        e.preventDefault();

        var id = $(this).data('id');

        Setting('activate', id);
    });

    $(document).on('click', '.deactivate', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        Setting('deactivate', id);
    });

    $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        Setting('delete', id);
    });

    $(document).on('click', '.activateAll', function(e) {
        e.preventDefault();
        Setting('activateAll');
    });

    $(document).on('click', '.deactivateAll', function(e) {
        e.preventDefault();
        Setting('deactivateAll');
    });

    $(document).on('click', '.deleteAll', function(e) {
        e.preventDefault();
        Setting('deleteAll');
    });



    function Setting(type, id = '') {

        let title;
        let ids;
        if(type === 'activate') {
            title = 'Activate',
            count = 1;
            ids = id;
        } else if(type === 'deactivate') {
            title = 'Deactivate';
            count = 1;
            ids = id;
        } else if(type === 'delete') {
            title = 'Delete';
            count = 1;
            ids = id;
        } else if(type === 'activateAll') {
            title = 'Activate';
            var selectedRows = dataTable.rows({selected: true}).data().toArray();
            ids  = selectedRows.map(row => row[0]);
            count = dataTable.rows({selected: true}).count();
        }  else if(type === 'deactivateAll') {
            title = 'Deactivate ';
            var selectedRows = dataTable.rows({selected: true}).data().toArray();
            ids  = selectedRows.map(row => row[0]);
            count = dataTable.rows({selected: true}).count();
        }   else if(type === 'deleteAll') {
            title = 'Delete ';
            var selectedRows = dataTable.rows({selected: true}).data().toArray();
            ids  = selectedRows.map(row => row[0]);
            count = dataTable.rows({selected: true}).count();
        }
    
        if(count < 1) {
            Swal.fire('Error', 'You have not select any item for ' + title, 'error');
            return false;
        } else {
    
            Swal.fire({
                title: `Are you sure to ${title} total ${count} Item`,
                type: "warning",
                showCancelButton: true,
                cancelButtonClass: "btn-warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "YES",
                cancelButtonText: "NO",
                closeOnCancel: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }).then((result) => {
                if(result.value) {
                    const process = $("#process").attr('data-name');
                    const processURL = `/Doctor/process/${process}`;
                    $.ajax({
                        url: processURL,
                        type: "POST",
                        dataType: "json",
                        data: {
                            id : ids,
                            status: type,
                            action: "SettingStatus",
    
                        },
    
                        success: (data) => {
                            dataTable.draw(false);
                            if(data.s == 1) {
                                Alert(1, data.m);
                            } else {
                                Alert(2, data.m);
                            }
                        },
    
                        error: (xhr, error) => {
                            console.log(xhr.responseText);
                            Alert(0, 'Error Occur ' + error);
                        }
                    });
                }
            });
        }
    }
    

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

function Alert(type = 0, message) {
    if(type == 1) {
       return Swal.fire('Success', message, 'success');
    } else if(type == 2) {
        return Swal.fire('Warning', message, 'warning');

    } else if(type == 0) {
        return Swal.fire('Error', message, 'error');
    }
} 