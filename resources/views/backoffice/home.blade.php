@include('backoffice.partials.header')
@include('backoffice.partials.menu')

<main id="main" class="main">
  <div class="container">

    <section class="section dashboard">
      <div class="row contents">
            @yield('content')
      </div>
    </section>

  </div>
</main>
@include('backoffice.partials.footer')