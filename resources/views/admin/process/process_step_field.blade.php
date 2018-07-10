
			<div class="row">
			
            </div>
               <!-- table content -->
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>步骤字段管理</h2>
					
                    <div class="clearfix"></div>
					<button type="button" class="btn btn-success btn-xs btn-add">添加</button>
					<button type="button" class="btn btn-info btn-xs btn-back"><i class="fa fa-arrow-left"></i>返回</button>
                  </div>
				  <!-- search start -->
					<form id="form-search" class="x_panelNew">
					
					<div class="btn-group focus-btn-group">
						<span id="current_menu"></span>
					</div>
					</form>
					<!-- search end -->
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>所属步骤</th>
                          <th>字段名</th>
                          <th>字段类型</th>
                          <th>是否必须</th>
                          <th>排序</th>
                          <th>状态</th>
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
						<td>{step_name}</td>
						<td>{name}</td>
						<td>{type}</td>
						<td>{is_required_str}</td>
						<td>{sort_num}</td>
						<td>{status_str}</td>					
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
									<label class="control-label">字段名<span class="required">*</span></label>
									<input type="text" class="form-control form-controlNew" name="name" data-rule-required="true" data-msg-required="请填写名称">
								
								</div>

								<div class="col-sm-6">
									<label class="control-label">字段类型</label>
									<input type="text" class="form-control form-controlNew" name="type">
								
								</div>
								
							</div>

							<div class="form-group">
							  
								<div class="col-sm-6">
									<label class="control-label">是否必须</label>
									<select name="is_required" class="form-control form-controlNew">
										<option value="1">是</option>
										<option value="2">否</option>										
									</select>
								</div>

								<div class="col-sm-6">
									<label class="control-label">是否可检索</label>
									<select name="is_search" class="form-control form-controlNew">
										<option value="1">是</option>
										<option value="2">否</option>										
									</select>
								</div>
								
							</div>
							
							<div class="form-group">

								<div class="col-sm-6">
									<label class="control-label">排序(越小越靠前)</label>
									<input type="text" class="form-control form-controlNew" name="sort_num">
								
								</div>
							
								<div class="col-sm-6">
									<label class="control-label">状态</label>
									<select name="status" class="form-control form-controlNew">
										<option value="1">正常</option>
										<option value="2">隐藏</option>										
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
			<script src="/admin/adminJS/process/process_step_field.js"></script>   	

       
