$(function(){
    $('.delete-swl').click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        var that = this;

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false

        }, function(result){
            if(result){
                if(typeof href !== 'undefined'){
                    window.location.href = href;
                } else {
                    $(that).closest("form").submit();
                }
            }
        });
    });
});

$(function(){
    $('.delete-swl-group').click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        var that = this;

        swal({
            title: "Are you sure?",
            text: "Email addresses will be deleted associated with this group",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false

        }, function(result){
            if(result){
                if(typeof href !== 'undefined'){
                    window.location.href = href;
                } else {
                    $(that).closest("form").submit();
                }
            }
        });
    });
});