@include('backoffice.partials.header')
@include('backoffice.partials.menu')

<main id="main" class="main">
    <section class="section dashboard">
      <div class="row contents">
            @yield('content')
      </div>
    </section>

</main>
@include('backoffice.partials.footer')