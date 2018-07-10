
<link href="/admin/vendors/zTree/css/zTreeStyle/zTreeStyle.css" rel="stylesheet">
<script src="/admin/vendors/zTree/js/jquery.ztree.core.js"></script>
<script src="/admin/vendors/zTree/js/jquery.ztree.excheck.js"></script>
			<div class="row">
			
            </div>
               <!-- table content -->
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>流程数据审核</h2>
					
                    <div class="clearfix"></div>
                    
					<button type="button" class="btn btn-success btn-xs btn-add">添加</button>
					
                  </div>
				  
				  <!-- search start -->
				  
					<form id="form-search" class="x_panelNew">
					<div class="btn-group focus-btn-group">
						<label for="status">审核状态
						  <select name="status" class="form-control form-controlNew" condition="">
						  	@foreach($status_list as $key=>$item)
							<option value='{{$key}}'>{{$item}}</option>
							@endforeach
						  </select>
						</label>
					</div>
					
					<div class="btn-group focus-btn-group">
						<label for="fullname">查找
						<button type="button" class="form-control form-controlNew btn btn-primary btn-sm search-btn"><i class="fa fa-search"></i></button>
						</label>
					</div>
					</form>
					<!-- search end -->
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>流程名</th>
                          <th>步骤名</th>
                          <th>用户名</th>
						  <th>创建时间</th>
						  <th>审核状态</th>
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
						<td>{process_name}</td>
						<td>{step_name}</td>
						<td>{user_name}</td>
						<td>{create_time_str}</td>
						<td>{status_str}</td>
						<td>
							
							<button type="button" dataid="{id}" class="btn btn-info btn-xs btn-edit"><i class="fa fa-pencil">审核</i></button>
							
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
							  
								<div class="col-sm-4">
									<label class="control-label">流程名</label>
									<input type="text" class="form-control form-controlNew" name="process_name" disabled="disabled">
									<input type="hidden" name="process_id" value=''>
								</div>
								<div class="col-sm-4">
									<label class="control-label">步骤名<span class="required">*</span></label>
									<input type="text" class="form-control form-controlNew" name="step_name" disabled="disabled">
								
								</div>
								<div class="col-sm-4">
									<label class="control-label">用户名<span class="required">*</span></label>
									<input type="text" class="form-control form-controlNew" name="user_name" disabled="disabled">
									<input type="hidden" name="user_id" value=''>
								</div>
							 
							</div>

							<div class="form-group">
							  
								<div class="col-sm-12">
									<label class="control-label">审核数据集</label>
									<textarea name="content" style="display: block;width: 470px;" placeholder="" disabled="disabled"></textarea>
									
								</div>
								
							</div>
							
							<div class="form-group">
							  
								<div class="col-sm-12">
									<label class="control-label">反馈信息</label>
									<textarea name="last_feedback" style="display: block;width: 470px;" placeholder=""></textarea>
									
								</div>
								
							</div>
							
							
							<div class="form-group">

								<div class="col-sm-6">
									<label class="control-label">是否锁定</label>
									<select name="is_lock" class="form-control form-controlNew">
										<option value="2">否</option>
										<option value="1">是</option>							
									</select>
								</div>
							
								<div class="col-sm-6">
									<label class="control-label">审核状态</label>
									<select name="status" class="form-control form-controlNew">
										@foreach($status_list as $key=>$item)
										<option value="{{$key}}">{{$item}}</option>
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
			

<script src="/admin/adminJS/process/process_data_audit.js"></script>   	

       
