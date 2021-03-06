$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function sortusers() {
    var userArr = [];
    $('.wm_sortable .wm_sortable_item').each(function(){
        userArr.push($(this).attr('data-usr_order'));
    });

    $.ajax({
        type: 'POST',
        url:  WPajaxURL+'.userorder',
        data: {userArr:userArr},
        success:     function(data, textStatus, XMLHttpRequest) {

        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}


//===VIEW logs===
$(document).on('click', '.tt_keys_log', function(){
    var taskname  = $('#tt_user_adtask_name').val();
    $('#tt_keys_res').html(Loading);

    $.ajax({
        type: 'POST',
        url:  WPajaxURL+'.viewlog',
        data: {},
        success:     function(data, textStatus, XMLHttpRequest) {
            $('#tt_keys_res').html(data);
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});


//===LIST USERS ajax button===
$(document).on('click', '.tt_keys_admusers', function () {
    $('#tt_keys_res').html(Loading);
    $.ajax({
        type: 'POST',
        url: WPajaxURL + '.admusers',
        data: {},
        success: function (data, textStatus, XMLHttpRequest) {
            $('#tt_keys_res').html(data);
            $('[data-toggle="tooltip"]').tooltip();
            dragit('.wm_sortable', 'sortusers');
        },
        error: function (MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});

//===ADD USERS $$ check-exists button===
$(document).on('click', '#tt_admin_aduser_go', function () {
    $('#tt_keys_res').html(Loading);
    var tt_admin_aduser_fname    = $('#tt_admin_aduser_fname').val();
    var tt_admin_aduser_lname    = $('#tt_admin_aduser_lname').val();
    var tt_admin_aduser_email    = $('#tt_admin_aduser_email').val();
    var tt_admin_aduser_position = $('#tt_admin_aduser_position').val();
    $.ajax({
        type: 'POST',
        url: WPajaxURL + '.admuseradd',
        data: { tt_admin_aduser_fname:    tt_admin_aduser_fname,
                tt_admin_aduser_lname:    tt_admin_aduser_lname,
                tt_admin_aduser_email:    tt_admin_aduser_email,
                tt_admin_aduser_position: tt_admin_aduser_position,
            },
        success: function (data, textStatus, XMLHttpRequest) {
            $('#tt_keys_res').html(data);
            $('[data-toggle="tooltip"]').tooltip();
            $('#tt_user_action_aduser_box').modal('hide');
        },
        error: function (MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});

//===DELETE USER $$ reload users-table===
$(document).on('click', '.ttadm_delusr', function () {
    if(window.confirm('Delete user?')){
        var iserID = $(this).attr('data-userid');
        $('#tt_keys_res').html(Loading);

        $.ajax({
            type: 'POST',
            url: WPajaxURL + '.admuserdel',
            data: { iserID:iserID,
            },
            success: function (data, textStatus, XMLHttpRequest) {
                $('#tt_keys_res').html(data);
                $('[data-toggle="tooltip"]').tooltip();
            },
            error: function (MLHttpRequest, textStatus, errorThrown) {
                alert(errorThrown);
            }
        });
    }
});


//===EDIT USER $$ reload users-table===
$(document).on('click', '.ttadm_editusr', function () {
    var iserID = $(this).attr('data-userid');
    $('#tt_user_action_edituser_box').modal();
    $('#tt_admin_adituser_mbox').html(Loading);

    $.ajax({
        type: 'POST',
        url: WPajaxURL + '.admusergedit',
        data: { iserID:iserID },
        success: function (data, textStatus, XMLHttpRequest) {
            $('#tt_admin_adituser_mbox').html(data);
        },
        error: function (MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});


//===SAVE EDIT USER FORM===
$(document).on('click', '#tt_admin_adituser_go', function(){
    var user_id     = $('#tt_admin_adituser_id').val();
    var user_fname  = $('#tt_admin_adituser_fname').val();
    var user_lname  = $('#tt_admin_adituser_lname').val();
    var user_email  = $('#tt_admin_adituser_email').val();
    var user_posid  = $('#tt_admin_adituser_position').val();
    $('#tt_admin_adituser_mbox').html(Loading);

    $.ajax({
        type: 'POST',
        url:  WPajaxURL+'.admusersedit',
        data: {
            user_id:    user_id,
            user_fname: user_fname,
            user_lname: user_lname,
            user_email: user_email,
            user_posid: user_posid,
        },
        success:     function(data, textStatus, XMLHttpRequest) {
            $('#tt_user_action_edituser_box').modal('hide');
            $('#tt_keys_res').html(data);
            dragit('.wm_sortable', 'sortusers');
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});


//===add task button===
$(document).on('click', '#tt_user_adtask_add', function(){
    var taskname  = $('#tt_user_adtask_name').val();
    $('#tt_user_action_adtask_box_content').html(Loading);

    $.ajax({
        type: 'POST',
        url:  WPajaxURL+'.form1',
        data: {taskname: taskname},
        success:     function(data, textStatus, XMLHttpRequest) {
            const obj = JSON.parse(data);
            if(obj.err == 0){
                top.location.reload();
                //window.location = window.location.href++'?eraseCache=true'
            }else{
                $('#tt_user_action_adtask_box_content').html(obj.txt);
            }
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});


$(document).on('click', '#tt_user_action_plantime_close', function(){
    var usrID = $('#tt_user_cell_taskhours_usrid').val();
    var cDate = $('#tt_user_cell_taskhours_cdate').val();
    var tasksArr = [];
    var hoursArr = [];
    $('#tt_user_cell_taskhours .tt_user_cell_taskhours_list').each(function(){
        tasksArr.push($(this).attr('data-taskid'));
        hoursArr.push($(this).val());
    });
    $('#tt_keys_res').html(Loading);

    $.ajax({
        type: 'POST',
        url:  WPajaxURL+'.savecellday',
        data: {
            usrID:    usrID,
            cDate:    cDate,
            tasksArr: tasksArr,
            hoursArr: hoursArr,
        },
        success:     function(data, textStatus, XMLHttpRequest) {
            $('#tt_user_action_cell_modal').modal('hide');
            $('#tt_keys_res').html(data);
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});

$(document).on('click', '.tt_cell_action_del', function(){
    var userid  = $(this).attr('data-cell-user');
    var dc_date = $(this).attr('data-cell-date');
    var taskid  = $(this).attr('data-cell-taskid');
    $('#tt_user_action_cell_modal_box').html(Loading);

    $.ajax({
        type: 'POST',
        url:  WPajaxURL+'.deltask',
        data: {
                userid:  userid,
                dc_date: dc_date,
                taskid:  taskid,
              },
        success:     function(data, textStatus, XMLHttpRequest) {
            $('#tt_user_action_cell_modal_box').html(data);
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});

$(document).on('click', '.tt_cell', function(){
    var userid = $(this).attr('data-cell-user');
    var dc_date = $(this).attr('data-cell-date');
    $('#tt_user_action_cell_modal_box').html(Loading);
    $('#tt_user_action_cell_modal').modal();

    $.ajax({
        type: 'POST',
        url:  WPajaxURL+'.cellinfo',
        data: {
                userid:  userid,
                dc_date: dc_date,
              },
        success:     function(data, textStatus, XMLHttpRequest) {
            $('#tt_user_action_cell_modal_box').html(data);
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});

$(document).on('click', '.tt_keys_go', function(){
    $('#tt_keys_res').html(Loading);
    var fromto = $('.tt_keys_input_daterange').val();

    $.ajax({
        type: 'POST',
        url:  WPajaxURL+'.table',
        data: {fromto:fromto},
        success:     function(data, textStatus, XMLHttpRequest) {
            $('#tt_keys_res').html(data);
            $('#tt_keys_res').tooltip({selector: '[data-toggle="tooltip"]'});
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});


//===START PLANNED TIME FOR USER===
$(document).on('click', '#tt_user_action_plantime_start', function(){
    $('#tt_user_action_modal').modal('hide');
    $('#tt_keys_res').html(Loading);

    var fromto  = $('#tt_user_action_fromto').val();
    var userid  = $('#tt_user_action_userid').val();
    var taskid  = $('#tt_user_action_taskid').val();
    var dayplan = $('#tt_user_action_plantime').val();

    $.ajax({
        type: 'POST',
        url:  WPajaxURL+'.setplan',
        data: {
                stfromto: fromto,
                userid:   userid,
                dayplan:  dayplan,
                taskid:   taskid,
              },
        success:     function(data, textStatus, XMLHttpRequest) {
            $('#tt_keys_res').html(data);
            $('#tt_keys_res').tooltip({selector: '[data-toggle="tooltip"]'});
        },
        error: function(MLHttpRequest, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
});
