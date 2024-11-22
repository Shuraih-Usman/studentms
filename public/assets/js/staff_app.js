
$(document).ready(function() {

    
    const overlay = $(".overlay");

    const process = $("#process").attr('data-name');
    const processURL = `/Staff/process/${process}`;

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
                console.log(data);
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

        
        switch (process) {
            case 'student':
            case 'teacher':
                $.each(edit.data(), function(key, value) {
                    var inputField = $('#' + key);
        
                    if (inputField.length) {
                        if (inputField.is('select')) {
                            // Clear existing options before populating new ones
                            inputField.empty();
        
                            if (key === 'gender') {
                                // Custom options for the 'gender' select field
                                var genderOptions = ['Male', 'Female'];
                                $.each(genderOptions, function(index, option) {
                                    var selected = (option === value) ? 'selected' : '';
                                    inputField.html('<option value="' + option + '" ' + selected + '>' + option + '</option>');
                                });
                            } else if (key === 'class') {
                                // Custom options for the 'class' select field
                                var classOptions = ['JSS 1', 'JSS 2', 'JSS 3', 'SSS 1', 'SSS 2', 'SSS 3'];
                                $.each(classOptions, function(index, option) {
                                    var selected = (option === value) ? 'selected' : '';
                                    inputField.html('<option value="' + option + '" ' + selected + '>' + option + '</option>');
                                });
                            }
                        } else {
                            // For non-select fields, set the value directly
                            inputField.val(value);
                        }
                    }
                });
                break;
            case 'result':
                $.each(edit.data(), function(key, value) {

                    var inputField = $("#" + key);

                    inputField.empty();

                    if(inputField.length) {
                        inputField.val(value);
                    }
                });
                break;
            case 'staff':
                $.each(edit.data(), function(key, value) {

                    var inputField = $("#" + key);

                    inputField.empty();
                    if(inputField.length) {

                        if(inputField.is('select')) {

                            var genderOptions = ['Principal', 'Exam Officer', 'Senior Master'];
                                $.each(genderOptions, function(index, option) {
                                    var selected = (option === value) ? 'selected' : '';
                                    inputField.html('<option value="' + option + '" ' + selected + '>' + option + '</option>');
                                });
                        } else {
                            inputField.val(value);
                        }
                    }
                });
                break;
            default:
                null;
                break;
        }
        
        $('#editmodal').modal('show');

    });

    $(document).on('click', '.view', function() {

        const view = $(this);

        $.each(view.data(), function(key, value) {
            var inputField = $("#v_" + key);
            inputField.empty();

            if (inputField.length) {
                // Check if the inputField is intended to display an image
                if (inputField.is('img')) {
                    var imgElement = $('<img>');
                    imgElement.attr({
                        src: `/public/thumb/${value}`,
                        width: 100,
                        height: 100,
                    });
                    inputField.replaceWith(imgElement); // Replace inputField with imgElement
                } else {
                    inputField.text(value); // Display value in the inputField
                }
            }
        });
        


        $("#viewmodal").modal('show');
    });

    $(document).on('click', '.add', function() {

        const add = $(this);
        $("#result_id").val(add.data('id'));
        $("#result_class").val(add.data('class'));

        $('#add_result').modal('show');
    })

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
                    const processURL = `/Staff/process/${process}`;
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