<div class="w-100">
												<div class="">
													<h1 class="mb-2">Login</h1>
													<p class="text-muted">Sign In to your account</p>
												</div>
												<div class="btn-list d-sm-flex">
													<a href="https://www.google.com/gmail/" class="btn btn-google btn-block">Google</a>
													<a href="https://twitter.com/" class="btn btn-twitter d-block d-sm-inline mr-0 mr-sm-2">Twitter</a>
													<a href="https://www.facebook.com/" class="btn btn-facebook d-block d-sm-inline">Facebook</a>
												</div>
												<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
												<hr class="divider my-6">
												<div class="input-group mb-3">
													<span class="input-group-addon"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z" opacity=".3"/><circle cx="12" cy="8" opacity=".3" r="2"/><path d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z"/></svg></span>
													<!--<input type="text" class="form-control" placeholder="Username">-->
													<?= $form->field($model, 'username')->label(false)->textInput(["class"=>"form-control"]) ?>
												</div>
												<div class="input-group">
												<?= $form->field($model, 'password')->passwordInput() ?>
												</div>
												<div class="row">
													<div class="col-12">
														<button type="button" class="btn btn-lg btn-primary btn-block"><i class="fe fe-arrow-right"></i> Login</button>
													</div>
													<div class="col-12">
														<a href="forgot-password-1.html" class="btn btn-link box-shadow-0 px-0">Forgot password?</a>
													</div>
												</div>