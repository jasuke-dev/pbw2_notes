<?= $this->extend('layouts/page_layout') ?>

<?= $this->section('content') ?>
				<div class="container">
							<div class="card o-hidden border-0 shadow-lg my-5">
											<div class="card-body p-0">
															<!-- Nested Row within Card Body -->
															<div class="row">
																			<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
																			<div class="col-lg-7">
																							<div class="p-5">
																											<div class="text-center">
																															<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
																															<?= view('Myth\Auth\Views\_message_block') ?>
																											</div>
																											<form action="<?= route_to('register') ?>" method="post" class="user">
                        							<?= csrf_field() ?>
																															<div class="form-group">
																																			<input type="text" class="form-control form-control-user <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" id="username" name="username"
																																							placeholder="Username" value="<?= old('username') ?>">
																															</div>
																															<div class="form-group">
																																			<input type="email" class="form-control form-control-user <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail" name="email"
																																							placeholder="Email Address" value="<?= old('email') ?>">
																															</div>
																															<div class="form-group row">
																																			<div class="col-sm-6 mb-3 mb-sm-0">
																																							<input type="password" class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" name="password"
																																											id="exampleInputPassword" placeholder="Password" autocomplete="off">
																																			</div>
																																			<div class="col-sm-6">
																																							<input type="password" name="pass_confirm" class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
																																											id="exampleRepeatPassword" placeholder="Repeat Password" autocomplete="off">
																																			</div>
																															</div>
																															<button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
																											</form>
																											<hr>
																											<div class="text-center">
																															<a class="small" href="<?= route_to('login') ?>">Already have an account? Login!</a>
																											</div>
																							</div>
																			</div>
															</div>
											</div>
							</div>

				</div>
<?= $this->endSection() ?>