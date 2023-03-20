@extends('layouts.dashboard')
@extends('layouts.header')
@extends('layouts.sidebar')

@section('section')

<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment">
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span>
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Dashboard</li>
				</ol>


			</div>
			<!-- END RIBBON -->



			<!-- MAIN CONTENT -->
			<div id="content">

				<!-- row -->
				<div class="row">

					<!-- col -->
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">

							<!-- PAGE HEADER -->
							<i class="fa-fw fa fa-home"></i>
								Home
							<span>
								Dashboard
							</span>
						</h1>
					</div>
					<!-- end col -->



				</div>
				<!-- end row -->


				<!-- widget grid -->
			<section id="widget-grid" class="">

				<!-- START ROW -->
				<div class="row">

					<!-- NEW COL START -->
					<article class="col-sm-12 col-md-12 col-lg-12">
						<!-- Widget ID (each widget will need unique ID)-->
						<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">

							<header>
								<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
								<h2>Home -  </h2>
							</header>

							<!-- widget div-->
							<div>

								<!-- widget edit box -->
								<div class="jarviswidget-editbox">
									<!-- This area used as dropdown edit box -->

								</div>
								<!-- end widget edit box -->

								<!-- widget content -->
								<div class="widget-body no-padding">

								</div>
								<!-- end widget content -->

							</div>
							<!-- end widget div -->

						</div>
						<!-- end widget -->

					</article>
					<!-- END COL -->

				</div>


			</section>
			<!-- end widget grid -->



			</div>
			<!-- END MAIN CONTENT -->


</div>


@stop
