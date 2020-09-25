{{-- Create / Edit Server Form --}}
@if (isset($zone))
    {!! Form::model($zone, ['route' => ['zones.update', $zone], 'method' => 'put']) !!}
@else
    {!! Form::open(['route' => 'zones.store']) !!}
@endif

<div class="box box-solid">
    <div class="box-header">
        <h3 class="box-title">{{ __('zone/title.secondary_dns_zone') }}</h3>
    </div>
    <div class="box-body">

        <!-- domain -->
        <div class="form-group {{ $errors->has('domain') ? 'has-error' : '' }}">
            {!! Form::label('domain', __('zone/model.domain'), ['class' => 'control-label required']) !!}
            <div class="controls">
                @if (isset($zone))
                    {!! Form::text('domain', null, ['class' => 'form-control', 'disabled' => 'disabled', 'id' => 'secondary_domain']) !!}
                @else
                    {!! Form::text('domain', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'secondary_domain']) !!}
                @endif
                <span class="help-block">{{ $errors->first('domain', ':message') }}</span>
            </div>
        </div>
        <!-- ./ domain -->

        <!-- master_server -->
        <div class="form-group {{ $errors->has('master_server') ? 'has-error' : '' }}">
            {!! Form::label('master_server', __('zone/model.master_server'), ['class' => 'control-label required']) !!}
            <div class="controls">
                {!! Form::text('master_server', null, ['class' => 'form-control',  'required' => 'required']) !!}
                <span class="help-block">{{ $errors->first('master_server', ':message') }}</span>
            </div>
        </div>
        <!-- ./ master_server -->
    </div>

    <div class="box-footer">
        <!-- Form Actions -->
        <a href="{{ route('zones.index') }}" class="btn btn-default" role="button">
                <i class="fa fa-arrow-left"></i> {{ __('general.back') }}
        </a>
    {!! Form::button('<i class="fa fa-floppy-o"></i> ' . __('general.save'), ['type' => 'submit', 'class' => 'btn btn-success pull-right', 'id' => 'slave_zone']) !!}
    <!-- ./ form actions -->
    </div>
</div>
{!! Form::close() !!}
