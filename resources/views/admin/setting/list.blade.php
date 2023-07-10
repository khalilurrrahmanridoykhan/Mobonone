@extends('admin.layouts2.adminapp')

@section('content')
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form action="" method="post" name="createSettingFrom" id="createSettingFrom">
                    <div class="card">
                        <div class="card-header">{{ __('Website Setting') }}</div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <br>
                                    <a name="" id="" class="btn btn-primary"
                                        href="#" role="button">Back</a>
                                </div>
                                <div class="col-md-8"></div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="">Website Title</label>
                                <input value="{{ (!empty($setting->website_title)) ? $setting->website_title: '' }}" type="text" name="website_title" id="website_title" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                <p class="text-danger error website_title-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Website Email</label>
                                <input value="{{(!empty($setting->email)) ? $setting->email: ''  }}" type="text" name="email" id="email" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                <p class="text-danger error Email-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Website Phone</label>
                                <input value="{{  (!empty($setting->phone)) ? $setting->phone: ''}}" type="text" name="phone" id="phone" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                <p class="text-danger error Phone-error"></p>
                            </div>
                            <br><br>
                            <h3>Socile Links</h3>
                            <div class="form-group">
                                <label for="">Facbook Account</label>
                                <input value="{{ (!empty($setting->facebook_url)) ? $setting->facebook_url: ''}}" type="text" name="facebook_url" id="facebook_url" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                <p class="text-danger error facbookid-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Twiter Account</label>
                                <input value="{{  (!empty($setting->twiter_url)) ? $setting->twiter_url: ''}}" type="text" name="twiter_url" id="twiter_url" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                                <p class="text-danger error Twiterid-error"></p>
                            </div>
                            <div class="form-group">
                                <label for="">Instagram Account</label>
                                <input value="{{ (!empty($setting->instagram_url)) ? $setting->instagram_url: ''}}" type="text" name="instagram_url" id="instagram_url" class="form-control"
                                    placeholder="" aria-describedby="helpId">
                                <p class="text-danger error Instagramid-error"></p>
                            </div>

                            <br><br>
                            <h3>Footer Contact Card</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Contact Card One</label>
                                        <textarea name="contact_card_one" id="contact_card_one" class="summernote" cols="30" rows="10">
                                            {{  (!empty($setting->contact_card_one)) ? $setting->contact_card_one: ''}}
                                        </textarea>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Contact Card Two</label>
                                        <textarea name="contact_card_two" id="contact_card_two" class="summernote" cols="30" rows="10">
                                            {{  (!empty($setting->contact_card_two)) ? $setting->contact_card_two: ''}}
                                        </textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Contact Card Three</label>
                                        <textarea name="contact_card_three" id="contact_card_three" class="summernote" cols="30" rows="10">
                                            {{ (!empty($setting->contact_card_three)) ? $setting->contact_card_three: ''}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('extraJs')
    <script type="text/javascript">
        $("#createSettingFrom").submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{ route('admin.setting.save') }}',
                type: 'POST',
                dataType: 'json',
                data: $("#createSettingFrom").serializeArray(),
                success: function(response) {

                    if (response.status == 200) {

                        window.location.href = '{{ route('admin.setting.indexwithedit') }}';
                        //location.replace('/admin/services/list');


                    }else{
                        $('.website_title-error').html(response.errors.website_title);

                    }
                }
            });

        });
    </script>
@endsection
