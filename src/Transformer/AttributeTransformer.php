<?php

namespace Miracode\StripeBundle\Transformer;

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
        $properties = (new \ReflectionObject($model))->getProperties();
        foreach ($properties as $property) {
            $stripeObjectParam = $this->findObjectParam($property);
            if (!$stripeObjectParam) {
                continue;
            }

            if (!$name = $stripeObjectParam->name) {
                $name = strtolower($property->getName());
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

            $setter = 'set' . ucfirst($property->getName());
            call_user_func([$model, $setter], $value);
        }
    }

    private function findObjectParam(\ReflectionProperty $property): ?StripeObjectParam
    {
        $attributes = $property->getAttributes(StripeObjectParam::class);
        if (count($attributes) > 1) {
            throw new \LogicException('The StripeObjectParam attribute do not allowed to be repeatable');
        }

        if (0 === count($attributes)) {
            return null;
        }

        return $attributes[0]->newInstance();
    }
}