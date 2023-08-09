<?php

namespace Miracode\StripeBundle\Transformer;

use Doctrine\ORM\Mapping\Driver\AttributeReader;
use Miracode\StripeBundle\Annotation\StripeObjectParam;
use Miracode\StripeBundle\Model\StripeModelInterface;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Stripe\StripeObject;

class AttributeTransformer implements TransformerInterface
{
    public function transform(
        StripeObject $stripeObject,
        StripeModelInterface $model
    ) {
        $r = new \ReflectionObject($model);
        $annotationReader = new AttributeReader();
        $props = $r->getProperties();
        foreach ($props as $prop) {
            /** @var StripeObjectParam $stripeObjectParam */
            $stripeObjectParam = $annotationReader->getPropertyAttribute(
                $prop,
                StripeObjectParam::class
            );
            if (!$stripeObjectParam) {
                continue;
            }
            if (!$name = $stripeObjectParam->name) {
                $name = strtolower($prop->getName());
            }
            if (!isset($stripeObject[$name])) {
                continue;
            }
            $value = $stripeObject[$name];
            if ($value instanceof StripeObject) {
                if ($stripeObjectParam->embeddedId) {
                    $paths = explode('.', (string) $stripeObjectParam->embeddedId);
                    foreach ($paths as $path) {
                        if (!isset($value[$path])) {
                            break;
                        }
                        $value = $value[$path];
                    }
                } else {
                    if (isset($value->object)
                        && StripeObjectType::COLLECTION == $value->object
                    ) {
                        $value = array_map(fn (StripeObject $obj) => $obj->toArray(), $value->data);
                    } else {
                        $value = $value->toArray();
                    }
                }
            }

            $setter = 'set' . ucfirst($prop->getName());
            call_user_func([$model, $setter], $value);
        }
    }
}
