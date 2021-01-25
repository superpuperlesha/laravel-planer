@include('header')

<div class="content-header">
	<div class="container">
		<div class="row mb-2">
			<div class="col-sm-4">
				<h1 class="m-0 text-dark">
					<a href="{{ url('/') }}" class="siteLogo">
						Time&nbsp;<svg class="m_mobyle_only" width="50" height="48" viewBox="0 0 50 48" fill="000000" xmlns="http://www.w3.org/2000/svg">
							<path d="M43.092 17.612C43.205 17.604 43.319 17.604 43.435 17.604L43.432 17.596C45.0826 17.596 46.6656 18.2517 47.8327 19.4188C48.9998 20.586 49.6555 22.1689 49.6555 23.8195C49.6555 25.4701 48.9998 27.053 47.8327 28.2202C46.6656 29.3873 45.0826 30.043 43.432 30.043H43.344C41.7878 36.7962 38.4285 43.0006 33.624 47.995C37.877 42.695 41.213 37.108 42.613 29.995C41.1391 29.7978 39.7846 29.0793 38.7947 27.9696C37.8048 26.86 37.245 25.4326 37.2166 23.9459C37.1882 22.4591 37.6931 21.0114 38.6399 19.8647C39.5867 18.7181 40.9127 17.9484 42.378 17.695C40.927 10.721 37.606 5.226 33.392 0C38.1341 4.90356 41.4825 10.9832 43.092 17.612Z"></path>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M30.574 23.518C30.5736 26.5413 29.6768 29.4966 27.9968 32.0103C26.3169 34.5239 23.9294 36.4829 21.1362 37.6397C18.3429 38.7965 15.2694 39.0991 12.3042 38.5092C9.33897 37.9193 6.61527 36.4633 4.47747 34.3255C2.33966 32.1877 0.883756 29.464 0.29384 26.4988C-0.296076 23.5336 0.00648832 20.4601 1.16328 17.6668C2.32007 14.8736 4.27913 12.4861 6.79276 10.8062C9.30639 9.12626 12.2617 8.2294 15.285 8.229C17.2929 8.22874 19.2811 8.62403 21.1362 9.39228C22.9912 10.1605 24.6768 11.2867 26.0965 12.7065C27.5163 14.1262 28.6425 15.8118 29.4107 17.6668C30.179 19.5219 30.5743 21.5102 30.574 23.518ZM16.817 30.67L15.028 26.27L13.245 30.67L7.817 17.299H9.825L13.236 25.658L14.007 23.795L11.388 17.295H13.401L16.817 25.652L20.212 17.282H22.217L16.817 30.67Z"></path>
						</svg>Planner
					</a>
				</h1>
			</div>
			<div class="col-sm-8 text-right">
				<input type="text" value="{{ $Wmtable::getMyFromTo() }}"      data-toggle="tooltip"  data-placement="bottom" title="Select Date range!" data-range="true" data-multiple-dates-separator="-" class="datepicker-here tt_keys_input tt_keys_input_daterange" readonly="readonly">
				<a href="#uID" class="fa fa-calendar tt_keys tt_keys_go"      data-toggle="tooltip"  data-placement="bottom" title="Show Date range!"></a>
				<a href="#uID" class="fa fa-search-plus tt_keys tt_keys_set"  data-toggle="tooltip"  data-placement="bottom" title="Set task for user!"></a>
				<a href="#uID" class="fa fa-tasks tt_keys tt_keys_addtask"    data-toggle="tooltip"  data-placement="bottom" title="Add task!"></a>
				<a href="#uID" class="fa fa-users tt_keys tt_keys_admusers"   data-toggle="tooltip"  data-placement="bottom" title="All users!"></a>
				<a href="{{ url('\logout') }}" class="fa fa-window-close-o tt_keys text-danger" data-toggle="tooltip"  data-placement="bottom" title="Exit!"></a>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="card-body table-responsive p-0" id="tt_keys_res">
				<x-arreatable/>
			</div>
		</div>
	</div>
</section>


<!-- Modal FOR tt_user_action-->
<div class="modal fade" id="tt_user_action_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Set time plan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="w-100">Selected user</h6>
				<select id="tt_user_action_userid" name="tt_user_action_userid" class="tt_keys_input w-100">
					<?php $users = $Wmtable::getUsers() ?>
					@foreach ($users as $user)
						<option value="{{ $user->usr_id }}">{{ $user->usr_first_name }} {{ $user->usr_last_name }}</option>
					@endforeach
				</select>

				<h6 class="w-100">Selected Task</h6>
				<select id="tt_user_action_taskid" name="tt_user_action_taskid" class="tt_keys_input w-100">
					<?php $tasks = $Wmtable::getTasks() ?>
					@foreach ($tasks as $task)
						<option value="{{ $task->task_id }}">{{ $task->task_name }}</option>
					@endforeach
				</select>

				<h6 class="w-100">Selected range</h6>
				<input id="tt_user_action_fromto" name="tt_user_action_fromto" type="text" value="{{ $Wmtable->fromto }}" data-range="true" data-multiple-dates-separator="-" class="datepicker-here tt_keys_input w-100" readonly="readonly">

				<h6 class="w-100">Planned Time</h6>
				<input id="tt_user_action_plantime" name="tt_user_action_plantime" class="tt_keys_input w-100" type="number" min="0" max="24" value="{{ $Wmtable->sopt_huurs_day }}" step="1">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary"   id="tt_user_action_plantime_start">Set Planned Time</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal FOR tt_user_action-CELL-->
<div class="modal fade" id="tt_user_action_cell_modal" tabindex="-1" aria-labelledby="exampleModalLabe2" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabe2">Set time plan</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="tt_user_action_cell_modal_box" class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary"   id="tt_user_action_plantime_close" data-dismiss="modal">Finish editing</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal FOR adding task-->
<div class="modal fade" id="tt_user_action_adtask_box" tabindex="-1" aria-labelledby="exampleModalLabe3" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabe3">Adding new task</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="w-100">Task name</h6>
				<input id="tt_user_adtask_name" name="tt_user_adtask_name" type="text" value="" class="tt_keys_input w-100">
				<br/><br/>
				<div id="tt_user_action_adtask_box_content"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary"   id="tt_user_adtask_add">Add task</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal FOR adding user-->
<div class="modal fade-scale" id="tt_user_action_aduser_box" tabindex="-1" aria-labelledby="exampleModalLabe3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabe3">Adding new user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="w-100">First name</h6>
                <input id="tt_admin_aduser_fname" name="tt_admin_aduser_fname" type="text" value="" class="tt_keys_input w-100">
                <h6 class="w-100">Last name</h6>
                <input id="tt_admin_aduser_lname" name="tt_admin_aduser_lname" type="text" value="" class="tt_keys_input w-100">
                <h6 class="w-100">E-Mail</h6>
                <input id="tt_admin_aduser_email" name="tt_admin_aduser_email" type="email" value="" class="tt_keys_input w-100">
                <h6 class="w-100">Position</h6>
                <select id="tt_admin_aduser_position" name="tt_user_action_taskid" class="tt_keys_input w-100">
                    <?php $positions = $Wmtable::getPositions() ?>
                    @foreach ($positions as $position)
                        <option value="{{ $position->pos_id }}">{{ $position->pos_name }}</option>
                    @endforeach
                </select>
                <br/><br/>
                <div id="tt_user_action_aduser_box_content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"   id="tt_admin_aduser_go">Add new user</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal FOR EDITING user-->
<div class="modal fade-scale" id="tt_user_action_edituser_box" tabindex="-1" aria-labelledby="exampleModalLabe3" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabe3">Editing existing user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="tt_admin_adituser_mbox"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"   id="tt_admin_adituser_go">Save user information</button>
            </div>
        </div>
    </div>
</div>

@include('footer')
