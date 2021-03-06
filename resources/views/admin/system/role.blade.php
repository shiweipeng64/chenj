    <div class="role-index">
        <link href="/admin/vendors/searchableSelect/jquery.searchableSelect.css" rel="stylesheet">
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
                        <h2>角色管理</h2>

                        <div class="clearfix"></div>

                        <button type="button" class="btn btn-success btn-xs btn-add">添加</button>
                        <button type="button" class="btn btn-info btn-xs btn-back" style="display:none;"><i class="fa fa-arrow-left"></i>返回</button>
                    </div>
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
                                <td>{role_name}</td>
                                <td>{role_type_alias}</td>
                                <td>{role_status_alias}</td>
                                <td>{role_hierarchy_alias}</td>
                                <td>{role_examine_type_alias}</td>
                                <td>
                                    <button type="button" dataid="{id}" class="btn btn-primary btn-xs btn-detail"><i class="fa fa-folder">详情</i></button>
                                    <button type="button" dataid="{id}" class="btn btn-info btn-xs btn-edit"><i class="fa fa-pencil">修改</i></button>
                                    <button type="button" dataid="{id}" parent_id="{parent_id}" class="btn btn-warning btn-xs btn-child">子角色(分组)<i class="fa fa-arrow-right"></i></button>
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
                                        <input type="hidden" class="form-control form-controlNew" id="role_id" name="role_id" value="">
                                        <input type="hidden" class="form-control form-controlNew" id="parent_id" name="parent_id" value="">
                                        
                                        <form id="dataform" class="form-horizontal data-form" role="form">
                                            <!-- CSRF TOKEN -->
                                            
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">角色(分组)名<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="role_name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">类型<span class="required">*</span></label>
                                                    <select name="role_type" class="form-control form-controlNew">
                                                        @foreach($types as $k=>$val)
                                                        <option value='{{$k}}'>{{$val}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label class="control-label">功能配置<span class="required">*</span>(<img src="/admin/vendors/zTree/css/zTreeStyle/img/diy/7.png">--菜单&nbsp;&nbsp;<img src="/admin/vendors/zTree/css/zTreeStyle/img/diy/6.png">--功能)</label>
                                                    <ul id="tree_datas" class="ztree"></ul>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">所属层级<span class="required">*</span></label>
                                                    <select name="role_hierarchy" class="form-control form-controlNew">
                                                        @foreach($roleHierarchies as $k=>$val)
                                                        <option value='{{$k}}'>{{$val}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">检视信息类型<span class="required">*</span></label>
                                                    <select name="role_examine_type" class="form-control form-controlNew">
                                                        @foreach($examineTypes as $k=>$val)
                                                        <option value='{{$k}}'>{{$val}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-3">
                                                    <label class="control-label">状态<span class="required">*</span></label>
                                                    <select name="role_status" class="form-control form-controlNew">
                                                        @foreach($status as $k=>$val)
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
            
            var zNodes = {!! json_encode($menus, JSON_UNESCAPED_UNICODE) !!};
            
        </script>
        <script src="/admin/vendors/searchableSelect/jquery.searchableSelect.js"></script>
        <script src="/admin/adminJS/system/role_index.js"></script> 
    </div>