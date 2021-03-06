<?php

namespace Drupal\Tests\commerce_cart\Unit;

use Drupal\commerce_cart\Cache\Context\CartCacheContext;
use Drupal\commerce_cart\CartProviderInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Tests\UnitTestCase;

/**
 * @coversDefaultClass \Drupal\commerce_cart\Cache\Context\CartCacheContext
 * @group commerce
 */
class CartCacheContextTest extends UnitTestCase {

  /**
   * Tests commerce 'cart' cache context.
   */
  public function testCartCacheContext() {
    $account = $this->getMock(AccountInterface::class);
    $cartProvider = $this->getMock(CartProviderInterface::class);
    $cartProvider->expects($this->once())->method('getCartIds')->willReturn(['23', '34']);

    $cartCache = new CartCacheContext($account, $cartProvider);
    $this->assertEquals('23:34', $cartCache->getContext());
  }

}
