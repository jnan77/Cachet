@extends('layout.dashboard')

@section('content')
    <div class="header">
        <div class="sidebar-toggler visible-xs">
            <i class="icon ion-navicon"></i>
        </div>
        <span class="uppercase">
            <i class="icon ion-android-calendar"></i> {{ trans('dashboard.schedule.schedule') }}
        </span>
        &gt; <small>{{ trans('dashboard.schedule.add.title') }}</small>
    </div>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                @include('partials.dashboard.errors')
                <form class='form-vertical' name='ScheduleForm' role='form' method='POST' autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        @if($incidentTemplates->count() > 0)
                        <div class="form-group">
                            <label for="incident-template">{{ trans('forms.incidents.templates.template') }}</label>
                            <select class="form-control" name="template">
                                <option selected></option>
                                @foreach($incidentTemplates as $tpl)
                                <option value="{{ $tpl->slug }}">{{ $tpl->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="incident-name">{{ trans('forms.incidents.name') }}</label>
                            <input type="text" class="form-control" name="incident[name]" id="incident-name" required value="{{ Input::old('incident.name') }}">
                        </div>
                        <div class="form-group">
                            <label>{{ trans('forms.incidents.message') }}</label>
                            <div class='markdown-control'>
                                <textarea name="incident[message]" class="form-control autosize" rows="5" required>{{ Input::old('incident.message') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('forms.incidents.scheduled_at') }}</label>
                            <input type="text" name="incident[scheduled_at]" class="form-control" rel="datepicker" required>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('forms.incidents.notify_subscribers') }}</label>
                            <input type="checkbox" name="incident[notify]" value="1" checked="{{ Input::old('incident.message', 'checked') }}">
                            <span class="help-block">{{ trans('forms.optional') }}</span>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success">{{ trans('forms.add') }}</button>
                            <a class="btn btn-default" href="{{ route('dashboard.schedule') }}">{{ trans('forms.cancel') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
