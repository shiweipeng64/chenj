
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
                    <h2>流程管理</h2>
					
                    <div class="clearfix"></div>
					<button type="button" class="btn btn-success btn-xs btn-add">添加</button>
					<button type="button" class="btn btn-info btn-xs btn-back" style="display:none;"><i class="fa fa-arrow-left"></i>返回</button>
                  </div>
				  
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>上一个流程</th>
                          <th>流程名</th>
                          <th>流程类型</th>
						  <th>流程归属</th>
						  <th>开始-结束时间</th>
						  <th>是否需审核</th>
						  <th>静默请求地址</th>
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
						<td>{pre_process_name}</td>
						<td>{name}</td>
						<td>{type_str}</td>
						<td>{flow_str}</td>
						<td>{start_time}~{end_time}</td>
						<td>{is_audit_str}</td>
						<td>{done_gourl}({gourl_type})</td>
						<td>{status_str}</td>					
						<td>
							
							<button type="button" dataid="{id}" class="btn btn-primary btn-xs btn-detail"><i class="fa fa-folder">详情</i></button>							
							<button type="button" dataid="{id}" class="btn btn-info btn-xs btn-edit"><i class="fa fa-pencil">修改</i></button>
							<button type="button" dataid="{id}" prev_process_id="{prev_process_id}" class="btn btn-warning btn-xs btn-next">下一个流程<i class="fa fa-arrow-right"></i></button>
							<button type="button" dataid="{id}" class="btn btn-info btn-xs btn-step"><i class="fa fa-pencil">流程步骤</i></button>
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
									<label class="control-label">流程名<span class="required">*</span></label>
									<input type="text" class="form-control form-controlNew" name="name" data-rule-required="true" data-msg-required="请填写名称">
								
								</div>

								<div class="col-sm-6">
									<label class="control-label">流程类型</label>
									<select name="type" class="form-control form-controlNew">
									@foreach($type_list as $key=>$val)
										<option value="{{$key}}">{{$val}}</option>
									@endforeach	
									</select>
								</div>
								
							</div>
							
							<div class="form-group">
							  
								<div class="col-sm-6">
									<label class="control-label">流程归属</label>
									<select name="flow" class="form-control form-controlNew">
									@foreach($flow_list as $key=>$val)
										<option value="{{$key}}">{{$val}}</option>
									@endforeach	
									</select>
								</div>
								<div class="col-sm-6">
									<label class="control-label">是否开启审核</label>
									<select name="is_audit" class="form-control form-controlNew">
										<option value="1">是</option>
										<option value="2">否</option>										
									</select>
								</div>
							 
							</div>

							<div class="form-group audit_role">
								<div class="col-sm-12">
									<label class="control-label">审核角色配置(<img src="/admin/vendors/zTree/css/zTreeStyle/img/diy/7.png">--角色分组&nbsp;&nbsp;<img src="/admin/vendors/zTree/css/zTreeStyle/img/diy/6.png">--角色)</label>
									<ul id="treeDemo" class="ztree"></ul>
								</div>
							</div>

							<div class="form-group">
							  
								<div class="col-sm-6">
									<label class="control-label">开始时间</label>
									<input type="text" class="form-control datepicker form-controlNew" name="start_time" placeholder="">
								</div>
								<div class="col-sm-6">
									<label class="control-label">结束时间</label>
									<input type="text" class="form-control datepicker form-controlNew" name="end_time" placeholder="">
								</div>
							 
							</div>

							<div class="form-group">
								<div class="col-sm-12">
									<label class="control-label">星期几开启</label>
									<div>
									<div style="display:inline-block;width:20%;text-align: left;"><input type="checkbox" name="all" value="">全选</div>
									<div style="display:inline-block;width:20%;text-align: left;"><input type="checkbox" name="week[]" value="1">星期一</div>
									<div style="display:inline-block;width:20%;text-align: left;"><input type="checkbox" name="week[]" value="2">星期二</div>
									<div style="display:inline-block;width:20%;text-align: left;"><input type="checkbox" name="week[]" value="4">星期三</div>
									<div style="display:inline-block;width:20%;text-align: left;"><input type="checkbox" name="week[]" value="8">星期四</div>
									<div style="display:inline-block;width:20%;text-align: left;"><input type="checkbox" name="week[]" value="16">星期五</div>
									<div style="display:inline-block;width:20%;text-align: left;"><input type="checkbox" name="week[]" value="32">星期六</div>
									<div style="display:inline-block;width:20%;text-align: left;"><input type="checkbox" name="week[]" value="64">星期天</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								
								<div class="col-sm-8">
									<label class="control-label">静默跳转地址</label>
									<input type="text" class="form-control form-controlNew" name="done_gourl" placeholder="">
								</div>

								<div class="col-sm-4">
									<label class="control-label">请求方式</label>
									<select name="gourl_type" class="form-control form-controlNew">
										<option value="GET">GET</option>
										<option value="POST">POST</option>
										<option value="PUT">PUT</option>
										<option value="DELETE">DELETE</option>										
									</select>
								</div>
								
							</div>
							
							<div class="form-group">
								
								<div class="col-sm-6">
									<label class="control-label">是否所有人参与审核</label>
									<select name="audit_all" class="form-control form-controlNew">
										<option value="2">否</option>
										<option value="1">是</option>										
									</select>
								</div>

								<div class="col-sm-6">
									<label class="control-label">状态</label>
									<select name="status" class="form-control form-controlNew">
										<option value="1">正常</option>
										<option value="2">禁用</option>										
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

	var Tree = null;
	
	var setting = {
		check: {
			enable: true
		},
		data: {
			simpleData: {
				enable: true,
				pIdKey: "parent_id",
			}
		},
		chkboxType:{
			"Y":'ps',
			"N":'ps'
		}
	};
	
	var zNodes = <?php echo $role_list;?>;

	for(var k in zNodes){
		//console.log(zNodes[k]['menu_id'])
		if(zNodes[k]['type'] == 1){
			zNodes[k]['icon'] = "/admin/vendors/zTree/css/zTreeStyle/img/diy/6.png";

		}else{
			zNodes[k]['icon'] = "/admin/vendors/zTree/css/zTreeStyle/img/diy/7.png";
			zNodes[k]['chkDisabled'] =true;
		}
	}
	
	$(document).ready(function(){
		Tree = $.fn.zTree.init($("#treeDemo"), setting, zNodes);
	});
	
	
</script>
			<script src="/admin/adminJS/process/process.js"></script>   	

       
