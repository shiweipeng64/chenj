<div class="trade-index">
	<div class="row">
	
	</div>
		   <!-- table content -->
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>交易明细</h2>

					<div class="clearfix"></div>
					
				</div>
			  
				<!-- search start -->
				
				<form id="form-search" class="x_panelNew">
					<div class="btn-group focus-btn-group">
						<label for="order_num">订单号
							  <input type="text" id="order_num" class="form-control form-controlNew" name="order_num" condition="="/>
						</label>
					</div>
					<div class="btn-group focus-btn-group">
					<label for="user_no">用户号
						  <input type="text" id="user_no" class="form-control form-controlNew" name="user_num" condition="="/>
					</label>
					</div>
					
					<div class="btn-group focus-btn-group" style="width:215px;">
						
					<label for="start_time">开始时间
						<input type="text" class="form-control datepicker form-controlNew" name="start-create_time" placeholder="" condition="start">
					</label>
						
					  </div>
					<div class="btn-group focus-btn-group" >
					<label for="start_time">结束时间
						<input type="text" class="form-control datepicker form-controlNew" name="end-create_time" placeholder="" condition="end">
					</label>
					</div>
					<div class="btn-group focus-btn-group">
						<label for="user_no">受理渠道
						  <select name="accept_channel" class="form-control form-controlNew" condition="=">
							<option value=''>不限</option>
							@foreach($accept_channel_list as $vo)
							<option value='{{$vo["id"]}}'>{{$vo['accept_name']}}</option>
							@endforeach
						  </select>
						</label>
					</div>
					<div class="btn-group focus-btn-group">
						<label for="user_no">支付渠道
						  <select name="payment_channel" table="orderSerial" class="form-control form-controlNew" condition="=">
							<option value=''>不限</option>
							@foreach($payment_channel_list as $k=>$vo)
							<option value='{{$vo["id"]}}'>{{$vo['payment_name']}}</option>
							@endforeach
						  </select>
						</label>
					</div>
					
					<div class="btn-group focus-btn-group">
						<label for="user_no">支付方式
						  <select name="charge_type" table="orderSerial" class="form-control form-controlNew" condition="=">
							<option value=''>不限</option>
							@foreach($pay_mode_list as $k=>$vo)
							<option value='{{$vo}}'>{{$k}}</option>
							@endforeach
						  </select>
						</label>
					</div>
					<div class="btn-group focus-btn-group">
						<label for="user_no">交易状态
						  <select name="trade_status" class="form-control form-controlNew" condition="=">
							<option value=''>不限</option>
							@foreach($trade_detail_list as $k=>$vo)
							<option value='{{$k}}'>{{$vo}}</option>
							@endforeach
						  </select>
						</label>
					</div>
					<div class="btn-group focus-btn-group">
						<label for="fullname">查找
						<button type="button" class="form-control btn btn-primary btn-sm search-btn"><i class="fa fa-search"></i></button>
						</label>
					</div>
				</form>
				
				<!-- search end -->
				<div class="x_content">
					
					<table id="datatable" class="table table-striped table-bordered">
						<colgroup>
							@foreach ($rows as $key => $row)
							@if ($row['show'])
							<col width="{{$row['width']}}">
							@endif
							@endforeach
						</colgroup>
						<thead>
						<tr>
							@foreach ($rows as $key => $row)
							@if ($row['show'])
							<th>{{$row['name']}}</th>
							@endif
							@endforeach
						</tr>
						</thead>
						<!-- ajax加载 -->
					  <tbody>
						
					  </tbody>
					</table>
					<div id="AiGrid"><!-- 分页插件 --></div>

					<!-- 订单列表HTML模板 -->
					<script type="text/template" id="table_template">
						<tr>
							<td>{order_num}</td>
							<td>{user_num}</td>
							<td>{accept_channel_name}</td>
							<td>{charge_type_alias}</td>
							<td>{paid_money}</td>
							<td>{refund_money}</td>
							<td>{official_type_alias}</td>
							<td>{official_remark}</td>
							<td>{create_time}</td>
							<td><button disabled class="btn btn-xs btn-primary">{trade_status_alias}</button></td>
							<td>{charge_time}</td>
							<td>
								<button type="button" dataid="{order_num}" class="btn btn-info btn-xs btn-edit"><i class="fa fa-pencil">查看流水</i></button>
							</td>
						</tr>
					</script>
				</div>
			  
				<!-- 添加/修改详情 modal -->
				<div id="edit-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog"  style="width:50%">
					<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title" id="myModalLabel2">流水详情</h4>
							</div>
							
							<script type="text/template" id="table_template_second">
								<tr>
									<td>{serial_num}</td>
									<td>{charge_money}</td>
									<td>{charge_time}</td>
									<td>{payment_channel_name}</td>
									<td>{charge_type_name}</td>
									<td>{accept_channel_name}</td>
									<td><button disabled class="btn btn-xs btn-primary">{trade_status_alias}</button></td>
								</tr>
							</script>
							
							<div class="modal-body">
								<table id="detail-datatable" class="table table-striped table-bordered">
									<colgroup>
										@foreach ($rows2 as $key => $row)
										@if ($row['show'])
										<col width="{{$row['width']}}">
										@endif
										@endforeach
									</colgroup>
									<thead>
									<tr>
										@foreach ($rows2 as $key => $row)
										@if ($row['show'])
										<th>{{$row['name']}}</th>
										@endif
										@endforeach
									</tr>
									</thead>

									<tbody>

									</tbody>
								</table>
								<!--
								<div id="testmodal2" style="padding: 5px 20px;">
								  <form id="antoform2" class="form-horizontal" role="form">
									
									<div class="form-group">
									  
									  <div class="col-sm-9">
										<label class="control-label">Title</label>
										<input type="text" class="form-control" id="title2" name="title2">
										
									  </div>
									 
									</div>
									<div class="form-group">
									  
									  <div class="col-sm-9">
										
										<input type="text" class="form-control" value="">
										
									  </div>
									 
									</div>

								  </form>
								</div>
								-->
							</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default antoclose2" data-dismiss="modal">关闭</button>
							<!--<button type="button" class="btn btn-primary antosubmit2">Save changes</button>-->
						</div>
					</div>
				  </div>
				</div>				
			</div>
		</div>
	</div>
	<script>
		
		var zNodes = {};
		
	</script>
	<script src="/admin/vendors/searchableSelect/jquery.searchableSelect.js"></script>
	<script src="/admin/adminJS/trade/trade_detail.js"></script> 
</div>


       
