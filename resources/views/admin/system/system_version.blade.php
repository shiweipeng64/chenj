    <div class="version-index">
        <div class="row">
        
        </div>
               <!-- table content -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>系统版本 管理</h2>

                        <div class="clearfix"></div>

                        <button type="button" class="btn btn-success btn-xs btn-add">更新</button>
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
                                <td>{last_version}</td>
                                <td>{update_version}</td>
                                <td>{update_time}</td>
                                <td>{version_type_alias}</td>
                                <td>{operator_type_alias}</td>
                                <td>{update_desc}</td>
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
                                        <input type="hidden" class="form-control form-controlNew" id="version_id" name="version_id" value="">
                                        
                                        <form id="data-form" class="form-horizontal data-form" role="form">
                                            <!-- CSRF TOKEN -->
                                            
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">更新前版本号<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="last_version">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">更新版本号<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="update_version">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">更新时间<span class="required">*</span></label>
                                                    <input type="text" class="form-control form-controlNew" name="update_time">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">版本类型<span class="required">*</span></label>
                                                    <select name="version_type" class="form-control form-controlNew">
                                                        @foreach($version_type as $k=>$val)
                                                        <option value='{{$k}}'>{{$val}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">操作类型<span class="required">*</span></label>
                                                    <select name="operator_type" class="form-control form-controlNew">
                                                        @foreach($operator_type as $k=>$val)
                                                        <option value='{{$k}}'>{{$val}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label class="control-label">版本描述<span class="required">*</span></label>
                                                    <textarea name="update_desc" class="form-control form-controlNew"></textarea>
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
        <script src="/admin/adminJS/system/version_index.js"></script> 
    </div>