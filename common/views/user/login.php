<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
		<div class="page">
			<div class="page-single">
				<div class="p-5">
					<div class="row">
						<div class="col mx-auto">
							<div class="row justify-content-center">
								<div class="col-lg-8 col-xl-6">
									<div class="card-group mb-0">
										<div class="card p-4 page-content">
											<div class="card-body page-single-content">
												<div class="w-100">
												 
											 
												<?= $this->render('login_old', [
																'model' => $model,
															]) ?>
												 
												<hr class="divider my-6">
											 
											</div>
											</div>
										</div>
								 
										<div class="card text-white bg-info py-3 d-md-down-none page-content mt-0">
											<div class="card-body text-center justify-content-center page-single-content">
											<div class="media mr-3 mt-0">
														<div class="media-icon bg-primary-transparent text-primary mr-3 mt-1">
															<i class="fa fa-phone"></i>
														</div>
														<div class="media-body1">
															<small class="text-muted">Mobile</small>
															<div class="font-weight-bold">
																+25572506263
															</div>
														</div>
													</div>
													<div class="media mr-4">
														<div class="media-icon bg-warning-transparent text-warning mr-3 mt-1">
															<i class="fa fa-slack"></i>
														</div>
														<div class="media-body1">
															<small class="text-muted">Email</small>
															<div class="font-weight-bold">
																info@shuleapp.com
															</div>
														</div>
													</div>
													<div class="media">
														<div class="media-icon bg-info-transparent text-info mr-3 mt-1">
															<i class="fa fa-map"></i>
														</div>
														<div class="media-body1">
															<small class="text-muted">Current Address</small>
															<div class="font-weight-bold">
															Dar Es Salaam
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="text-center pt-4">
									<div class="container">
    <div class="copyright-text">Copyright © <a target="_blank" href="https://shuleapp.com">Shule App</a>  2013-<?=date("Y")?>. All Rights Reserved</div>
  </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	