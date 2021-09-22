<div class="row form-group">
  @php
  $index = 0;
  @endphp
  @foreach ($items as $item)
  <div class="col-md-4">
    <div class="form-group">
      @php
      $stringFormat = strtolower(str_replace(' ', '', $item));
      @endphp
      <div class="col-sm-12">
        <input value="{{isset($oldVals) ? $oldVals[$index] : ''}}" type="text" class="form-control" name="<?= $stringFormat ?>" id="input<?= $stringFormat ?>" placeholder="{{$item}}">
      </div>
    </div>
  </div>
  @php
  $index++;
  @endphp
  @endforeach
  <button type="submit" class="btn btn-primary">
    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
    Search
  </button>
</div>