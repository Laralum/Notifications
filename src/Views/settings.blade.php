@php
    $settings = Laralum\Notifications\Models\Settings::first();
@endphp
<div uk-grid>
    <div class="uk-width-1-1@s uk-width-1-5@l"></div>
    <div class="uk-width-1-1@s uk-width-3-5@l">
        <form class="uk-form-horizontal" method="POST" action="{{ route('laralum::notifications.settings.update') }}">
            {{ csrf_field() }}
            <fieldset class="uk-fieldset">

                <div class="uk-margin">
                    <label class="uk-form-label">@lang('laralum_notifications::general.mail_enabled')</label>
                    <div class="uk-form-controls">
                        <label><input id="mail_enabled" name="mail_enabled" @if($settings->mail_enabled) checked @endif class="uk-checkbox" type="checkbox"> @lang('laralum_notifications::general.enabled')</label><br />
                        <small class="uk-text-meta">@lang('laralum_notifications::general.mail_enabled_hp')</small>
                    </div>
                </div>

                <div class="uk-margin uk-align-right">
                    <button type="submit" class="uk-button uk-button-primary">
                        <span class="ion-forward"></span>&nbsp; @lang('laralum_notifications::general.save_settings')
                    </button>
                </div>

            </fieldset>
        </form>
    </div>
    <div class="uk-width-1-1@s uk-width-1-5@l"></div>
</div>
<script>
    $(function() {
        function checkStatus() {
            if ($('#mail_enabled').is(":checked")) {
                $('#mail_email').prop( "disabled", false );
                $('#mail_name').prop( "disabled", false );
                $('#mail_host').prop( "disabled", false );
                $('#mail_port').prop( "disabled", false );
                $('#mail_username').prop( "disabled", false );
                $('#mail_password').prop( "disabled", false );
                $('#mail_encription').prop( "disabled", false );
            } else {
                $('#mail_email').prop( "disabled", true );
                $('#mail_name').prop( "disabled", true );
                $('#mail_host').prop( "disabled", true );
                $('#mail_port').prop( "disabled", true );
                $('#mail_username').prop( "disabled", true );
                $('#mail_password').prop( "disabled", true );
                $('#mail_encription').prop( "disabled", true );
            }
        }
        checkStatus();
        $('#mail_enabled').change(function() {
            checkStatus();
        });
    })
</script>
