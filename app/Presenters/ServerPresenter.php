<?php

namespace App\Presenters;

use App\Models\Server;
use Laracodes\Presenter\Presenter;

class ServerPresenter extends Presenter
{
    /** @var Server */
    protected $model;

    public function asString(): string
    {
        return sprintf("%-32s IN\tNS\t%s.", ' ', $this->model->hostname);
    }
}
