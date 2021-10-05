<?php

namespace Chapdel\Zender\Commands;

use Illuminate\Console\Command;

class ZenderCommand extends Command
{
    public $signature = 'laravel-zender';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
