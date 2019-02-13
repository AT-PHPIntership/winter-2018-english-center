<div id="template">
  <div class="box box-info">
    <div class="box-body">
      <div class="form-group">
        <label>{{ __('question.create_question.title') }}</label>
        <input name="questions[key][content]" class="form-control" id="exampleInputEmail1" placeholder="Enter question">
      </div>
      <div class="form-group">
        <label class="col-sm-2 col-xs-offset-2 control-label">{{ __('question.create_question.answer1') }}</label>
        <div class="col-lg-6">
          <div class="input-group">
            <input name="questions[key][answers][]" type="text" class="form-control">
            <span class="input-group-addon">
            <input id="radio1" type="radio" name="questions[key][status]]" class="radio" value="0">
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 col-xs-offset-2 control-label">{{ __('question.create_question.answer2') }}</label>
        <div class="col-lg-6">
          <div class="input-group">
            <input name="questions[key][answers][]" type="text" class="form-control">
            <span class="input-group-addon">
            <input id="radio2" type="radio" name="questions[key][status]]" class="radio" value="1">
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 col-xs-offset-2 control-label">{{ __('question.create_question.answer3') }}</label>
        <div class="col-lg-6">
          <div class="input-group">
            <input name="questions[key][answers][]" type="text" class="form-control">
            <span class="input-group-addon">
            <input id="radio3" type="radio" name="questions[key][status]]" class="radio" value="2">
            </span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 col-xs-offset-2 control-label">{{ __('question.create_question.answer4') }}</label>
        <div class="col-lg-6">
          <div class="input-group" name="status">
            <input name="questions[key][answers][]" type="text" class="form-control">
            <span class="input-group-addon">
            <input id="radio4" type="radio" name="questions[key][status]]" class="radio" value="3">
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
