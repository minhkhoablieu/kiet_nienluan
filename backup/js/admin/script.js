;
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.select2').select2();
    var options = {
        filebrowserImageBrowseUrl: '/filemanager?type=Images',
        filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/filemanager?type=Files',
        filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
    };
    CKEDITOR.replace( 'content', options );
    CKEDITOR.replace( 'specifications', options );
    $("#table").DataTable({
        //"responsive": true,
        // "autoWidth": true,
    })
    const route_prefix = "/admin/laravel-file-manager";
    $('#lfm').filemanager('image', {prefix: route_prefix});


    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        const id = $(this).attr("data-id");
        Swal.fire({
            title: 'Bạn có chắc chắn',
            text: "Bạn không thể khôi phục hành động này",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Chấp nhận'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    method: "POST",
                    url: url,
                    data: {'_method':'DELETE'},
                }).done(function(){
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    location.reload(true);
                })

            }
        })
    });
} );
