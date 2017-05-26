<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>theme/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>theme/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>theme/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/>

<!-- Begin: life time stats -->
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-bar-chart-o"></i> <?= $title ?>
        </div>
        <div class="actions">
            <a href="#" id="add-new" class="btn default yellow-stripe btn-circle">
                <i class="fa fa-plus"></i><span class="hidden-480"> Tambah</span>
            </a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-container">
            <?php $this->load->view('<path of your table>/table') ?>
        </div>
    </div>
</div>
<!-- End: life time stats -->

<!-- Modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="modal_formModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal_formModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <?php $this->load->view('<path of your form>/form') ?>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="save-btn">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url() ?>theme/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>theme/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>theme/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>theme/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>theme/assets/global/scripts/datatable.js"></script>
<script>
	var grid = new Datatable();

	grid.init({
            src: $("#datatable"),
            onSuccess: function (grid) {
                // execute some code after table records loaded
            },
            onError: function (grid) {
                // execute some code on network or other general error  
            },
            loadingMessage: 'Loading...',
            dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options 
                "lengthMenu": [
                    [10, 20, -1],
                    [10, 20, "All"] // change per page values here
                ],
                "pageLength": 10, // default record count per page
                "ajax": {
                    "url": "<?= base_url() ?><ClassName>/admin_ajax_list", // ajax source,
                },
                "order": [
                    [1, "desc"]
                ],
                "columnDefs": [ {
                    "targets": -1,
                    "data": null,
                    "defaultContent": "<a href='#' class='detail'><i class='fa fa-search'></i> Detail</a> | <a href='#' class='delete'><i class='fa fa-trash-o'></i> Hapus</a>"
                } ],
                "fnDrawCallback": function ( oSettings ) {	
                    for ( var i=0, iLen=oSettings.aiDisplay.length ; i<iLen ; i++ )
                    {
                        $('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html( i+1 );
                    }
                },
                "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    // <set you align column here>
                    $('td:eq(0)', nRow).attr("align", "right");
                    $('td:eq(2)', nRow).attr("align", "right");
                },
            }
	});
	
	function get_csrf(){
            $.ajax({
                type: "get",
                url: "<?php echo base_url() ?><ClassName>/get_csrf_json",    
                data: "",
                success: function (response)
                {                 
                    var data = JSON.parse(response);
                    var hash = data.hash;
                    var name = data.name;
                    $("#form #" + name).val(hash);
                },
                error: function (request, status, error) 
                {
                    get_csrf();
                }
            });
	}
	
	// handle group actionsubmit button click
	grid.getTableWrapper().on('click', '.table-group-action-submit', function (e) {
            e.preventDefault();
            var action = $(".table-group-action-input", grid.getTableWrapper());
            if (action.val() != "" && grid.getSelectedRowsCount() > 0) {
                grid.setAjaxParam("customActionType", "group_action");
                grid.setAjaxParam("customActionName", action.val());
                grid.setAjaxParam("id", grid.getSelectedRows());
                grid.getDataTable().ajax.reload();
                grid.clearAjaxParams();

            } else if (action.val() == "") {
                Metronic.alert({
                    type: 'danger',
                    icon: 'warning',
                    message: 'Please select an action',
                    container: grid.getTableWrapper(),
                    place: 'prepend'
                });
            } else if (grid.getSelectedRowsCount() === 0) {
                Metronic.alert({
                    type: 'danger',
                    icon: 'warning',
                    message: 'No record selected',
                    container: grid.getTableWrapper(),
                    place: 'prepend'
                });

            }
	});
	
	$("#add-new").click(function(e) {
            // reset form
            $('#form')[0].reset();
            // load modal when success get JSON
            var modal = $('#modal_form').modal('show');
            $(".modal-title").text("<modal title>");
            return false;
        });
	
	$('#datatable tbody').on( 'click', '.detail', function () {
            var table = grid.getDataTable();
            var data = table.row( $(this).parents('tr') ).data();
            var id = data[0];
            //alert(regno);

            $.ajax({
                type:"get",
                url:"<?= base_url() ?><ClassName>/get_data_by_id_json",
                data:"id=" + id,
                success:function(response){
                    // get CSRF First
                    get_csrf();

                    // load modal when success get JSON
                    var modal = $('#modal_form').modal('show');
                    // Set value when modal shown
                    modal.on('shown.bs.modal', function (e) {
                        $(".modal-title").text('<modal_title>');
                        
                        // get data
                        // if your form containing textarea then
                        // you can customize this code
                        var data = JSON.parse(response);
                        $.each(data[0], function(key, value){
                            if( $("#"+key).length > 0 )
                                $("#"+key).val(value);
                        });
                    });
                }
            });	

            return false;	
        } );
	
	$('#datatable tbody').on( 'click', '.delete', function () {
            var table = grid.getDataTable();
            var data = table.row( $(this).parents('tr') ).data();
            var id = data[0];
            if( confirm('Anda yakin menghapus data ini') ){
                $.ajax({
                    type:"get",
                    url:"<?= base_url() ?><ClassName>/hapus_json",
                    data:"id=" + id,
                    success:function(response){
                        var data = JSON.parse(response);
                        var status = data.status;
                        var message = data.message;

                        if( status == '1' ){
                                grid.getDataTable().ajax.reload();
                                grid.clearAjaxParams();
                        }else{
                                alert('Gagal menghapus Data');
                        }
                    }
                });	
            }

            return false;	
        } );
	
	$("#save-btn").click(function(e) {
            $("#form").submit(); 
        });
	
	$("#form").submit(function(e) {
            // prevent default action
            e.preventDefault();
            $("#save-btn").text('Menyimpan data ....').attr("disabled", "disabled");
            var url = $(this).attr("action");
            var data = $("#form").serialize();
            $.ajax({
                type:"post",
                url:url,
                data:data,
                success:function(response){
                    $("#save-btn").text("Simpan").removeAttr("disabled");
                    var data = JSON.parse(response);
                    var status = data.status;
                    var message = data.message;
                    if( status == '1' ){
                        $('#modal_form').modal('hide')
                        grid.getDataTable().ajax.reload();
                        grid.clearAjaxParams();
                    }else{
                        alert('Gagal menyimpan Data');
                        $("#save-btn").text('Simpan Ulang').removeAttr("disabled");
                    }
                },
                beforeSend: function(){
                    $("#save-btn").val('Menyimpan data ....').attr("disabled", "disabled");
                },
                error: function(){
                    alert("Error");
                    $("#save-btn").text('Simpan Ulang').removeAttr("disabled");
                }
            });	
            get_csrf();
        });
</script>