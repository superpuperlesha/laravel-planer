<div class="container">
	<div class="row-md-12">
		<table class="table table-hover text-nowrap table-bordered">
			<tr>
				<th scope="col" class="text-left bg-secondary text-white"><i class="fa fa-list-ol" aria-hidden="true" title="Order"></i></th>
				<th scope="col" class="text-left bg-secondary text-white">First Name</th>
				<th scope="col" class="text-left bg-secondary text-white">Last Name</th>
				<th scope="col" class="text-left bg-secondary text-white">E-Mail</th>
			</tr>
			@forelse ($users as $user)
				<tr>
					<td class="text-left text-info cursor-pointer">
						<i class="fa fa-list-ol" aria-hidden="true"></i>
					</td>
					<td class="text-left text-info">
						{{ $user->usr_first_name }}
					</td>
					<td class="text-left text-info">
						{{ $user->usr_last_name }}
					</td>
					<td class="text-left text-info">
						{{ $user->usr_email }}
					</td>
				</tr>
			@empty
				<tr><td colspan="3">No Users</td></tr>
			@endforelse
		</table>
	</div>
</div>