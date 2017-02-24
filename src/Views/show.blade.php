@extends('laralum::layouts.master')
@section('icon', 'ion-eye')
@section('title', __('laralum_notifications::general.view_notification'))
@section('subtitle', __('laralum_notifications::general.notification_info', ['id' => $notification->id, 'created' => $notification->created_at->diffForHumans()]))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">@lang('laralum_notifications::general.home')</a></li>
        <li><span>@lang('laralum_notifications::general.view_notification')</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid>
            <div class="uk-width-1-1@s uk-width-1-5@l"></div>
            <div class="uk-width-1-1@s uk-width-3-5@l">
                <div class="uk-card uk-card-default">
                    <div class="uk-card-body">
                        <article class="uk-article">
                            <h1 class="uk-article-title"><a class="uk-link-reset" href="">{{ $notification->data['subject'] }}</a></h1>
                            <p class="uk-article-meta">@lang('laralum_notifications::general.sent_by')
                                @if($notification->data['user'])
                                    {{ $notification->data['user']['name'] }}
                                @else
                                    <span class='uk-label'>
                                        {{ \Laralum\Settings\Models\Settings::first()->appname }}
                                    </span>
                                @endif
                                {{ $notification->created_at->diffForHumans() }}
                                </p>
                            <p>
                                {!! \GrahamCampbell\Markdown\Facades\Markdown::convertToHtml($notification->data['message']) !!}
                            </p>
                        </article>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1@s uk-width-1-5@l"></div>
        </div>
    </div>
@endsection
