	<div class="payment-channel-index">
		<div class="row">
		
		</div>
               <!-- table content -->
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>支付渠道管理</h2>

						<div class="clearfix"></div>

						<button type="button" class="btn btn-success btn-xs btn-add">添加</button>
						
					</div>
				  
					<!-- search start -->
					
					<!--
					<form id="form-search">
					<div class="btn-group focus-btn-group">
						<label for="sys_order_num">订单号
							  <input type="text" id="sys_order_num" class="form-control form-controlNew" name="filter[sys_order_num]"/>
						</label>
						
					</div>

					<div class="btn-group focus-btn-group">
						<label for="fullname">查找
						<button type="button" class="form-control form-controlNew btn btn-primary btn-sm search-btn"><i class="fa fa-search"></i></button>
						</label>
					</div>
					</form>-->
					
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
								<td>{payment_name}</td>
								<td>{payment_sign}</td>
								<td>{payment_type}</td>
								<td>{payment_type_sign}</td>
								<td>
									<button type="button" dataid="{id}" class="btn btn-primary btn-xs btn-detail"><i class="fa fa-folder">详情</i></button>
									<button type="button" dataid="{id}" class="btn btn-info btn-xs btn-edit"><i class="fa fa-pencil">修改</i></button>
									<button type="button" dataid="{id}" class="btn btn-warning btn-xs btn-payment-way-list"><i class="fa fa-pencil fa-arrow-right">支付方式</i></button>
									<button type="button" dataid="{id}" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash-o">删除</i></button>
								</td>
							</tr>
						</script>
					</div>
				  
					  <!-- 删除 modal -->
					  <div id="delete-info" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog"  style="width:30%">
							<div class="modal-content">
														
								<div class="modal-body">
									确定要删除该信息么？
								</div>
								
								<div class="modal-footer">
									<button type="button" class="btn btn-default antoclose2" data-dismiss="modal">取消</button>
									<button type="button" _id="" class="btn btn-primary btn-delete-sure">确定</button>
								 </div>
								 
							</div>
						</div>
					  </div>
					  
					  <!-- 添加/修改详情 modal -->
					  <div id="edit-detail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog"  style="width:30%">
							<div class="modal-content">
								
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h4 class="modal-title" id="myModalLabel2"></h4>
								</div>
								<div class="modal-body">


									<div id="testmodal2" style="padding: 5px 20px;">
										<input type="hidden" class="form-control form-controlNew" id="id" name="id" value="">
										
										<form id="dataform" class="form-horizontal data-form" role="form">
											<!-- CSRF TOKEN -->
											
											<div class="form-group">
											  
												<div class="col-sm-6">
													<label class="control-label">支付渠道名称<span class="required">*</span></label>
													<input type="text" class="form-control form-controlNew" name="payment_name">
												</div>
												<div class="col-sm-6">
													<label class="control-label">支付渠道标识<span class="required">*</span></label>
													<input type="text" class="form-control form-controlNew" name="payment_sign">
													<label style="color:#a7a7a7;font-size:12px;">区分大小写</label>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-6">
													<label class="control-label">支付类型<span class="required">*</span></label>
													<select name="payment_type" class="form-control form-controlNew">
														@foreach($pay_channel_list as $k=>$val)
														<option value='{{$val}}'>{{$k}}</option>
														@endforeach
													</select>
												</div>
												<div class="col-sm-6">
													<label class="control-label">支付类型标识<span class="required">*</span></label>
													<input type="text" class="form-control form-controlNew" name="payment_type_sign" placeholder="字母请输入大写">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3">
													<label class="control-label">状态<span class="required">*</span></label>
													<select name="status" class="form-control form-controlNew">
														@foreach($payment_status_list as $k=>$val)
														<option value='{{$k}}'>{{$val}}</option>
														@endforeach
													</select>									
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default antoclose2" data-dismiss="modal">关闭</button>
									<button type="button" class="btn btn-primary btn-save">保存</button>
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
		<script src="/admin/adminJS/system/payment_channel_index.js"></script> 
	</div>