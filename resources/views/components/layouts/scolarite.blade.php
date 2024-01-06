<!-- ============================================================== -->
<!-- Menu here -->
@include('components.partials.menu')
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Leftside-menu here -->
@include('components.partials.scolariteleftmenu')
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">


    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">

                        {{ $slot }}

                    </div>
                </div>
            </div>
            <!-- end page title -->

        </div> <!-- container -->

    </div> <!-- content -->
</div>
<!-- Footer Start -->
@include('components.partials.footer')
