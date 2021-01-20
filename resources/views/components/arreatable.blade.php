<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="card-body table-responsive p-0" id="tt_keys_res">
				<table class="table table-hover text-nowrap table-bordered">
					<tr>
						<th scope="col" class="text-left bg-secondary text-white">User Name</th>
						@foreach ($Wmtable->periodls as $value)
							<?php $c1 = ($Wmtable->isWeekend(date('N', $value))  ?'bg-secondary text-white' :'text-info') ?>
							<?php $c2 = ($value==strtotime(date('Y-m-d', time())) ?'wm_success text-white' :'') ?>
							<th scope="col" class="text-center {!! $c1 !!} {!! $c2 !!}">{!! date('d.m', $value) !!}</th>
						@endforeach
					</tr>
				
					<?php $users = $Wmtable::getUsers() ?>
					@forelse ($users as $user)<?php
						$ttarr  = (array)@unserialize($user->usr_work);
						$ynPlan = $Wmtable->checkPlanFeatures($ttarr); ?>
						
						<tr>
							<td class="text-left bg-secondary text-white">
								<?php echo($ynPlan ?'<b class="fa fa-check text-success"></b>' :'<b class="fa fa-check text-danger"></b>') ?>
								<a href="#uID" class="tt_user_action text-decoration-none text-primary" data-userid="{{ $user->usr_id }}" title="Set Time period!">
									{{ $user->usr_first_name.' '.strtoupper(mb_substr($user->usr_last_name, 0, 1)).'. ('. $user->usr_pos_id.')' }}
								</a>
							</td><?php
							$sumDH = 0;
							foreach($Wmtable->periodls as $value){
								$wd      = $Wmtable->isWeekend(date('N', $value));
								$tooltip = '';
								if(!isset($ttarr[$value])){
									$val = '';
								}else{
									$sumDH = array_sum($ttarr[$value]);
									list($tooltip, $valtxt) = $Wmtable->getCellDataSimple($ttarr[$value]);
									if( $sumDH == 0 ){
										$val = '';
									}elseif( $sumDH == $Wmtable->sopt_huurs_day ){
										$val = '<b class="fa fa-check text-success">'.$valtxt.'</b>';
									}elseif( $sumDH < $Wmtable->sopt_huurs_day){
										$val = '<b class="text-warning">'.$valtxt.'</b>';
									}elseif( $sumDH > $Wmtable->sopt_huurs_day){
										$val = '<b class="text-danger">'.$valtxt.'</b>';
									}else{
										$val='';
									}
								}
								
								$c1      = ($wd ?'bg-secondary text-white' :'text-info');
								$c2      = ($value==strtotime(date('Y-m-d', time())) ?'wm_success text-white' :'');
								$c3      = ($sumDH > 0 ?'tt_cell' :'');
								$atr     = (!$wd ?'data-cell-user="'.$user->usr_id.'" data-cell-date="'.$value.'"' :'');
								$ttip    = 'data-toggle="tooltip" data-html="true" data-placement="right" title="'.$tooltip.'"'; ?>
								<td class="text-center {!! $c1 !!} {!! $c2 !!} {!! $c3 !!}" {!! $atr !!} {!! $ttip !!}>
									{!! $val !!}
								</td><?php
							} ?>
						</tr>
					@empty
						<tr><td colspan="{{ count($Wmtable->periodls) }}"></td></tr>
					@endforelse
				</table>
			</div>
		</div>
	</div>
</section>