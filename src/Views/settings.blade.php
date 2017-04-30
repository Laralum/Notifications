@php
    $settings = Laralum\Notifications\Models\Settings::first();
@endphp
<div uk-grid>
    @can('update', \Laralum\Notifications\Models\Settings::class)
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
    @else
        <div class="uk-width-1-1">
            <div class="content-background">
                <div class="uk-section uk-section-small uk-section-default">
                    <div class="uk-container uk-text-center">
                        <h3>
                            <span class="ion-minus-circled"></span>
                            @lang('laralum_notifications::general.unauthorized_action')
                        </h3>
                        <p>
                            @lang('laralum_notifications::general.unauthorized_desc')
                        </p>
                        <p class="uk-text-meta">
                            @lang('laralum_notifications::general.contact_webmaster')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endcan
</div>