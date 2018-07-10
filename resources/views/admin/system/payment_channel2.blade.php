
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
                      <thead>
                        <tr>
                          <th>渠道ID</th>
                          <th>渠道名</th>
						  <th>支付标记</th>
                          <th>支付类型</th>
                          <th>支付方式</th>
						  <th>结算费率</th>
						  <th>渠道优惠金额</th>
                          <th>渠道折扣</th>
						  <!--
                          <th>满(减)</th>
						  
						  <th>适用方式</th>-->
						  <th>操作</th>
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
						<td>{key}</td>
						<td>{name}</td>
						<td>{pay_sign_str}</td>
						<td>{pay_type_str}</td>
						<td>{sign_name}</td>
						<td>{clear_money_rate}</td>
						<td>{money}</td>
						<td>{discount}</td>
						<!--
						<td>{act_type_str}</td>
						
						<td>{apply_type_str}</td>	-->					
						<td>
							<button type="button" dataid="{id}" class="btn btn-primary btn-xs btn-detail"><i class="fa fa-folder">详情</i></button>
							<button type="button" dataid="{id}" class="btn btn-info btn-xs btn-edit"><i class="fa fa-pencil">修改</i></button>
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
				  <!-- 修改详情 modal -->
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
							<form id="antoform2" class="form-horizontal data-form" role="form">
							<!-- CSRF TOKEN -->
							
							<div class="form-group">
							  
								<div class="col-sm-6">
									<label class="control-label">渠道名称<span class="required">*</span></label>
									<input type="text" class="form-control form-controlNew" name="name" placeholder="不能超过16位的字母数字或汉字" data-rule-maxlength='16' data-msg-maxlength='字符长度不能超过16' data-rule-required="true" data-msg-required="请填写名称">
								
								</div>
								<div class="col-sm-6">
									<label class="control-label">渠道标识(区分大小写)<span class="required">*</span></label>
									<input type="text" class="form-control form-controlNew" name="key" placeholder="不能超过12位的字母数字" data-rule-maxlength='12' data-msg-maxlength='字符长度不能超过12' data-rule-required="true" data-rule-required="true" data-msg-required="请填写标识">
								
								</div>
							 
							</div>
							
							<div class="form-group">
							  
								<div class="col-sm-6">
									<label class="control-label">支付标记<span class="required">*</span></label>
									<select name="pay_sign" class="form-control form-controlNew">
										@foreach($pay_channel_list as $k=>$vo)
										<option value="{{$vo}}">{{$k}}</option>
										@endforeach										
									</select>
								</div>
								<div class="col-sm-6">
									<label class="control-label">支付类型<span class="required">*</span></label>
									<select name="pay_type" class="form-control form-controlNew">
										@foreach($pay_mode_list as $k=>$vo)
										<option value="{{$vo}}">{{$k}}</option>
										@endforeach										
									</select>
								</div>
							 
							</div>
							
							<div class="form-group">
								
								<div class="col-sm-6">
									<label class="control-label">支付方式标识(区分大小写)<span class="required">*</span></label>
									<input type="text" class="form-control form-controlNew" name="sign" placeholder="不能超过12位的字母数字" data-rule-maxlength='12' data-msg-maxlength='字符长度不能超过12' data-rule-required="true" data-rule-required="true" data-msg-required="请填写标识">
								
								</div>
								<div class="col-sm-6">
									<label class="control-label">支付方式<span class="required">*</span></label>
									<input type="text" class="form-control form-controlNew" name="sign_name" placeholder="不能超过16位的字母数字或汉字" data-rule-maxlength='16' data-msg-maxlength='字符长度不能超过16' data-rule-required="true" data-rule-required="true" data-msg-required="请填写支付方式">
								
								</div>
							 
							</div>
							
							<div class="form-group">
							  
								<div class="col-sm-6">
									<label class="control-label">结算费率<span class="required">*</span>(最多精确到小数点后两位)</label>
									<input type="text" class="form-control form-controlNew" name="clear_money_rate" data-rule-range='0,100' data-msg-range='数字需在0~100之间' data-rule-required="true" data-msg-required="请填写结算费率" placeholder="0~100的数字">

								</div>
								<div class="col-sm-3">
									<label class="control-label">渠道优惠折扣</label>
									<input type="text" class="form-control form-controlNew act" name="discount" data-msg-required="必填">

								</div>
								<div class="col-sm-3">
									<label class="control-label">渠道优惠金额</label>
									<input type="text" class="form-control form-controlNew act" name="money" data-msg-required="必填">

								</div>
							 
							</div>
							
							<div class="form-group">
								<div class="col-sm-12">
									<label style="dispaly:block;" class="control-label">受理渠道</label>
									<div>
									@foreach($accept_list as $k=>$vo)
									<div style="display:inline-block;width:20%;text-align: left;"><input type="checkbox" name="accept_id[]" value="{{$vo->id}}">{{$vo->name}}</div>
									@endforeach
									</div>
								</div>
							</div>
							
							<div class="form-group">
							
								<div class="col-sm-4">
									<label class="control-label">活动类型</label>
									<select name="act_type" class="form-control form-controlNew">
										<option value="9">无活动</option>
										<option value="1">满减</option>
										<option value="2">满赠</option>										
									</select>
								</div>
								<div class="col-sm-4">
									<label class="control-label">优惠阀值</label>
									<input type="text" class="form-control form-controlNew act" name="money_valve" data-msg-required="必填">
								</div>
								
							</div>
							
							
							<!--
							<div class="form-group">
								<div class="col-sm-4">
									<label class="control-label">开始时间</label>
									<input type="text" class="form-control form-controlNew datepicker" name="start_time" placeholder="">
								</div>
								<div class="col-sm-4">
									<label class="control-label">结束时间</label>
									<input type="text" class="form-control form-controlNew datepicker" name="end_time" placeholder="">
								</div>
							</div>-->
							
							<div class="form-group">
							
								<div class="col-sm-4">
									<label class="control-label">状态</label>
									<select name="status" class="form-control form-controlNew">
										<option value="1">正常</option>
										<option value="2">禁用</option>										
									</select>
								</div>
								<!--
								<div class="col-sm-4">
									<label class="control-label">是否流水号唯一</label>
									<select name="only_serial" class="form-control form-controlNew">
										<option value="1">是</option>
										<option value="2">否</option>										
									</select>
								</div>-->
								
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
			<script src="/admin/adminJS/system/payment_channel_index.js"></script>   	

       
