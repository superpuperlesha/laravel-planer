<div class="container">
	<div class="row-md-12 position-relative">
        <a href="#uID" class="fa fa-user-plus tt_keys bg-secondary tt_keys_admaduser"  data-toggle="tooltip"  data-placement="bottom" title="Add user!"></a>
		<table class="table table-hover text-nowrap table-bordered">
			<tr>
				<th scope="col" class="text-left bg-secondary text-white"><i class="fa fa-list-ol" aria-hidden="true" title="Order"></i></th>
				<th scope="col" class="text-left bg-secondary text-white">First Name</th>
				<th scope="col" class="text-left bg-secondary text-white">Last Name</th>
				<th scope="col" class="text-left bg-secondary text-white">Position</th>
				<th scope="col" class="text-left bg-secondary text-white">E-Mail</th>
			</tr>
			@forelse ($users as $user)
				<tr class="wm_sortable">
					<td class="text-left text-info cursor-pointer">
						<i class="fa fa-list-ol" aria-hidden="true" data-usr_order="{{ $user->usr_order }}"></i>
					</td>
					<td class="text-left text-info">
						{{ $user->usr_first_name }}
					</td>
					<td class="text-left text-info">
						{{ $user->usr_last_name }}
					</td>
                    <td class="text-left text-info">
                        {{ $user->usr_pos_id }}
                    </td>
                    <td class="text-left text-info">
                        {{ $user->usr_email }}
                    </td>
				</tr>
			@empty
				<tr><td colspan="4">No Users</td></tr>
			@endforelse
		</table>
	</div>
</div>
