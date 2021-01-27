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
                <input type="text" value="{{ $Wmtable::getMyFromTo() }}" data-range="true" data-multiple-dates-separator="-" class="datepicker-here tt_keys_input tt_keys_input_daterange" readonly="readonly" data-toggle="tooltip" data-html="true" data-placement="bottom" title="Click to select!">
                <a href="#uID" class="fa fa-calendar tt_keys text-dark tt_keys_go"      aria-hidden="true" data-toggle="tooltip" data-html="true" data-placement="bottom" title="Select Time period!"></a>
                <a href="#uID" class="tt_keys tt_keys_set text-dark"                    aria-hidden="true" data-toggle="tooltip" data-html="true" data-placement="bottom" title="Set Time!">
                    <svg version="1.1" width="40" height="35" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
						<g><path d="M714.8,545.8c-40.5,0-78.4,10.9-111.2,29.9c-48.1,27.9-84.8,73.3-101.3,127.4l0,0c-6.3,20.5-9.6,42.3-9.6,64.8c0,122.5,99.6,222.1,222.1,222.1c122.5,0,222.1-99.6,222.1-222.1C936.9,645.4,837.2,545.8,714.8,545.8z M714.8,955.7c-103.6,0-187.9-84.3-187.9-187.8c0-22.8,4.1-44.6,11.5-64.8l0,0c23.6-64.1,81.3-111.9,151-121.3c-2.7-3.7-7-6.1-12-6.1c4.9,0,9.3,2.4,12,6.1c8.3-1.1,16.7-1.7,25.3-1.7c103.6,0,187.8,84.3,187.8,187.8C902.6,871.5,818.4,955.7,714.8,955.7z"/><path d="M825.7,742h-82.1v-85.9c0-7.5-6.1-13.6-13.6-13.6h-27.1c-4.2,0-8,2-10.5,5v40.7c0,3.4-1.1,6.5-3.1,9V742h-82.1c-7.5,0-13.6,6.1-13.6,13.6V781c0,7.5,6.1,13.6,13.6,13.6h82.1v86.8c0,7.5,6.1,13.6,13.6,13.6H730c7.5,0,13.6-6.1,13.6-13.6v-86.8h82.1c7.5,0,13.6-6.1,13.6-13.6v-25.4C839.2,748.1,833.2,742,825.7,742z"/><path d="M692.3,647.5c-1.9,2.3-3,5.3-3,8.6v41.2c1.9-2.5,3-5.6,3-9V647.5z"/><path d="M562.3,423.1c-13.6-9.8-34.1-7.1-44.4,5.8L365.2,618.2L315,561.9c-11-12.2-31.7-13.9-44.6-3.6c-6.7,5.4-10.8,13-11.5,21.4c-0.7,8.4,2,16.5,7.7,22.8l75.7,84.8c6.1,6.8,14.9,10.7,24.2,10.7c0.1,0,0.7,0,0.8,0c9.6-0.2,18.5-4.5,24.5-11.9L568.4,467c5.3-6.6,7.6-14.8,6.5-23.1C573.8,435.5,569.3,428.1,562.3,423.1z"/><path d="M128.5,874.3V155.5h49.1c1.6-24.8,11.3-47.5,26.5-65.3H95.8c-18,0-32.7,14.7-32.7,32.7v784.1c0,18.1,14.6,32.7,32.7,32.7h396.9c-11.1-20.4-19.9-42.3-25.8-65.3H128.5z"/><path d="M689.4,155.5v364.8c18-3.5,36.6-5.4,55.6-5.4c3.3,0,6.5,0.1,9.8,0.2V122.9c0-18-14.6-32.7-32.7-32.7H613.8c15.2,17.9,24.8,40.5,26.5,65.3H689.4z"/><path d="M290,240.4h237.9c40.5,0,73.5-33,73.5-73.5v-4c0-2.5-0.1-5-0.4-7.4c-3.4-33.8-29.8-60.8-63.3-65.3c-3.2-0.4-6.5-0.7-9.8-0.7H496v-5.9C496,43,463,10,422.5,10h-27.1c-40.5,0-73.5,33-73.5,73.5v5.9H290c-3.3,0-6.6,0.3-9.8,0.7c-33.5,4.5-59.9,31.5-63.3,65.3c-0.2,2.4-0.4,5-0.4,7.4v4C216.4,207.4,249.4,240.4,290,240.4z"/></g>
					</svg>
                </a>
                <a href="#uID" class="tt_keys text-dark tt_keys_addtask"                aria-hidden="true" data-toggle="tooltip" data-html="true" data-placement="bottom" title="Add new task!">
                    <svg version="1.1" width="40" height="35" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
						<g><g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)"><path d="M1198,4840.6c-398.6-69.2-773.3-346.1-954.8-701.7c-150.4-298.4-143.2-126.5-143.2-3344c0-3236.6-7.2-3064.7,150.4-3363.1c97.9-188.6,367.6-458.3,553.8-556.2c296-155.1,226.8-150.4,2470.4-150.4h2033.6l-16.7,64.4c-7.1,38.2-21.5,241.1-28.6,455.9l-11.9,386.7H3262.7H1276.8l-78.8,52.5c-105,71.6-164.7,157.5-191,272.1c-14.3,52.5-23.9,1117.1-23.9,2439.4v2343.9h3174.6h3174.5V1341.4c0-1319.9,2.4-1396.3,43-1384.4c107.4,33.4,420.1,64.5,625.4,59.7l226.8-4.8v1859.4c0,2062.3,7.2,1954.8-159.9,2286.6c-100.3,198.1-365.2,455.9-572.9,558.5c-310.3,152.8-198.1,148-3336.8,145.6C2589.6,4859.7,1257.7,4850.2,1198,4840.6z M1758.9,4100.7c95.5-59.7,179-210,179-322.2c0-176.6-109.8-319.8-286.4-372.3c-241.1-71.6-482.2,114.6-482.2,372.3C1169.4,4081.6,1498.8,4260.6,1758.9,4100.7z M2895.1,4110.2c102.6-52.5,171.8-169.5,183.8-307.9c11.9-150.4-31-243.5-155.1-338.9c-114.6-85.9-322.2-95.5-429.6-16.7c-162.3,119.3-217.2,312.7-140.8,494.1C2436.8,4138.9,2687.4,4217.6,2895.1,4110.2z M4050.4,4103.1c298.4-171.9,205.3-654-138.4-711.3c-210-33.4-420.1,131.3-441.6,348.5C3441.7,4057.7,3771.1,4265.4,4050.4,4103.1z"/><path d="M2265,1945.3c-279.3-88.3-381.9-436.8-193.3-661.2c140.8-164.7,9.5-155.1,2086.1-155.1c1794.9,0,1878.5,2.4,1964.4,45.4c281.7,138.4,303.1,549,38.2,723.2l-102.6,66.8l-1849.8,4.8C2833,1971.6,2331.8,1966.8,2265,1945.3z"/><path d="M2212.5,630.1c-155.1-66.8-272.1-288.8-238.7-451.1c26.3-126.5,126.5-255.4,233.9-305.5c95.5-43,183.8-45.4,1950.1-45.4H6010l105,54.9C6360.8,7.2,6427.7,312.7,6251,513.2c-138.4,157.5-40.6,150.4-2098.1,150.4C2654,661.2,2269.7,656.4,2212.5,630.1z"/><path d="M2207.7-670.7c-243.5-112.2-310.3-436.8-133.7-649.2c121.7-145.6,69.2-140.8,1840.3-140.8H5535l121.7,200.5c66.8,109.8,202.9,286.4,303.1,391.4l179,190.9l-74,26.3c-52.5,19.1-637.3,26.3-1916.7,26.3C2391.5-625.4,2303.1-627.7,2207.7-670.7z"/><path d="M7721.4-720.8c-802-83.5-1467.9-663.6-1692.3-1479.9c-66.8-238.7-62.1-739.9,9.5-990.6c198.1-692.2,730.4-1214.9,1425-1398.7c264.9-71.6,687.4-69.2,954.7,0c245.8,64.4,582.4,229.1,763.8,377.1c303.1,245.8,568.1,654,673.1,1033.5c59.7,217.2,59.7,785.3,0,1002.5c-59.7,214.8-233.9,556.1-374.7,732.8C9070-930.9,8392.1-654,7721.4-720.8z M8117.6-1317.6c52.5-26.3,119.3-85.9,148-136.1c52.5-83.5,57.3-121.7,64.5-465.4l9.6-377.1h355.6c307.9,0,370-7.2,448.8-47.7c248.2-126.5,274.5-484.5,45.3-649.2c-74-50.1-105-54.9-465.4-62.1l-384.3-7.1l-9.6-374.7c-7.2-298.4-16.7-389.1-47.7-451.1c-97.9-176.6-331.8-245.8-513.2-155.1c-169.5,88.3-183.8,131.3-198.1,577.6l-11.9,393.8l-381.9,11.9c-427.3,14.3-494.1,33.4-582.4,174.2c-66.8,109.8-69.2,303.1-2.4,412.9c90.7,143.2,202.9,176.6,615.8,176.6H7571v377.1c0,439.2,21.5,506,190.9,594.3C7888.4-1257.9,7998.3-1255.5,8117.6-1317.6z"/></g></g>
					</svg>
                </a>
                <a href="#uID" class="fa fa-video-camera tt_keys text-dark tt_keys_log" aria-hidden="true" data-toggle="tooltip" data-html="true" data-placement="bottom" title="View Log!"></a>
                <a href="#uID" class="fa fa-users tt_keys text-dark tt_keys_admusers"   data-toggle="tooltip"  data-placement="bottom" title="All users!"></a>
                <a             class="tt_keys text-dark"                                aria-hidden="true" data-toggle="tooltip" data-html="true" data-placement="bottom" title="Exit!" href="{{ url('\logout') }}">
                    <svg version="1.1" width="40" height="35" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
						<g><path d="M10,55.2L10,55.2L10,55.2z"/><path d="M606.7,863.5H161.2V254.3h445.5v171.5h80.5V274.4c0-55.5-45.4-100.9-101.1-100.9H182.5c-55.5,0-100.9,45.4-100.9,100.9v569.4c0,55.5,45.4,100.9,100.9,100.9h403.6c55.5,0,101.1-45.3,101.1-100.9V742.9h-80.5V863.5z M990,585.2L789.1,388.3v136.1H334.9v122.3h454.2V782L990,585.2z"/></g>
					</svg>
                </a>
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
