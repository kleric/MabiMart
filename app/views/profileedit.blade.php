@extends('layouts.master')
@section('page-title')
Edit your profile
@stop
@section('css')
<link rel="stylesheet" type="text/css" href="/css/bootstrap-wysihtml5.css" />
@stop
@section('script')
<script src="/js/wysihtml5-0.3.0.min.js" type="text/javascript"></script>
<script src="/js/bootstrap3-wysihtml5.js" type="text/javascript"></script>
<script type="text/javascript">
    $('#about').wysihtml5();
    $('#contact').wysihtml5();

    function processForm(e) {
      var ab = document.getElementById('about');
      ab.value = $('#about').val();

      var ct = document.getElementById('contact');
      ct.value = $('#contact').val();
    return true;
}

var form = document.getElementById('profile-form');
if (form.attachEvent) {
    form.attachEvent("submit", processForm);
} else {
    form.addEventListener("submit", processForm);
}
</script>
@stop
@section('content')
<div class="page-header">
  <h2>Edit your profile</h2>
</div>
<div class="col-md-4">
  <div class="panel panel-info">
    <div class="panel-heading">
      Profile Pictures
    </div>
    <div class="panel-body">
      <p>Your current profile picture is displayed below.</p>
      <div class="text-center">
        <img src="{{{ $profile_pic_url }}}"/>
      </div>
      <br/>
      <p>Select a different image if you'd like to change your profile picture. It will be uploaded and saved when you save your profile.</p>
      <p>Please keep the size under 1mb. It will be auto-resized to 100x100. Please avoid transparency, your picture will likely look weird</p>
      <br/>
      <input type="file" name="profilepic" form="profile-form">
    </div>
  </div>
  <div class="panel panel-warning">
    <div class="panel-heading">
        Contact Guidelines
    </div>
    <div class="panel-body">
        Please specify a consistent way to contact you about trades. You don't necessarily have to provide an e-mail address, but maybe describe the characters you play, when you're on generally and whether to add or note you. 
        <br/><br/>
        If you do not provide a good way to contact you, and people give you negative feedback for it, you may be banned.
    </div>
  </div>
</div>
<div class="col-md-8">
  @if ($errors->count() > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all(':message<br/>') as $err)
        @if ($err == "<li>The confirmpassword and password must match.</li>")
          <li>Password Confirmation does not match.</li>
        @else 
          {{ $err }}
        @endif
        @endforeach
    </div>
    @endif
  <form action="{{ URL::route('profile-edit-post') }}" method="post" id="profile-form" enctype="multipart/form-data">
    <div class="panel panel-success">
      <div class="panel-heading">
        Reaching You
      </div>
      <div class="panel-body">
        <i><small>This section is <strong>required</strong>! Please add a way to reach you in game so that trades can be performed. They're the heart of this site. (Max 1000 characters)</small></i>
        <br/>
        <textarea name="contact_details" id="contact" class="form-control" rows="8" maxlength="1000">{{{ $contact }}}</textarea>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        About You
      </div>
      <div class="panel-body">
        <i><small>This section is optional, but feel free to add a little bit about yourself</small></i>
        <br/>
        <textarea name="about_you" id="about" class="form-control" rows="5" maxlength="1000">{{{ $about }}}</textarea>
      </div>
    </div>
    <div class="form-group pull-right">
      <button type="submit" class="btn btn-success">Save</button>
    </div>
    {{ Form::token() }}
  </form>
</div>
@stop
