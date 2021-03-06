<div class="row">
  @php
  $index = 0;
  @endphp
  @foreach ($items as $item)
  <div class="col-md-4">
    <div class="form-group">
      @php
      $stringFormat = strtolower(str_replace(' ', '', $item));
      @endphp
      <div class="col-md-12">
        <div class="input-group date">
          <div class="input-group-addon">
            <i class="fa fa-calendar"></i>
          </div>
          <input type="text" value="{{isset($oldVals) ? $oldVals[$index] : ''}}" name="<?= $stringFormat ?>" class="form-control pull-right" id="<?= $stringFormat ?>" placeholder="{{$item}}" autocomplete="off">
        </div>
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