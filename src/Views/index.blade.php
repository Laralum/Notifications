@extends('laralum::layouts.master')
@section('icon', 'ion-android-notifications')
@section('title', __('laralum_notifications::general.notifications'))
@section('subtitle', __('laralum_notifications::general.notifications_desc'))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">@lang('laralum_permissions::general.home')</a></li>
        <li><span>@lang('laralum_permissions::general.notifications')</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid class="uk-child-width-1-1">
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        @lang('laralum_permissions::general.permission_list')
                    </div>
                    <div class="uk-card-body">
                        <div class="uk-overflow-auto">
                            <table class="uk-table uk-table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('laralum_permissions::general.sender')</th>
                                        <th>@lang('laralum_permissions::general.date')</th>
                                        <th>@lang('laralum_permissions::general.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($notifications as $notification)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->slug }}</td>
                                            <td class="uk-table-shrink">
                                                <div class="uk-button-group">
                                                    <a href="{{ route('laralum::permissions.edit', ['permission' => $permission->id]) }}" class="uk-button uk-button-small uk-button-default">@lang('laralum_permissions::general.edit')</a>
                                                    <a href="{{ route('laralum::permissions.destroy.confirm', ['permission' => $permission->id]) }}" class="uk-button uk-button-small uk-button-danger">@lang('laralum_permissions::general.delete')</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
