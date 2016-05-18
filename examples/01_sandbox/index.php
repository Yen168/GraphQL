<?php
namespace Sandbox;

use Youshido\GraphQL\Processor;
use Youshido\GraphQL\Schema\Schema;
use Youshido\GraphQL\Type\Object\ObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

require_once __DIR__ . '/../../vendor/autoload.php';

$processor = new Processor();
$processor->setSchema(new Schema([
    'query' => new ObjectType([
        'name'   => 'RootQueryType',
        'fields' => [
            'currentTime' => [
                'type'    => new StringType(),
                'resolve' => function () {
                    return date('Y-m-d H:ia');
                }
            ]
        ]
    ])
]));

$processor->processRequest('{ currentTime }');
echo json_encode($processor->getResponseData()) . "\n";
