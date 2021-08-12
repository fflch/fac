<table class="table table-striped">
  <th>
    <form method="get" action="/">
      <h3>
        Parcelas de
        <input class="datepicker" name="start_date" value="{{ request()->search }}"> até
        <input class="datepicker" name="end_date" value="{{ request()->search }}">
        <button class="btn" type="submit"><i class="fas fa-angle-right"></i></button>
      </h3>
    </form>
  </th>
</table>
