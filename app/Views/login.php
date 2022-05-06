<?= $this->extend('layouts/page_layout') ?>

<?= $this->section('content') ?>
						<div class="container">
									<!-- Outer Row -->
									<div class="row justify-content-center">

													<div class="col-xl-10 col-lg-12 col-md-9">

																	<div class="card o-hidden border-0 shadow-lg my-5">
																					<div class="card-body p-0">
																									<!-- Nested Row within Card Body -->
																									<div class="row">
																													<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
																													<div class="col-lg-6">
																																	<div class="p-5">
																																					<div class="text-center">
																																									<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
																																									<?= view('Myth\Auth\Views\_message_block') ?>
																																					</div>
																																					<form action="<?= route_to('login') ?>" method="post" class="user">
																																									<?= csrf_field() ?>
																																									<div class="form-group">
																																													<input type="email" class="form-control form-control-user <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
																																																	id="exampleInputEmail" aria-describedby="emailHelp"
																																																	placeholder="Enter Email Address..." name="login">
																																									</div>
																																									<div class="form-group">
																																													<input type="password" class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
																																																	id="exampleInputPassword" placeholder="Password" name="password">
																																									</div>
																																									<button type="submit" class="btn btn-primary btn-block btn-user"><?=lang('Auth.loginAction')?></button>
																																					</form>
																																					<hr>
																																					<div class="text-center">
																																									<a class="small" href="forgot-password.html">Forgot Password?</a>
																																					</div>
																																					<div class="text-center">
																																									<a class="small" href="/register">Create an Account!</a>
																																					</div>
																																	</div>
																													</div>
																									</div>
																					</div>
																	</div>

													</div>

									</div>

					</div>
<?= $this->endSection() ?>