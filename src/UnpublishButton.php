<?php

namespace OptimistDigital\NovaDrafts;

use Laravel\Nova\Fields\Field;

class UnpublishButton extends Field
{
    public $component = 'nova-unpublish-button';
    public $showOnIndex = false;

    public function resolve($resource, $attribute = null)
    {
        parent::resolve($resource, $attribute);

        $this->withMeta([
            'asHtml' => true,
            'class' => get_class($resource),
            'isUnpublishable' => $this->isUnpublishable($resource),
        ]);
    }

    protected function isUnpublishable($resource)
    {
        if ($resource->published) return true;
        return false;
    }
}
