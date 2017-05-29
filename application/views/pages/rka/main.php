<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-money"></i>Rencana Kerja Anggaran
							</div>
							<div class="actions">								
								<div class="btn-group">
									<a class="btn default yellow-stripe" href="#" data-toggle="dropdown">
									<i class="fa fa-share"></i>
									<span class="hidden-480">
									Tools </span>
									<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
											Export to Excel </a>
										</li>
										<li>
											<a href="#">
											Export to CSV </a>
										</li>
										<li>
											<a href="#">
											Export to XML </a>
										</li>
										<li class="divider">
										</li>
										<li>
											<a href="#">
											Print Invoices </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-container">								
								<table class="table table-striped table-bordered table-hover" id="datatable_ajax">
								<thead>
								<tr role="row" class="heading">
									<th width="2%">
										<input type="checkbox" class="group-checkable">
									</th>
									<th width="5%">
										 No&nbsp;#
									</th>
									<th width="10%">
										 Provinsi
									</th>
									<th width="10%">
										 Kab/Kota
									</th>
									<th width="15%">
										 Kode
									</th>
									<th width="15%">
										 Nama/Uraian
									</th>
									<th width="10%">
										 Volume
									</th>
									<th width="10%">
										 Satuan
									</th>
									<th width="10%">
										 Harga Satuan
									</th>
									<th width="10%">
										 Jumlah
									</th>
									
								</tr>
								<tr role="row" class="filter">
									<td>
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="order_id">
									</td>
									<!-- <td>
										<div class="input-group date date-picker margin-bottom-5" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control form-filter input-sm" readonly name="order_date_from" placeholder="From">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
										<div class="input-group date date-picker" data-date-format="dd/mm/yyyy">
											<input type="text" class="form-control form-filter input-sm" readonly name="order_date_to" placeholder="To">
											<span class="input-group-btn">
											<button class="btn btn-sm default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</td> -->
									<td>
										<input type="text" class="form-control form-filter input-sm" name="rka_provinsi">
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="rka_kabkota">
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="rka_kode">
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="rka_nama">
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="rka_volume">
									</td>
									<td>
										<input type="text" class="form-control form-filter input-sm" name="rka_satuan">
									<td>
										<div class="margin-bottom-5">
											<input type="text" class="form-control form-filter input-sm" name="rka_harga_dari" placeholder="Min"/>
										</div>
										<input type="text" class="form-control form-filter input-sm" name="rka_harga_sampai" placeholder="Maks"/>
									</td>
									<td>
										<div class="margin-bottom-5">
											<input type="text" class="form-control form-filter input-sm" name="rka_jumlah_dari" placeholder="Min"/>
										</div>
										<input type="text" class="form-control form-filter input-sm" name="rka_jumlah_sampai" placeholder="Maks"/>
									</td>
								</tr>
								</thead>
								<tbody>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->