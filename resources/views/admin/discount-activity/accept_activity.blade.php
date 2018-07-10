    <div class="accept-activity-index">
        <div class="row">
        
        </div>
               <!-- table content -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>受理渠道折扣活动列表</h2>

                        <div class="clearfix"></div>

                        <button type="button" class="btn btn-success btn-xs btn-add">添加</button>
                        <button type="button" class="btn btn-info btn-xs btn-back"><i class="fa fa-arrow-left"></i>返回</button>
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
                                <td>{activity_name}</td>
                                <td>{activity_type_alias}</td>
                                <td>{start_time}</td>
                                <td>{end_time}</td>
                                <td>{activity_repeat_alias}</td>
                                <td>{activity_desc}</td>
                                <td>{create_time}</td>
                                <td>{status_alias}</td>
                                <td>
                                    <button type="button" dataid="{id}" class="btn btn-primary btn-xs btn-detail"><i class="fa fa-folder">详情</i></button>
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
                                        <input type="hidden" class="form-control form-controlNew" id="activity_id" name="activity_id" value="">
                                        
                                        <form id="data-form" class="form-horizontal data-form" role="form">
                                            <!-- CSRF TOKEN -->
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label class="control-label">受理渠道关联活动<span class="required">*</span></label>
                                                    <select name="discount_activity" class="form-control form-controlNew activity-search">
                                                        <option value="0:-">请选择活动</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">活动名称</label>
                                                    <input type="text" disabled="true" class="form-control form-controlNew" name="activity_name">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="control-label">活动类型</label>
                                                    <input disabled="true" type="text" class="form-control form-controlNew" name="activity_type">
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="control-label">活动叠加</label>
                                                    <input disabled="true" type="text" class="form-control form-controlNew" name="activity_superposition">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">参与阀值</label>
                                                    <input disabled="true" type="text" class="form-control form-controlNew" name="threshold_money">
                                                </div>
                                                <div class="col-sm-6" style="display:none;">
                                                    <label class="control-label">活动折扣(%)</label>
                                                    <input disabled="true" type="text" class="form-control form-controlNew" name="activity_discount">
                                                </div>
                                                <div class="col-sm-6" style="display:none;">
                                                    <label class="control-label">满减/赠金额</label>
                                                    <input disabled="true" type="text" class="form-control form-controlNew" name="activity_plummet">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">开始时间</label>
                                                    <input disabled="true" type="text" class="form-control form-controlNew" name="start_time">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">结束时间</label>
                                                    <input disabled="true" type="text" class="form-control form-controlNew" name="end_time">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-6">
                                                    <label class="control-label">参与次数</label>
                                                    <input disabled="true" type="text" class="form-control form-controlNew" name="join_count">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">参与规则</label>
                                                    <input disabled="true" type="text" class="form-control form-controlNew" name="join_rule">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label class="control-label">活动重复</label>
                                                    <input disabled="true" type="text" class="form-control form-controlNew" name="activity_repeat">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="control-label">活动间隔(秒)</label>
                                                    <input disabled="true" type="text" class="form-control form-controlNew" name="join_interval">
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="control-label">状态</label>
                                                    <input disabled="true" type="text" class="form-control form-controlNew" name="status">
                                                </div>
                                            </div>
                                            <div class="form-group" style="display:none;">
                                                <div class="col-sm-6">
                                                    <label class="control-label">下个开始时间</label>
                                                    <input disabled="true" type="text" disabled="true" class="form-control form-controlNew" name="repeat_snext_time">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="control-label">下个结束时间</label>
                                                    <input disabled="true" type="text" disabled="true" class="form-control form-controlNew" name="repeat_enext_time">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label class="control-label">活动介绍</label>
                                                    <textarea disabled="true" name="activity_desc" class="form-control form-controlNew"></textarea>
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
        <script src="/admin/adminJS/discount-activity/accept_activity.js"></script> 
    </div>