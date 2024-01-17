@include('components.partials.header')
@include('components.partials.menuscolarites')
<main id="main" class="main">
    <section class="section dashboard">
      <div class="row">
        {{ $slot }}
      </div>
    </section>
</main>
@include('components.partials.footer')
