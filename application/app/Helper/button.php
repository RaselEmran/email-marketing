<?php ;
//global edit button
function btn_edit($uri)
{
    return '<a href="' . url($uri) . '" class="btn btn-primary btn-xs" title="Edit" data-toggle="tooltip" data-placement="top" data-original-title="' . trans('common.edit') . '"><i class="fa fa-pencil-square-o"></i></a>';
}

//global delete button
function btn_delete_submit()
{
    return "<button class='btn btn-danger btn-xs delete-swl' data-toggle='tooltip' data-placement='top' title='" . trans('common.delete') . "'><i class='fa fa-trash-o'></i></button>";
}

// delete button
function btn_delete_submit_group()
{
    return "<button class='btn btn-danger btn-xs delete-swl-group' data-toggle='tooltip' data-placement='top' title='" . trans('common.delete') . "'><i class='fa fa-trash-o'></i></button>";
}

//global show button
function btn_show($uri)
{
    return '<a href="' . url($uri) . '" class="btn btn-xs btn-info" title="Show Detail" data-toggle="tooltip" data-placement="top" data-original-title="' . trans('common.show_details') . '"><i class="fa fa-list-alt"></i></a>';
}

//banned user button
function btn_banned($uri)
{
    return '<a href="' . url($uri) . '" class="btn btn-danger btn-xs" title="Change Status" data-toggle="tooltip" data-placement="top" data-original-title="Change"><i class="fa fa-close"></i></a>';
}

//active user button
function btn_active($uri)
{
    return '<a href="' . url($uri) . '" class="btn btn-success btn-xs" title="Change Status" data-toggle="tooltip" data-placement="top" data-original-title="Change"><i class="fa fa-check"></i></a>';
}
