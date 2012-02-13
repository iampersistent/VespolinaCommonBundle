<?php
/**
 * (c) 2012 Vespolina Project http://www.vespolina-project.org
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vespolina\CommonBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Richard Shank <develop@zestic.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('vespolina_common');

        $this->addCreditCardSection($rootNode);

        return $treeBuilder;
    }

    private function addCreditCardSection(ArrayNodeDefinition $node)
    {
        $node
            ->children()
                ->arrayNode('credit_card')
                    ->children()
                        ->arrayNode('form')
                            ->addDefaultsIfNotSet()
                                ->children()
                                    ->scalarNode('type')->end()
                                    ->scalarNode('name')->end()
                                    ->scalarNode('data_class')->end()
                                ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}
