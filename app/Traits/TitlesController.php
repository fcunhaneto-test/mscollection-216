<?php


namespace App\Traits;

trait TitlesController
{
    public function titlesStart($channel, $pp) {
        return $this->table->titlesStart($channel, $pp);
    }

    public function titlesPage($channel, $page, $pp) {
        return $this->table->titlesPage($channel, $page, $pp);
    }

    public function cast($id)
    {
        return $this->table->cast($id);
    }

    public function producers($id) {
        return $this->table->producers($id);
    }
}
